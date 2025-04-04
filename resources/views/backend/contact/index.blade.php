@extends('backend.layouts.master', ['pageSlug' => 'contact'])
@section('title', 'Conntact Us')
@push('css')
    <style>
        .input-group .form-control:not(:first-child):not(:last-child) {
            border-radius: 0;
            border-left: 1px solid rgba(29, 37, 59, 0.5) !important;
        }

        .input-group .form-control:last-child {
            border-left: 1px solid rgba(29, 37, 59, 0.5) !important;
        }
    </style>
@endpush

@section('content')
    @php
        $count = 0;
    @endphp
    <div class="row contact_wrap">
        <div class="col-md-12">
            @include('alerts.success')
        </div>
        <div class="tab col-md-2 p-md-3 pl-sm-3">
            <button class="tablinks p-3 btn-success text-white" onclick="openTab(event, 'tab1')"
                @if (strpos(session($key ?? 'status'), 'location') !== false || !session($key ?? 'status')) id="defaultOpen" @endif>Contact Information</button>
            <button class="tablinks p-3" onclick="openTab(event, 'tab2')"
                @if (strpos(session($key ?? 'status'), 'social') !== false) id="defaultOpen" @endif>Social Information</button>
            {{-- <button class="tablinks p-3" onclick="openTab(event, 'tab3')"
                @if (strpos(session($key ?? 'status'), 'phone') !== false) id="defaultOpen" @endif>Phone</button>
            <button class="tablinks p-3" onclick="openTab(event, 'tab4')"
                @if (strpos(session($key ?? 'status'), 'email') !== false) id="defaultOpen" @endif>Email</button> --}}
        </div>
        <div class="col-md-10 p-0">
            {{-- Tab-1 --}}
            <div id="tab1" class="tabcontent py-3">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">{{ _('Add Contact Information') }}</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('contact.location.contact_create') }}"
                                    autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @php
                                        $count = 0;
                                    @endphp
                                    @if (isset($contact) && !empty(json_decode($contact->location)))
                                        @foreach (json_decode($contact->location) as $key => $location)
                                            @php
                                                $count++;
                                            @endphp
                                            <div class="card location_group" id="location-{{ $count }}">
                                                <div
                                                    class="card-header mb-2 d-flex justify-content-between align-items-center">
                                                    <div class="title">{{ __('Contact Information-' . $count) }}
                                                    </div>
                                                    <div class="div contact_div">
                                                        @if ($count > 1)
                                                            <span class="btn btn-danger  btn-sm"
                                                                onclick="delete_section_1({{ $count }})">{{ __('Remove Contact') }}</span>
                                                        @else
                                                            <span class="btn btn-secondary btn-sm" id="add_location"
                                                                data-count="{{ collect(json_decode($contact->location))->count() }}">{{ __('Add Contact') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="card-body border">
                                                    <div class="form-group">
                                                        <label>{{ _('Location') }}</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text"
                                                                name="location[{{ $count }}][title]"
                                                                class="form-control"
                                                                placeholder="{{ _('Enter location title') }}"
                                                                value="{{ $location->title }}" required>
                                                            <input type="text"
                                                                name="location[{{ $count }}][address]"
                                                                class="form-control"
                                                                placeholder="{{ _('Enter location address') }}"
                                                                value="{{ $location->address }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>{{ _('Location URL') }}</label>
                                                        <input type="url" name="location[{{ $count }}][url]"
                                                            class="form-control"
                                                            placeholder="{{ _('Enter location url') }}"
                                                            value="{{ $location->url }}" required>
                                                    </div>

                                                    {{-- Email  --}}

                                                    <div class="form-group">
                                                        <label>{{ _('Emails') }}</label>
                                                        <div id="email-{{ $count }}">
                                                            @if (isset($location) && !empty($location->emails))
                                                                @foreach ($location->emails as $emailKey => $email)
                                                                    <div class="input-group mb-3">
                                                                        <input type="email"
                                                                            name="location[{{ $count }}][emails][]"
                                                                            class="form-control"
                                                                            placeholder="{{ _('Enter Email') }}"
                                                                            value="{{ $email }}" required>
                                                                        @if ($emailKey > 0)
                                                                            <span
                                                                                class="input-group-text text-danger delete_email"
                                                                                data-info_count="{{ $count }}"><i
                                                                                    class="tim-icons icon-trash-simple"></i></span>
                                                                        @else
                                                                            <span class="input-group-text add_email"
                                                                                data-count="{{ count($location->emails) }}"
                                                                                data-info_count="{{ $count }}"><i
                                                                                    class="tim-icons icon-simple-add"></i></span>
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="input-group mb-3">
                                                                    <input type="email"
                                                                        name="location[{{ $count }}][emails][]"
                                                                        class="form-control"
                                                                        placeholder="{{ _('Enter Email') }}" value=""
                                                                        required>
                                                                    <span class="input-group-text add_email" data-count="1"
                                                                        data-info_count="{{ $count }}"><i
                                                                            class="tim-icons icon-simple-add"></i></span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    {{-- Phone  --}}
                                                    <div class="form-group">
                                                        <label>{{ _('Phones') }}</label>
                                                        <div id="phone-{{ $count }}">
                                                            @if (isset($location) && !empty($location->phones))
                                                                @php
                                                                    $phonesArray = is_array($location->phones)
                                                                        ? $location->phones
                                                                        : (array) $location->phones;
                                                                @endphp
                                                                @foreach ($phonesArray as $phoneKey => $phone)
                                                                    <div class="input-group mb-3">
                                                                        <input type="tel"
                                                                            name="location[{{ $count }}][phones][{{ $phoneKey }}][number]"
                                                                            class="form-control"
                                                                            placeholder="{{ __('Enter phone number') }}"
                                                                            value="{{ $phone->number }}" required>
                                                                        <div class="div contact_div">
                                                                            <select
                                                                                class="input-group-text form-select no-select"
                                                                                name="location[{{ $count }}][phones][{{ $phoneKey }}][type]">
                                                                                <option value="Phone"
                                                                                    @if ($phone->type == 'Phone') selected @endif>
                                                                                    Phone</option>
                                                                                <option value="Telephone"
                                                                                    @if ($phone->type == 'Telephone') selected @endif>
                                                                                    Telephone</option>
                                                                                <option value="Fax"
                                                                                    @if ($phone->type == 'Fax') selected @endif>
                                                                                    Fax</option>
                                                                                <option value="WhatsApp"
                                                                                    @if ($phone->type == 'WhatsApp') selected @endif>
                                                                                    WhatsApp</option>
                                                                            </select>
                                                                        </div>
                                                                        @if ($phoneKey > 1)
                                                                            <span
                                                                                class="input-group-text text-danger delete_phone"
                                                                                data-info_count="{{ $count }}"><i
                                                                                    class="tim-icons icon-trash-simple"></i></span>
                                                                        @else
                                                                            <span class="input-group-text add_phone"
                                                                                data-count="{{ count($phonesArray) }}"
                                                                                data-info_count="{{ $count }}"><i
                                                                                    class="tim-icons icon-simple-add"></i></span>
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="input-group mb-3">
                                                                    <input type="tel"
                                                                        name="location[{{ $count }}][phones][1][number]"
                                                                        class="form-control"
                                                                        placeholder="{{ _('Enter phone number') }}"
                                                                        value="" required>
                                                                    <div class="div contact_div">
                                                                        <select
                                                                            class="input-group-text form-select no-select"
                                                                            name="location[{{ $count }}][phones][1][type]">
                                                                            <option value="Phone"
                                                                                @if (old("location.$count.phones.1.type") == 'Phone') selected @endif>
                                                                                Phone</option>
                                                                            <option value="Telephone"
                                                                                @if (old("location.$count.phones.1.type") == 'Telephone') selected @endif>
                                                                                Telephone</option>
                                                                            <option value="Fax"
                                                                                @if (old("location.$count.phones.1.type") == 'Fax') selected @endif>
                                                                                Fax</option>
                                                                            <option value="WhatsApp"
                                                                                @if (old("location.$count.phones.1.type") == 'WhatsApp') selected @endif>
                                                                                WhatsApp</option>
                                                                        </select>
                                                                    </div>
                                                                    <span class="input-group-text add_phone"
                                                                        data-count="1"
                                                                        data-info_count="{{ $count }}"><i
                                                                            class="tim-icons icon-simple-add"></i></span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="card location_group" id="location-1">
                                            <div
                                                class="card-header mb-2 d-flex justify-content-between align-items-center">
                                                <div class="title">{{ __('Contact Information-1') }}
                                                </div>
                                                <div class="div contact_div">
                                                    <span class="btn btn-secondary btn-sm" id="add_location"
                                                        data-count="1">{{ __('Add Contact') }}</span>
                                                </div>
                                            </div>
                                            <div class="card-body border">
                                                <div class="form-group">
                                                    <label>{{ _('Location') }}</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="location[1][title]"
                                                            class="form-control"
                                                            placeholder="{{ _('Enter location title') }}"
                                                            value="{{ old('location.1.title') }}" required>
                                                        <input type="text" name="location[1][address]"
                                                            class="form-control"
                                                            placeholder="{{ _('Enter location address') }}"
                                                            value="{{ old('location.1.address') }}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label>{{ _('Location URL') }}</label>
                                                    <input type="url" name="location[1][url]" class="form-control"
                                                        placeholder="{{ _('Enter location url') }}"
                                                        value="{{ old('location.1.url') }}" required>
                                                </div>

                                                {{-- Email  --}}

                                                <div class="form-group">
                                                    <label>{{ _('Emails') }}</label>
                                                    <div id="email-1">
                                                        <div class="input-group mb-3">
                                                            <input type="email" name="location[1][emails][]"
                                                                class="form-control" placeholder="{{ _('Enter Email') }}"
                                                                value="{{ old('location.1.emails.0') }}" required>
                                                            <span class="input-group-text add_email" data-count="1"
                                                                data-info_count="1"><i
                                                                    class="tim-icons icon-simple-add"></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Phone  --}}
                                                <div class="form-group">
                                                    <label>{{ _('Phones') }}</label>
                                                    <div id="phone-1">
                                                        <div class="input-group mb-3">
                                                            <input type="tel" name="location[1][phones][1][number]"
                                                                class="form-control"
                                                                placeholder="{{ _('Enter phone number') }}"
                                                                value="" required>
                                                            <div class="div contact_div">
                                                                <select class="input-group-text form-select no-select"
                                                                    name="location[1][phones][1][type]">
                                                                    <option value="Phone"
                                                                        @if (old('location.1.phones.1.type') == 'Phone') selected @endif>
                                                                        Phone</option>
                                                                    <option value="Telephone"
                                                                        @if (old('location.1.phones.1.type') == 'Telephone') selected @endif>
                                                                        Telephone</option>
                                                                    <option value="Fax"
                                                                        @if (old('location.1.phones.1.type') == 'Fax') selected @endif>
                                                                        Fax</option>
                                                                    <option value="WhatsApp"
                                                                        @if (old('location.1.phones.1.type') == 'WhatsApp') selected @endif>
                                                                        WhatsApp</option>
                                                                </select>
                                                            </div>
                                                            <span class="input-group-text add_phone" data-count="1"
                                                                data-info_count="1"><i
                                                                    class="tim-icons icon-simple-add"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @include('alerts.feedback', ['field' => 'location.*.title'])
                                    @include('alerts.feedback', ['field' => 'location.*.address'])
                                    @include('alerts.feedback', ['field' => 'location.*.url'])
                                    @include('alerts.feedback', ['field' => 'location.*.emails.*'])
                                    @include('alerts.feedback', ['field' => 'location.*.phones.*.number'])
                                    @include('alerts.feedback', ['field' => 'location.*.phones.*.type'])
                                    <div id="location">

                                    </div>
                                    <div class="form-group {{ $errors->has('address_page_image') ? 'is-invalid' : '' }}">
                                        <label>{{ _('Address Page Image') }}</label>
                                        <input type="file" accept="image/*" name="address_page_image"
                                            class="form-control  {{ $errors->has('address_page_image') ? 'is-invalid' : '' }} image-upload"
                                            @if (isset($contact->address_page_image) && $contact->address_page_image != null) data-existing-files="{{ storage_url($contact->address_page_image) }}"
                                        data-delete-url="{{ route('contact.file.delete.contact_create', $contact->id) }}" @endif>
                                        @include('alerts.feedback', ['field' => 'address_page_image'])
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit"
                                            class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-body">
                                <p class="card-text">
                                    <b>{{ _('Location') }}</b>
                                </p>
                                <div class="card-description">
                                    <p><b>Location-* :</b> This field is nullable. The location title field should be the
                                        Location Title & address field should be the Location Addreess. By clicking on the
                                        '+' icon you can add multiple location title, location address & location map URL.
                                    </p>
                                    <p><b>Location URL-* :</b> This field is nullable. It is a URL field & the URL should be
                                        a location map URL.</p>
                                    <p><b>Address Page Image:</b> This field is required. It supports file uploads in jpeg,
                                        png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the
                                        image should be 1200 x 800px.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tab-2 --}}
            <div id="tab2" class="tabcontent py-3" style="display: none;">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">{{ _('Add Social Media Information') }}</h5>
                            </div>
                            <form method="POST" action="{{ route('contact.social.contact_create') }}"
                                autocomplete="off">
                                @csrf
                                @php
                                    $count = 0;
                                @endphp
                                <div class="card-body">
                                    @if (isset($contact) && !empty(json_decode($contact->social)))
                                        @foreach (json_decode($contact->social) as $key => $social)
                                            @php
                                                $count++;
                                            @endphp
                                            <div class="form-group"
                                                @if ($count > 1) id="social-{{ $count }}" @endif>
                                                <label>{{ _('Social Media Information-' . $count) }}</label>
                                                <div class="input-group mb-3">
                                                    <input type="url" name="social[{{ $count }}][link]"
                                                        class="form-control"
                                                        placeholder="{{ _('Enter social media information') }}"
                                                        value="{{ $social->link }}" required>
                                                    <div class="div">
                                                        <select class="input-group-text form-select no-select"
                                                            name="social[{{ $count }}][icon]">
                                                            <option value="fa-brands fa-facebook-f"
                                                                @if ($social->icon == 'fa-brands fa-facebook-f') selected @endif
                                                                title="Facebook"><i>&#xf09a</i></option>
                                                            <option value="fa-brands fa-square-x-twitter"
                                                                @if ($social->icon == 'fa-brands fa-square-x-twitter') selected @endif
                                                                title="Twitter"><i>&#xe61a</i></option>
                                                            <option
                                                                value="fa-brands fa-linkedin-in"@if ($social->icon == 'fa-brands fa-linkedin-in') selected @endif
                                                                title="Linkedin"><i>&#xf0e1</i></option>
                                                            <option value="fa-brands fa-instagram"
                                                                @if ($social->icon == 'fa-brands fa-instagram') selected @endif
                                                                title="Instagram"><i>&#xf16d</i></option>
                                                            <option value="fa-brands fa-youtube"
                                                                @if ($social->icon == 'fa-brands fa-youtube') selected @endif
                                                                title="Youtube"><i>&#xf167</i></option>
                                                            <option value="fa-brands fa-pinterest"
                                                                @if ($social->icon == 'fa-brands fa-pinterest') selected @endif
                                                                title="Pinterest"><i>&#xf0d2</i></option>
                                                            <option value="fa-brands fa-google"
                                                                @if ($social->icon == 'fa-brands fa-google') selected @endif
                                                                title="Google"><i>&#xf1a0</i></option>
                                                            <option value="fa-brands fa-tiktok"
                                                                @if ($social->icon == 'fa-brands fa-tiktok') selected @endif
                                                                title="Tiktok"><i>&#xe07b</i></option>
                                                            <option value="fa-brands fa-telegram"
                                                                @if ($social->icon == 'fa-brands fa-telegram') selected @endif
                                                                title="Telegram"><i>&#xf2c6</i></option>
                                                            <option value="fa-brands fa-whatsapp"
                                                                @if ($social->icon == 'fa-brands fa-whatsapp') selected @endif
                                                                title="WhatsApp"><i>&#xf232</i></option>
                                                            <option value="fa-brands fa-reddit"
                                                                @if ($social->icon == 'fa-brands fa-reddit') selected @endif
                                                                title="Reddit"><i>&#xf1a1</i></option>
                                                        </select>
                                                        @if ($count > 1)
                                                            <span class="input-group-text text-danger"
                                                                onclick="delete_section_2({{ $count }})"><i
                                                                    class="tim-icons icon-trash-simple"></i></span>
                                                        @else
                                                            <span class="input-group-text" id="add_social"
                                                                data-count="{{ collect(json_decode($contact->social))->count() }}"><i
                                                                    class="tim-icons icon-simple-add"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group">
                                            <label>{{ _('Social Media Information-1') }}</label>
                                            <div class="input-group mb-3">
                                                <input type="url" name="social[1][link]" class="form-control"
                                                    placeholder="{{ _('Enter socilal link') }}" required>
                                                <div class="div">
                                                    <select class="input-group-text form-select no-select"
                                                        name="social[1][icon]">
                                                        <option value="fa-brands fa-facebook-f" title="Facebook">
                                                            <i>&#xf09a</i>
                                                        </option>
                                                        <option value="fa-brands fa-square-x-twitter" title="Twitter">
                                                            <i>&#xe61a</i>
                                                        </option>
                                                        <option value="fa-brands fa-linkedin-in" title="Linkedin">
                                                            <i>&#xf0e1</i>
                                                        </option>
                                                        <option value="fa-brands fa-instagram" title="Instagram">
                                                            <i>&#xf16d</i>
                                                        </option>
                                                        <option value="fa-brands fa-youtube" title="Youtube">
                                                            <i>&#xf167</i>
                                                        </option>
                                                        <option value="fa-brands fa-pinterest" title="Pinterest">
                                                            <i>&#xf0d2</i>
                                                        </option>
                                                        <option value="fa-brands fa-google" title="Google"><i>&#xf1a0</i>
                                                        </option>
                                                        <option value="fa-brands fa-tiktok" title="Tiktok"><i>&#xe07b</i>
                                                        </option>
                                                        <option value="fa-brands fa-telegram" title="Telegram">
                                                            <i>&#xf2c6</i>
                                                        </option>
                                                        <option value="fa-brands fa-whatsapp" title="WhatsApp">
                                                            <i>&#xf232</i>
                                                        </option>
                                                        <option value="fa-brands fa-reddit" title="Reddit"><i>&#xf1a1</i>
                                                        </option>
                                                    </select>
                                                    <span class="input-group-text" id="add_social" data-count="1"><i
                                                            class="tim-icons icon-simple-add"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div id="social">

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-body">
                                <p class="card-text">
                                    <b>{{ _('Social Information') }}</b>
                                </p>
                                <div class="card-description">
                                    <p><b>Social Media Information-* :</b> This field is nullable. The social media
                                        information field is a URL field, and it should contain the URL of a social media
                                        platform. The corresponding option field should feature the social platform's icon.
                                        By clicking on the '+' icon you can add multiple social media information.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            {{-- Tab-3 --}}
            {{-- <div id="tab3" class="tabcontent py-3" style="display: none;">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">{{ _('Add Phone') }}</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('contact.phone.contact_create') }}"
                                    autocomplete="off">
                                    @csrf


                                    @php
                                        $count = 0;
                                    @endphp
                                    @if (isset($contact) && !empty(json_decode($contact->phone)))
                                        @foreach (json_decode($contact->phone) as $key => $phone)
                                            @php
                                                $count++;
                                            @endphp
                                            <div class="form-group"
                                                @if ($count > 1) id="phone-{{ $count }}" @endif>
                                                <label>{{ _('Phone Number-' . $count) }}</label>
                                                <div class="input-group mb-3">
                                                    <input type="tel" name="phone[{{ $count }}][number]"
                                                        class="form-control" placeholder="{{ _('Enter phone number') }}"
                                                        value="{{ $phone->number }}" required>
                                                    <div class="div contact_div">
                                                        <select class="input-group-text form-select no-select"
                                                            name="phone[{{ $count }}][type]">
                                                            <option value="Phone"
                                                                @if ($phone->type == 'Phone') selected @endif
                                                                title='Phone'>Phone</option>
                                                            <option value="Telephone"
                                                                @if ($phone->type == 'Telephone') selected @endif
                                                                title='Telephone'>Telephone</option>
                                                            <option value="Fax"
                                                                @if ($phone->type == 'Fax') selected @endif
                                                                title='Fax'>Fax</option>
                                                            <option value="WhatsApp"
                                                                @if ($phone->type == 'WhatsApp') selected @endif
                                                                title='WhatsApp'>WhatsApp</option>
                                                        </select>
                                                        @if ($count > 1)
                                                            <span class="input-group-text text-danger"
                                                                onclick="delete_section_3({{ $count }})"><i
                                                                    class="tim-icons icon-trash-simple"></i></span>
                                                        @else
                                                            <span class="input-group-text" id="add_phone"
                                                                data-count="{{ collect(json_decode($contact->phone))->count() }}"><i
                                                                    class="tim-icons icon-simple-add"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group">
                                            <label>{{ _('Phone Number-1') }}</label>
                                            <div class="input-group mb-3">
                                                <input type="tel" name="phone[1][number]" class="form-control"
                                                    placeholder="{{ _('Enter phone number') }}" required>
                                                <div class="div contact_div">
                                                    <select class="input-group-text form-select no-select"
                                                        name="phone[1][type]">
                                                        <option value="Phone" title='Phone'>Phone</option>
                                                        <option value="Telephone" title='Telephone'>Telephone</option>
                                                        <option value="Fax" title='Fax'>Fax</option>
                                                        <option value="WhatsApp" title='WhatsApp'>WhatsApp</option>
                                                    </select>
                                                    <span class="input-group-text" id="add_phone" data-count="1"><i
                                                            class="tim-icons icon-simple-add"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div id="phone">

                                    </div>

                                    <div class="card-footer">
                                        <button type="submit"
                                            class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-body">
                                <p class="card-text">
                                    <b> {{ _('Phone') }}</b>
                                </p>
                                <div class="card-description">
                                    <p><b>Phone Number-* :</b> This field is nullable. It should contain the phone number.
                                        The corresponding option field should feature the phone number icon. By clicking on
                                        the '+' icon you can add multiple phone number.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- Tab-4 --}}
            {{-- <div id="tab4" class="tabcontent py-3" style="display: none;">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">{{ _('Add Email') }}</h5>
                            </div>
                            <form method="POST" action="{{ route('contact.email.contact_create') }}"
                                autocomplete="off">
                                @csrf
                                <div class="card-body">
                                    @if (isset($contact) && is_array(json_decode($contact->email)))
                                        @foreach (json_decode($contact->email) as $key => $email)
                                            <div class="form-group"
                                                @if ($key > 0) id="email-{{ $key + 1 }}" @endif>
                                                <label>{{ _('Email-' . $key + 1) }}</label>
                                                <div class="input-group mb-3">
                                                    <input type="tel" name="email[]" class="form-control"
                                                        placeholder="{{ _('Enter Email') }}"
                                                        value="{{ $email }}" required>
                                                    @if ($key > 0)
                                                        <span class="input-group-text text-danger"
                                                            onclick="delete_section_4({{ $key + 1 }})"><i
                                                                class="tim-icons icon-trash-simple"></i></span>
                                                    @else
                                                        <span class="input-group-text" id="add_email"
                                                            data-count="{{ count(json_decode($contact->email)) }}"><i
                                                                class="tim-icons icon-simple-add"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group">
                                            <label>{{ _('Email-1') }}</label>
                                            <div class="input-group mb-3">
                                                <input type="email" name="email[]" class="form-control"
                                                    placeholder="{{ _('Enter Email') }}" required>
                                                <span class="input-group-text" id="add_email" data-count="1"><i
                                                        class="tim-icons icon-simple-add"></i></span>
                                            </div>
                                        </div>
                                    @endif
                                    <div id="email">

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-body">
                                <p class="card-text">
                                    <b>{{ _('Contact') }}</b>
                                </p>
                                <div class="card-description">
                                    <p><b>Email-* :</b> This field is nullable. It is a email field with a maximum character
                                        limit of 255. The entered value must follow the standard email format (e.g.,
                                        user@example.com). By clicking on the '+' icon you can add multiple email.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

    </div>

@endsection
@push('js_link')
    <script src="{{ asset('backend/js/contact.js') }}"></script>
@endpush
