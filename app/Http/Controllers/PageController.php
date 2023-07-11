<?php

namespace App\Http\Controllers;
use Illuminate\View\View;

class PageController extends Controller
{

    public function icons(): View
    {
        return view('pages.icons');
    }


    public function maps(): View
    {
        return view('pages.maps');
    }


    public function tables(): View
    {
        return view('pages.tables');
    }


    public function notifications(): View
    {
        return view('pages.notifications');
    }


    public function rtl(): View
    {
        return view('pages.rtl');
    }


    public function typography(): View
    {
        return view('pages.typography');
    }

    public function upgrade(): View
    {
        return view('pages.upgrade');
    }
}
