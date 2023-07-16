@extends('backend.layouts.master', ['pageSlug' => 'contact'])
@section('title', 'Conntact Us')
@push('css')
<style>
/* Style the tab */
.tab {

  border-radius: 5px 0 0 5px;
  border: 1px solid #ccc;
  min-height: 80vh;
}
.tab button {
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 1em;
    color: rgba(34, 42, 66, 0.7);
    text-transform: uppercase;
}
.tab button:hover {
  background-color: #ddd;
}
.tabcontent {
  border-radius: 0 5px 5px 0;
  padding: 0px 12px;
  border: 1px solid #ccc;
  border-left: none;
  min-height: 80vh;
}
@media only screen and (max-width: 767px) {
    .tab button {
    width: auto !important;
    font-size: .6em;
    }
    .tab {
    min-height: auto !important;
    }
    .tabcontent {
    min-height: auto !important;
    }
}
</style>
@endpush

@section('content')
@php
    $count = 0;
@endphp
    <div class="row">
        <div class="col-md-12">
            @include('alerts.success')
        </div>
        <div class="tab col-md-2 p-md-0 pl-sm-3">
            <button class="tablinks p-3" onclick="openTab(event, 'tab1')"
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
                                            <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}" @if($key>0) id="location-{{$key+1}}" @endif>
                                                <label>{{ _('Location-'.$key+1) }}</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="location[]" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Location') }}" value="{{ $location }}">
                                                    @if($key>0)
                                                        <span class="input-group-text text-danger" onclick="delete_section_1({{$key+1}})"><i class="tim-icons icon-trash-simple"></i></span>
                                                    @else
                                                        <span class="input-group-text" id="add_location" data-count="{{ count(json_decode($contact->location)) }}"><i class="tim-icons icon-simple-add"></i></span>
                                                    @endif

                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                                            <label>{{ _('Location-1') }}</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="location[]" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Location') }}" value="{{ old('location') }}">
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
            <div id="tab2" class="tabcontent py-3">
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
                                            <div class="form-group" @if($key>0) id="social-{{$key+1}}" @endif>
                                                <label>{{ _('Social Media Information-'.$count) }}</label>
                                                <div class="input-group mb-3">
                                                    <input type="url" name="social[{{$key}}][link]" class="form-control{{ $errors->has('social_link') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter social media link') }}" value="{{ $social->link }}">
                                                    <div class="div">
                                                        <select class="input-group-text form-select" name="social[{{$key}}][icon]" id="">
                                                            <option value="fa-brands fa-facebook-f" @if($social->icon == "fa-brands fa-facebook-f") selected @endif>Facebook</option>
                                                            <option value="fa-brands fa-twitter" @if($social->icon == "fa-brands fa-twitter") selected @endif>Twitter</option>
                                                            <option value="fa-brands fa-linkedin-in" @if($social->icon == "fa-brands fa-linkedin-in") selected @endif>Linkedin</option>
                                                            <option value="fa-brands fa-instagram" @if($social->icon == "fa-brands fa-instagram") selected @endif>Instagram</option>
                                                            <option value="fa-brands fa-youtube" @if($social->icon == "fa-brands fa-youtube") selected @endif>Youtube</option>
                                                            <option value="fa-brands fa-pinterest" @if($social->icon == "fa-brands fa-pinterest") selected @endif>Pinterest</option>
                                                            <option value="fa-brands fa-google" @if($social->icon == "fa-brands fa-google") selected @endif>Google</option>
                                                            <option value="fa-brands fa-tiktok" @if($social->icon == "fa-brands fa-tiktok") selected @endif>Tiktok</option>
                                                            <option value="fa-brands fa-telegram" @if($social->icon == "fa-brands fa-telegram") selected @endif>Telegram</option>
                                                            <option value="fa-brands fa-whatsapp" @if($social->icon == "fa-brands fa-whatsapp") selected @endif>WhatsApp</option>
                                                            <option value="fa-brands fa-reddit" @if($social->icon == "fa-brands fa-reddit") selected @endif>Reddit</option>
                                                        </select>
                                                        @if($key>0)
                                                            <span class="input-group-text text-danger" onclick="delete_section_2({{$key+1}})"><i class="tim-icons icon-trash-simple"></i></span>
                                                        @else
                                                            <span class="input-group-text" id="add_social" data-count="{{ count(json_decode($contact->social_icon)) }}"><i class="tim-icons icon-simple-add"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group{{ $errors->has('social_link') ? ' has-danger' : '' }}">
                                            <label>{{ _('Social Media Information-1') }}</label>
                                            <div class="input-group mb-3">
                                                <input type="url" name="social[1][link]" class="form-control{{ $errors->has('social_link') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter socilal link') }}" value="{{ old('social_link') }}">
                                                <div class="div">
                                                    <select class="input-group-text form-select" name="social[1][icon]" id="">
                                                        <option value="fa-brands fa-facebook-f">Facebook</option>
                                                        <option value="fa-brands fa-twitter">Twitter</option>
                                                        <option value="fa-brands fa-linkedin-in">Linkedin</option>
                                                        <option value="fa-brands fa-instagram">Instagram</option>
                                                        <option value="fa-brands fa-youtube">Youtube</option>
                                                        <option value="fa-brands fa-pinterest">Pinterest</option>
                                                        <option value="fa-brands fa-google">Google</option>
                                                        <option value="fa-brands fa-tiktok">Tiktok</option>
                                                        <option value="fa-brands fa-telegram">Telegram</option>
                                                        <option value="fa-brands fa-whatsapp">WhatsApp</option>
                                                        <option value="fa-brands fa-reddit">Reddit</option>
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
                            </form>`                        </div>
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
            <div id="tab3" class="tabcontent py-3">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">{{ _('Add Phone') }}</h5>
                            </div>
                            <form method="POST" action="{{route('contact.phone.contact_create')}}" autocomplete="off">
                                @csrf
                                <div class="card-body">


                                    @if(isset($contact) && is_array(json_decode($contact->phone)))
                                        @foreach (json_decode($contact->phone) as $key=>$phone)
                                            <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}" @if($key>0) id="phone-{{$key+1}}" @endif>
                                                <label>{{ _('Phone Number-'.$key+1) }}</label>
                                                <div class="input-group mb-3">
                                                    <input type="tel" name="phone[{{$key}}]['number']" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter phone') }}" value="{{ $phone }}">
                                                    <div class="div">
                                                        <select class="input-group-text form-select" name="phone[{{$key}}]['type']">
                                                            <option value="Phone" @if($phone == "Phone") selected @endif>Phone</option>
                                                            <option value="Telephone" @if($phone == "Telephone") selected @endif>Telephone</option>
                                                            <option value="Fax" @if($phone == "Fax") selected @endif>Fax</option>
                                                            <option value="WhatsApp" @if($phone == "WhatsApp") selected @endif>WhatsApp</option>
                                                            <option value="Imo" @if($phone == "Imo") selected @endif>Imo</option>
                                                        </select>
                                                        @if($key>0)
                                                            <span class="input-group-text text-danger" onclick="delete_section_3({{$key+1}})"><i class="tim-icons icon-trash-simple"></i></span>
                                                        @else
                                                            <span class="input-group-text" id="add_phone" data-count="{{ count(json_decode($contact->phone)) }}"><i class="tim-icons icon-simple-add"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <label>{{ _('Phone Number-1') }}</label>
                                            <div class="input-group mb-3">
                                                <input type="tel" name="phone[1]['number']" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter phone') }}" value="{{ old('phone') }}">
                                                <div class="div">
                                                    <select class="input-group-text form-select" name="phone[1]['type']" id="">
                                                        <option value="Phone" >Phone</option>
                                                        <option value="Telephone">Telephone</option>
                                                        <option value="Fax" >Fax</option>
                                                        <option value="WhatsApp" >WhatsApp</option>
                                                        <option value="Imo" >Imo</option>
                                                    </select>
                                                    <span class="input-group-text" id="add_phone" data-count="1"><i class="tim-icons icon-simple-add"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    {{-- @if(isset($contact) && is_array(json_decode($contact->phone)))
                                        @foreach (json_decode($contact->phone) as $key=>$phone)
                                            <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}" @if($key>0) id="phone-{{$key+1}}" @endif>
                                                <label>{{ _('Phone-1') }}</label>
                                                <div class="input-group mb-3">
                                                    <input type="tel" name="phone[]" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Phone') }}" value="{{ $phone }}">
                                                    @if($key>0)
                                                        <span class="input-group-text text-danger" onclick="delete_section_3({{$key+1}})"><i class="tim-icons icon-trash-simple"></i></span>
                                                    @else
                                                        <span class="input-group-text" id="add_phone" data-count="{{count(json_decode($contact->phone))}}"><i class="tim-icons icon-simple-add"></i></span>
                                                    @endif
                                                </div>
                                                @include('alerts.feedback', ['field' => 'phone'])
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <label>{{ _('Phone-1') }}</label>
                                            <div class="input-group mb-3">
                                                <input type="tel" name="phone[]" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Phone') }}" value="{{ old('phone') }}">
                                                <span class="input-group-text" id="add_phone" data-count="1"><i class="tim-icons icon-simple-add"></i></span>
                                            </div>
                                            @include('alerts.feedback', ['field' => 'phone'])
                                        </div>
                                    @endif --}}
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
            <div id="tab4" class="tabcontent py-3">
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
                                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}" @if($key>0) id="email-{{$key+1}}" @endif>
                                                <label>{{ _('Email-'.$key+1) }}</label>
                                                <div class="input-group mb-3">
                                                    <input type="tel" name="email[]" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Email') }}" value="{{ $email }}">
                                                    @if($key>0)
                                                        <span class="input-group-text text-danger" onclick="delete_section_4({{$key+1}})"><i class="tim-icons icon-trash-simple"></i></span>
                                                    @else
                                                        <span class="input-group-text" id="add_email" data-count="{{ count(json_decode($contact->email)) }}"><i class="tim-icons icon-simple-add"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <label>{{ _('Email-1') }}</label>
                                            <div class="input-group mb-3">
                                                <input type="email" name="email[]" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Email') }}" value="{{ old('email') }}">
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
                                    Email
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



@push('js')
<script>




//Append for location
$('#add_location').click(function() {
    result = '';
    count = $(this).data('count') + 1;
    console.log(count);
    $(this).data('count', count);

    result = `<div class="form-group{{ $errors->has('loaction') ? ' has-danger' : '' }}" id="location-${count}">
                <label>{{ _('Location-${count}') }}</label>
                <div class="input-group mb-3">
                    <input type="text" name="location[]" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Location') }}" value="{{ old('location') }}">
                    <span class="input-group-text text-danger" onclick="delete_section_1(${count})"><i class="tim-icons icon-trash-simple"></i></span>
                </div>
                @include('alerts.feedback', ['field' => 'location'])
            </div>`;

    $('#location').append(result);
});
function delete_section_1(count) {
    $('#location-' + count).remove();
};


//Append for social
$('#add_social').click(function() {
    result = '';
    count = $(this).data('count') + 1;
    $(this).data('count', count);

    result = `<div class="form-group{{ $errors->has('social_link') ? ' has-danger' : '' }}" id='social-${count}'>
                <label>{{ _('Social Media Information-${count}') }}</label>
                <div class="input-group mb-3">
                    <input type="url" name="social[${count}]['link']" class="form-control" placeholder="{{ _('Enter socilal link') }}" value="{{ old('social_link') }}">
                    <div class="div">
                        <select class="input-group-text form-select" name="social[${count}]['icon']">
                            <option value="fa-brands fa-facebook-f">Facebook</option>
                            <option value="fa-brands fa-twitter">Twitter</option>
                            <option value="fa-brands fa-linkedin-in">Linkedin</option>
                            <option value="fa-brands fa-instagram">Instagram</option>
                            <option value="fa-brands fa-youtube">Youtube</option>
                            <option value="fa-brands fa-pinterest">Pinterest</option>
                            <option value="fa-brands fa-google">Google</option>
                            <option value="fa-brands fa-tiktok">Tiktok</option>
                            <option value="fa-brands fa-telegram">Telegram</option>
                            <option value="fa-brands fa-whatsapp">WhatsApp</option>
                            <option value="fa-brands fa-reddit">Reddit</option>
                        </select>
                        <span class="input-group-text text-danger" onclick="delete_section_2(${count})"><i class="tim-icons icon-trash-simple"></i></span>
                    </div>
                </div>
                @include('alerts.feedback', ['field' => 'social_link'])
            </div>`;

    $('#social').append(result);
});
function delete_section_2(count) {
    $('#social-' + count).remove();
};


//Append for Phone
// $('#add_phone').click(function() {
//     result = '';
//     count = $(this).data('count') + 1;
//     $(this).data('count', count);

//     result = `<div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}" id="phone-${count}">
//                 <label>{{ _('Phone-${count}') }}</label>
//                 <div class="input-group mb-3">
//                     <input type="text" name="phone[]" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Phone') }}" value="{{ old('phone') }}">
//                     <span class="input-group-text text-danger" onclick="delete_section_3(${count})"><i class="tim-icons icon-trash-simple"></i></span>
//                 </div>
//                 @include('alerts.feedback', ['field' => 'phone'])
//             </div>`;

//     $('#phone').append(result);
// });
// function delete_section_3(count) {
//         $('#phone-' + count).remove();
// };


$('#add_phone').click(function() {
    result = '';
    count = $(this).data('count') + 1;
    $(this).data('count', count);

    result = `<div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}" id="phone-${count}">
                <label>{{ _('Phone-${count}') }}</label>
                <div class="input-group mb-3">
                    <input type="tel" name="phone[${count}]['number']" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter phone') }}" value="{{ old('phone') }}">
                    <div class="div">
                        <select class="input-group-text form-select" name="phone[${count}]['type']">
                            <option value="Phone" >Phone</option>
                            <option value="Telephone">Telephone</option>
                            <option value="Fax" >Fax</option>
                            <option value="WhatsApp" >WhatsApp</option>
                            <option value="Imo" >Imo</option>
                        </select>
                        @include('alerts.feedback', ['field' => 'type'])
                    <span class="input-group-text text-danger" onclick="delete_section_3(${count})"><i class="tim-icons icon-trash-simple"></i></span>
                </div>
                </div>
                @include('alerts.feedback', ['field' => 'phone'])
            </div>`;

    $('#phone').append(result);
});
function delete_section_3(count) {
    $('#phone-' + count).remove();
};


//Append for Email
$('#add_email').click(function() {
    result = '';
    count = $(this).data('count') + 1;
    $(this).data('count', count);

    result = `<div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}" id="email-${count}">
                <label>{{ _('Email-${count}') }}</label>
                <div class="input-group mb-3">
                    <input type="text" name="email[]" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Phone') }}" value="{{ old('email') }}">
                    <span class="input-group-text text-danger" onclick="delete_section_4(${count})"><i class="tim-icons icon-trash-simple"></i></span>
                </div>
                @include('alerts.feedback', ['field' => 'email'])
            </div>`;

    $('#email').append(result);

});
function delete_section_4(count) {
    $('#email-' + count).remove();
};

</script>
@endpush
