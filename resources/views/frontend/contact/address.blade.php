@extends('frontend.master')

@section('title', 'Feedback')

@section('content')
    <!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = asset('breadcumb_img/contact_us.jpg');
        $title = 'Address';
        $datas = [
            'image' => $banner_image,
            'title' => $title,
            'paths' => [
                'home' => 'Home',
                'javascript:void(0)' => 'Contact Us',
            ],
        ];
    @endphp
    @include('frontend.includes.breadcrumb', ['datas' => $datas])
    <!--=========================== Contact Form Section ==========================-->

    <section class="objectives-section big-sec-min-height form-section">
        <div class="container">
            <div class="objective-row row gap-0">
                @if (isset($contact->location) && !empty(json_decode($contact->location)))
                    @foreach (json_decode($contact->location) as $key => $location)
                        <div class="col-md-6">
                            <div class="right-column w-100 mb-4">
                                <div class="form-content">
                                    <div class="detailes-column">

                                        <h4 class="text-white mb-0">{{ $location->title }}</h4>
                                        @if (isset($location->emails) && !empty($location->emails))
                                            <div class="deatiles-items">
                                                <div class="icon">
                                                    <img src="{{ asset('frontend/img/contact/contact-email.png') }}"
                                                        alt="Contact Email">
                                                </div>
                                                <div class="content">
                                                    <h4>{{ __('Email:') }}</h4>
                                                    @foreach ($location->emails as $key => $email)
                                                        <a href="mailto:{{ $email }}">{{ $email }}</a><br>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                        @if (isset($location->phones) && !empty($location->phones))
                                            @foreach ($location->phones as $phone)
                                                <div class="deatiles-items">
                                                    <div class="icon">
                                                        @if ($phone->type == 'Phone' || $phone->type == 'WhatsApp')
                                                            <img src="{{ asset('frontend/img/contact/contact-phone.png') }}"
                                                                alt="{{ $phone->type }}">
                                                        @elseif($phone->type == 'Telephone')
                                                            <img src="{{ asset('frontend/img/contact/contact-telephone.png') }}"
                                                                alt="{{ $phone->type }}">
                                                        @elseif($phone->type == 'Fax')
                                                            <img src="{{ asset('frontend/img/contact/contact-fax.png') }}"
                                                                alt="{{ $phone->type }}">
                                                        @endif
                                                    </div>
                                                    <div class="content">
                                                        <h4>{{ $phone->type }} No:</h4>
                                                        <a
                                                            href="tel:+88{{ $phone->number }}">+88{{ $phone->number }}</a><br>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="deatiles-items">
                                            <div class="icon">
                                                <img src="{{ asset('frontend/img/contact/contact-location.png') }}"
                                                    alt="Contact Email">
                                            </div>
                                            <div class="content">
                                                <h4>{{ __('Address') }}:</h4>
                                                <a
                                                    href="{{ route('contact_us.location_map') }}">{{ $location->address }}</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if (count(json_decode($contact->location, true)) < 2)
                    <div class="col-md-6">
                        <div class="left-column w-100">
                            <img src="{{ $contact->address_page_image ? storage_url($contact->address_page_image) : asset('no_img/no_img.jpg') }}"
                                alt="{{ 'Address Page Image' }}">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            // Find the maximum height of all right-column elements
            var maxHeight = 0;
            $('.form-content').each(function() {
                var thisHeight = $(this).height();
                if (thisHeight > maxHeight) {
                    maxHeight = thisHeight;
                }
            });

            // Set the height of all right-column elements to the maximum height
            $('.form-content').css('height', maxHeight + 'px');
        });
    </script>
@endpush
