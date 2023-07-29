@extends('backend.layouts.master', ['pageSlug' => 'contact'])
@section('title', 'Conntact Us')
@push('css')
<style>

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
        <div class="tab col-md-2 p-md-0 pl-sm-3">
            <button class="tablinks p-3 btn-success text-white" onclick="openTab(event, 'tab1')"
            @if ((strpos(session($key ?? 'status'), 'location') !== false) || !session($key ?? 'status'))
                id="defaultOpen"
            @endif
             >Location</button>
            <button class="tablinks p-3" onclick="openTab(event, 'tab2')"
            @if (strpos(session($key ?? 'status'), 'social') !== false)
                id="defaultOpen"
            @endif
            >Social Information</button>
            <button class="tablinks p-3" onclick="openTab(event, 'tab3')"
            @if (strpos(session($key ?? 'status'), 'phone') !== false)
                id="defaultOpen"
            @endif
            >Phone</button>
            <button class="tablinks p-3" onclick="openTab(event, 'tab4')"
            @if (strpos(session($key ?? 'status'), 'email') !== false)
                id="defaultOpen"
            @endif
            >Email</button>
        </div>
        <div class="col-md-10 p-0">
            {{-- Tab-1 --}}
            <div id="tab1" class="tabcontent py-3">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">{{ _('Add Location') }}</h5>
                            </div>
                            <form method="POST" action="{{route('contact.location.contact_create')}}" autocomplete="off">
                                @csrf
                                <div class="card-body">
                                    @if(isset($contact) && is_array(json_decode($contact->location)))
                                        @foreach (json_decode($contact->location) as $key=>$location)
                                            <div class="form-group" @if($key>0) id="location-{{$key+1}}" @endif>
                                                <label>{{ _('Location-'.$key+1) }}</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="location[]" class="form-control" placeholder="{{ _('Enter Location') }}" value="{{ $location }}" required>
                                                    @if($key>0)
                                                        <span class="input-group-text text-danger" onclick="delete_section_1({{$key+1}})"><i class="tim-icons icon-trash-simple"></i></span>
                                                    @else
                                                        <span class="input-group-text" id="add_location" data-count="{{ count(json_decode($contact->location)) }}"><i class="tim-icons icon-simple-add"></i></span>
                                                    @endif

                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group ">
                                            <label>{{ _('Location-1') }}</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="location[]" class="form-control " placeholder="{{ _('Enter Location') }}" required>
                                                <span class="input-group-text" id="add_location" data-count="1"><i class="tim-icons icon-simple-add"></i></span>
                                            </div>
                                        </div>
                                    @endif
                                    <div id="location">

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
                                    Location
                                </p>
                                <div class="card-description">
                                    {{ _('The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.') }}
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
                            <form method="POST" action="{{route('contact.social.contact_create')}}" autocomplete="off">
                                @csrf
                                <div class="card-body">
                                    @if(isset($contact) && !empty(json_decode($contact->social)))
                                        @foreach (json_decode($contact->social) as $key=>$social)
                                        @php
                                            $count++;
                                        @endphp
                                            <div class="form-group" @if($count>1) id="social-{{$count}}" @endif>
                                                <label>{{ _('Social Media Information-'.$count) }}</label>
                                                <div class="input-group mb-3">
                                                    <input type="url" name="social[{{$count}}][link]" class="form-control" placeholder="{{ _('Enter social media information') }}" value="{{$social->link}}" required>
                                                    <div class="div">
                                                        <select class="input-group-text form-select" name="social[{{$count}}][icon]">
                                                            <option value="fa-brands fa-facebook-f" @if( $social->icon == "fa-brands fa-facebook-f" ) selected @endif title="Facebook" ><i>&#xf09a</i></option>
                                                            <option value="fa-brands fa-twitter"    @if( $social->icon == "fa-brands fa-twitter" ) selected @endif title="Twitter" ><i>&#xf099</i></option>
                                                            <option value="fa-brands fa-linkedin-in"@if( $social->icon == "fa-brands fa-linkedin-in" ) selected @endif title="Linkedin" ><i>&#xf0e1</i></option>
                                                            <option value="fa-brands fa-instagram"  @if( $social->icon == "fa-brands fa-instagram" ) selected @endif title="Instagram" ><i>&#xf16d</i></option>
                                                            <option value="fa-brands fa-youtube"    @if( $social->icon == "fa-brands fa-youtube" ) selected @endif title="Youtube" ><i>&#xf167</i></option>
                                                            <option value="fa-brands fa-pinterest"  @if( $social->icon == "fa-brands fa-pinterest" ) selected @endif title="Pinterest" ><i>&#xf0d2</i></option>
                                                            <option value="fa-brands fa-google"     @if( $social->icon == "fa-brands fa-google" ) selected @endif title="Google" ><i>&#xf1a0</i></option>
                                                            <option value="fa-brands fa-tiktok"     @if( $social->icon == "fa-brands fa-tiktok" ) selected @endif title="Tiktok" ><i>&#xe07b</i></option>
                                                            <option value="fa-brands fa-telegram"   @if( $social->icon == "fa-brands fa-telegram" ) selected @endif title="Telegram" ><i>&#xf2c6</i></option>
                                                            <option value="fa-brands fa-whatsapp"   @if( $social->icon == "fa-brands fa-whatsapp" ) selected @endif title="WhatsApp" ><i>&#xf232</i></option>
                                                            <option value="fa-brands fa-reddit"     @if( $social->icon == "fa-brands fa-reddit" ) selected @endif title="Reddit" ><i>&#xf1a1</i></option>
                                                        </select>
                                                        @if($count>1)
                                                            <span class="input-group-text text-danger" onclick="delete_section_2({{$count}})"><i class="tim-icons icon-trash-simple"></i></span>
                                                        @else
                                                            <span class="input-group-text" id="add_social" data-count="{{collect(json_decode($contact->social))->count()}}"><i class="tim-icons icon-simple-add"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group">
                                            <label>{{ _('Social Media Information-1') }}</label>
                                            <div class="input-group mb-3">
                                                <input type="url" name="social[1][link]" class="form-control" placeholder="{{ _('Enter socilal link') }}" required>
                                                <div class="div">
                                                    <select class="input-group-text form-select" name="social[1][icon]">
                                                        <option value="fa-brands fa-facebook-f" title="Facebook"><i>&#xf09a</i></option>
                                                        <option value="fa-brands fa-twitter" title="Twitter"><i>&#xf099</i></option>
                                                        <option value="fa-brands fa-linkedin-in" title="Linkedin"><i>&#xf0e1</i></option>
                                                        <option value="fa-brands fa-instagram" title="Instagram"><i>&#xf16d</i></option>
                                                        <option value="fa-brands fa-youtube" title="Youtube"><i>&#xf167</i></option>
                                                        <option value="fa-brands fa-pinterest" title="Pinterest"><i>&#xf0d2</i></option>
                                                        <option value="fa-brands fa-google" title="Google"><i>&#xf1a0</i></option>
                                                        <option value="fa-brands fa-tiktok" title="Tiktok"><i>&#xe07b</i></option>
                                                        <option value="fa-brands fa-telegram" title="Telegram"><i>&#xf2c6</i></option>
                                                        <option value="fa-brands fa-whatsapp" title="WhatsApp"><i>&#xf232</i></option>
                                                        <option value="fa-brands fa-reddit" title="Reddit"><i>&#xf1a1</i></option>
                                                    </select>
                                                    <span class="input-group-text" id="add_social" data-count="1"><i class="tim-icons icon-simple-add"></i></span>
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
                                    Social Info
                                </p>
                                <div class="card-description">
                                    {{ _('The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tab-3 --}}
            <div id="tab3" class="tabcontent py-3" style="display: none;">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">{{ _('Add Phone') }}</h5>
                            </div>
                            <form method="POST" action="{{route('contact.phone.contact_create')}}" autocomplete="off">
                                @csrf
                                <div class="card-body">

                                    @php
                                        $count = 0;
                                    @endphp
                                    @if(isset($contact) && !empty(json_decode($contact->phone)))
                                        @foreach (json_decode($contact->phone) as $key=>$phone)
                                        @php
                                            $count++;
                                        @endphp
                                            <div class="form-group" @if($count>1) id="phone-{{$count}}" @endif>
                                                <label>{{ _('Phone Number-'.$count) }}</label>
                                                <div class="input-group mb-3">
                                                    <input type="tel" name="phone[{{$count}}][number]" class="form-control" placeholder="{{ _('Enter phone number') }}" value="{{ $phone->number }}" required>
                                                    <div class="div contact_div">
                                                        <select class="input-group-text form-select" name="phone[{{$count}}][type]">
                                                            <option value="Phone" @if($phone->type == "Phone") selected @endif title='Phone'>Phone</option>
                                                            <option value="Telephone" @if($phone->type == "Telephone") selected @endif title='Telephone'>Telephone</option>
                                                            <option value="Fax" @if($phone->type == "Fax") selected @endif title='Fax'>Fax</option>
                                                        </select>
                                                        @if($count>1)
                                                            <span class="input-group-text text-danger" onclick="delete_section_3({{$count}})"><i class="tim-icons icon-trash-simple"></i></span>
                                                        @else
                                                            <span class="input-group-text" id="add_phone" data-count="{{ collect(json_decode($contact->phone))->count() }}"><i class="tim-icons icon-simple-add"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group">
                                            <label>{{ _('Phone Number-1') }}</label>
                                            <div class="input-group mb-3">
                                                <input type="tel" name="phone[1][number]" class="form-control" placeholder="{{ _('Enter phone number') }}" required>
                                                <div class="div contact_div">
                                                    <select class="input-group-text form-select" name="phone[1][type]">
                                                        <option value="Phone" title='Phone'>Phone</option>
                                                        <option value="Telephone" title='Telephone'>Telephone</option>
                                                        <option value="Fax" title='Fax'>Fax</option>
                                                    </select>
                                                    <span class="input-group-text" id="add_phone" data-count="1"><i class="tim-icons icon-simple-add"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div id="phone">

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
                                    Phone
                                </p>
                                <div class="card-description">
                                    {{ _('The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tab-4 --}}
            <div id="tab4" class="tabcontent py-3" style="display: none;">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">{{ _('Add Email') }}</h5>
                            </div>
                            <form method="POST" action="{{route('contact.email.contact_create')}}" autocomplete="off">
                                @csrf
                                <div class="card-body">
                                    @if(isset($contact) && is_array(json_decode($contact->email)))
                                        @foreach (json_decode($contact->email) as $key=>$email)
                                            <div class="form-group" @if($key>0) id="email-{{$key+1}}" @endif>
                                                <label>{{ _('Email-'.$key+1) }}</label>
                                                <div class="input-group mb-3">
                                                    <input type="tel" name="email[]" class="form-control" placeholder="{{ _('Enter Email') }}" value="{{ $email }}" required>
                                                    @if($key>0)
                                                        <span class="input-group-text text-danger" onclick="delete_section_4({{$key+1}})"><i class="tim-icons icon-trash-simple"></i></span>
                                                    @else
                                                        <span class="input-group-text" id="add_email" data-count="{{ count(json_decode($contact->email)) }}"><i class="tim-icons icon-simple-add"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group">
                                            <label>{{ _('Email-1') }}</label>
                                            <div class="input-group mb-3">
                                                <input type="email" name="email[]" class="form-control" placeholder="{{ _('Enter Email') }}"  required>
                                                <span class="input-group-text" id="add_email" data-count="1"><i class="tim-icons icon-simple-add"></i></span>
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
                                    {{ _('Contact') }}
                                </p>
                                <div class="card-description">
                                    {{ _('The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@push('js_link')
<script src="{{ asset('backend/js/contact.js') }}"></script>
@endpush
