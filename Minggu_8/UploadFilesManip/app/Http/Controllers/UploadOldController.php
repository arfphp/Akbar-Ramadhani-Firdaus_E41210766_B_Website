<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class UploadOldController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function proses_upload(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'keterangan' => 'required'
        ]);

        // Menyimpan data file yang diupload ke variable $file
        $file = $request->file('file');
        // Nama File
        echo 'File Name : ' . $file->getClientOriginalName() . '<br>';
        // Ekstensi File
        echo 'File Extension : ' . $file->getClientOriginalExtension() . '<br>';
        // Real File
        echo 'File Real Path : ' . $file->getRealPath() . '<br>';
        // Ukuran File
        echo 'File Size : ' . $file->getSize() . '<br>';
        // Tipe File
        echo 'File Mime Type : ' . $file->getMimeType() . '<br>';

        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $file->getClientOriginalName());
    }

    public function resize_upload(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'keterangan' => 'required'
        ]);

        // Menentukan Path Lokasi Upload
        $path = public_path('img/logo');
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        // mengambil file image dari form
        $file = $request->file('file');
        // membuat nama file dari gabungan tanggal dan uniqid()
        $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();
        // membuat canvas image sebesar dimensi
        $canvas = Image::canvas(200, 200);
        // resize image sesuai dimensi dengan mempertahankan ratio
        $resizeImage = Image::make($file)->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        });
        // memasukkan image yang telah diresize ke dalam canvas
        $canvas->insert($resizeImage, 'center');
        // simpan image ke folder
        if ($canvas->save($path . '/' . $fileName)) {
            return redirect()->route('upload')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('upload')->with('success', 'Data Gagal Ditambahkan');
        }
    }
    public function dropzone()
    {
        return view('dropzone');
    }
    public function dropzone_store(Request $request)
    {
        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('img/dropzone'), $imageName);
        return response()->json(['success' => $imageName]);
    }
    public function pdf_upload()
    {
        return view('pdf_upload');
    }
    public function pdf_store(Request $request)
    {
        $pdf = $request->file('file');
        $pdfName = 'pdf_' . time() . '.' . $pdf->extension();
        $pdf->move(public_path('pdf/dropzone'), $pdfName);
        return response()->json(['success' => $pdfName]);
    }
}
