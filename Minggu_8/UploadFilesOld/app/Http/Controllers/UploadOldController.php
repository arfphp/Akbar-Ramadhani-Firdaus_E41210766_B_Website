<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
