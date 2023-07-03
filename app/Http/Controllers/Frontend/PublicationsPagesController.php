<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicationsPagesController extends Controller
{
    public function photoGallery(){
        return view('frontend.publication.photo_gallery');
    }
}
