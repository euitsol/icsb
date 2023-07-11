<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicationsPagesController extends Controller
{
    public function photoGallery(): View
    {
        return view('frontend.publication.photo_gallery');
    }
}
