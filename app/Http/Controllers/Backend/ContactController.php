<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }

    public function index(): View
    {
        $n['contact'] = Contact::where('deleted_at', null)->first();
        // dd($n);
        return view('backend.contact.index',$n);
    }
    public function createLocation(ContactRequest $request): RedirectResponse
    {
        $contact = Contact::where('deleted_at', null)->first();
        if ($contact === null) {
            $contact = new Contact();
            $contact->location = json_encode($request->location);
            $contact->created_by = auth()->user()->id;
            $contact->save();
        }
        $contact->location = json_encode($request->location);
        $contact->updated_by = auth()->user()->id;
        $contact->update();
        return redirect()->route('contact.contact_create')->withStatus(__('Contact location updated successfully.'));
    }
    public function createSocial(ContactRequest $request): RedirectResponse
    {
        $contact = Contact::where('deleted_at', null)->first();
        if ($contact === null) {
            $contact = new Contact();
            $contact->social = json_encode($request->social);
            $contact->created_by = auth()->user()->id;
            $contact->save();
        }
        $contact->social = json_encode($request->social);
        $contact->updated_by = auth()->user()->id;
        $contact->save();
        return redirect()->route('contact.contact_create')->withStatus(__('Contact social info updated successfully.'));
    }



    public function createPhone(ContactRequest $request): RedirectResponse
    {
        $contact = Contact::where('deleted_at', null)->first();
        if ($contact === null) {
            $contact = new Contact();
            $contact->phone = json_encode($request->phone);
            $contact->created_by = auth()->user()->id;
            $contact->save();
        }
        $contact->phone = json_encode($request->phone);
        $contact->updated_by = auth()->user()->id;
        $contact->update();
        return redirect()->route('contact.contact_create')->withStatus(__('Contact phone updated successfully.'));
    }
    public function createEmail(ContactRequest $request): RedirectResponse
    {
        $contact = Contact::where('deleted_at', null)->first();
        if ($contact === null) {
            $contact = new Contact();
            $contact->email = json_encode($request->email);
            $contact->created_by = auth()->user()->id;
            $contact->save();
            return redirect()->route('contact.contact_create')->withStatus(__('Contact email created successfully.'));
        }
        $contact->email = json_encode($request->email);
        $contact->updated_by = auth()->user()->id;
        $contact->update();
        return redirect()->route('contact.contact_create')->withStatus(__('Contact email updated successfully.'));
    }


}
