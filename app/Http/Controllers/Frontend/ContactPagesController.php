<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Contact;

class ContactPagesController extends Controller
{
    public function index(): View
    {
        $n['contact'] = Contact::where('deleted_at', null)->first();
        return view('frontend.contact.index', $n);
    }
}
