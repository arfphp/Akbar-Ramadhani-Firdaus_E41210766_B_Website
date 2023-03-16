<?php

namespace App\Http\Controllers;

use App\Models\DetailProfile;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index()
    {
        return view('frontend.about', [
            "title" => "about",
            // "posts" => Post::all()
            "abouts" => DetailProfile::latest()->get()
        ]);
    }

    // public function show(DetailProfile $post){
    //     return view('front',[
    //         "title" => "Single Post",
    //         "post" => $post
    //     ]);
    // }
}
