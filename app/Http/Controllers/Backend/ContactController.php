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
        return view('backend.contact.index',$n);
    }
    public function createLocation(ContactRequest $request): RedirectResponse
    {
        $location = $request->location;
        $filteredLocation = array_filter($location, function ($value) {
            return $value !== null;
        });
        $contact = Contact::where('deleted_at', null)->first();
        if ($contact === null) {
            $contact = new Contact();
            $contact->location = json_encode($filteredLocation);
            $contact->created_by = auth()->user()->id;
            $contact->save();
        }
        $contact->location = json_encode($filteredLocation);
        $contact->updated_by = auth()->user()->id;
        $contact->update();
        return redirect()->route('contact.contact_create')->withStatus(__('Contact location updated successfully.'));
    }
    public function createSocial(ContactRequest $request): RedirectResponse
    {
        $filteredSocial = array_filter($request->social, function ($entry) {
            return !is_null($entry['link']);
        });
        $contact = Contact::where('deleted_at', null)->first();
        if ($contact === null) {
            $contact = new Contact();
            $contact->social = json_encode($filteredSocial);
            $contact->created_by = auth()->user()->id;
            $contact->save();
        }
        $contact->social = json_encode($filteredSocial);
        $contact->updated_by = auth()->user()->id;
        $contact->save();
        return redirect()->route('contact.contact_create')->withStatus(__('Contact social info updated successfully.'));
    }



    public function createPhone(ContactRequest $request): RedirectResponse
    {
        $filteredPhone = array_filter($request->phone, function ($entry) {
            return !is_null($entry['number']);
        });
        $contact = Contact::where('deleted_at', null)->first();
        if ($contact === null) {
            $contact = new Contact();
            $contact->phone = json_encode($filteredPhone);
            $contact->created_by = auth()->user()->id;
            $contact->save();
        }
        $contact->phone = json_encode($filteredPhone);
        $contact->updated_by = auth()->user()->id;
        $contact->update();
        return redirect()->route('contact.contact_create')->withStatus(__('Contact phone updated successfully.'));
    }
    public function createEmail(ContactRequest $request): RedirectResponse
    {
        $email = $request->email;
        $filteredEmail = array_filter($email, function ($value) {
            return $value !== null;
        });
        $contact = Contact::where('deleted_at', null)->first();
        if ($contact === null) {
            $contact = new Contact();
            $contact->email = json_encode($filteredEmail);
            $contact->created_by = auth()->user()->id;
            $contact->save();
        }
        $contact->email = json_encode($filteredEmail);
        $contact->updated_by = auth()->user()->id;
        $contact->update();
        return redirect()->route('contact.contact_create')->withStatus(__('Contact email updated successfully.'));
    }


}
