@extends('frontend.master')

@section('title', 'CS Firms')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/members.jpg');
$title = 'CS Firms';
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Members',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->

<section class="fellow-member-section big-sec-min-height">
    <div class="container">
        <div class="heading-content text-align d-flex justify-content-between align-items-center">
            <h2 class="common-heading">{{'CS Firm Members'}}</h2>
            <div class="search">
                <div class="input-group">
                    <input type="text" class="search_value" placeholder="Search by Member Name, Designation, Company Name or Private Practice Certificate No">
                    <button class="search_button" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
        <div class="fellow-row flex member_data">
            @foreach ($csf_members as $member)
            <div class="fellow-items flex">
                <div class="image-column">
                    <img src="{{getMemberImage($member->member)}}" alt="{{$member->member->name}}">
                </div>
                <div class="content-column">
                    <h4>{{_('CS Practicing Licence No:')}} {{$member->private_practice_certificate_no}}</h4>
                    <h3 class="mb-0">{{$member->member->name}}</h3>
                    <p class="mb-0"><strong>{{$member->member->designation}}</strong></p>
                    <p><strong>{{$member->member->company_name}}</strong></p>
                    <li><i class="fa-solid fa-house-circle-exclamation"></i>{{$member->member->address}}</li>
                    <li><i class="fa-solid fa-envelope-open-text"></i>{{_('Email:')}} <a href="mailto:{{$member->member->email}}">{{$member->member->email}}</a></li>
                </div>
            </div>
        @endforeach
        </div>
        @if((count($csf_members)>=50))
            <div class="see-button text-align" >
                <a href="javascript:void(0)" class="more" data-offset="10">{{_('See More')}}</a>
            </div>
        @endif
    </div>
</section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.search_value').on('input', function() {
                let search_value = $('.search_value').val();
                if (search_value != null && search_value != '') {
                    let _url = ("{{ route('cs_firms.member_info.search', ['search_value']) }}");
                    let __url = _url.replace('search_value', search_value);
                    $.ajax({
                        url: __url,
                        method: 'GET',
                        dataType: 'json',
                        beforeSend:function() {
                            $('.member_data').html('Loading...');
                        },
                        success: function(data) {
                            $('.see-button').hide();
                            var member_data= '';
                            if(!data.csFirmMembers || data.csFirmMembers.length === 0){
                                member_data +=`
                                                <h3 class="text-danger mx-auto my-5">Member Not Found</h3>
                                            `;
                            } else{

                                data.csFirmMembers.forEach(function(csFirmMember) {
                                    member_data += `
                                        <div class="fellow-items flex">
                                            <div class="image-column">
                                                <img src="${csFirmMember.member.image}" alt="">
                                            </div>
                                            <div class="content-column">
                                                <h4>CS Practicing Licence No: ${csFirmMember.private_practice_certificate_no}</h4>
                                                <h3>${csFirmMember.member.name}</h3>
                                                <p class="mb-0"><strong>${csFirmMember.member.designation}</strong></p>
                                                <p><strong>${csFirmMember.member.company_name}</strong></p>
                                                <li><i class="fa-solid fa-house-circle-exclamation"></i>${csFirmMember.member.address}</li>
                                                <li><i class="fa-solid fa-envelope-open-text"></i>Email: <a href="mailto:${csFirmMember.member.email}">${csFirmMember.member.email}</a></li>
                                            </div>
                                        </div>
                                    `;
                                });

                            }
                            $('.member_data').html(member_data);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching member data:', error);
                        }
                    });
                }else{
                    $('.member_data').html('');
                }
            });
        });

    </script>
    <script>
        $(document).ready(function () {
        $('.more').on('click', function () {
            var limit = 10;
            var offset = $(this).attr('data-offset');
            let url = ("{{ route('cs_firms_more', ['offset']) }}");
            let _url = url.replace('offset', offset);
            $.ajax({
                url: _url,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('.more').attr('data-offset', parseInt(offset)+limit);
                    data.csFirmMembers.forEach(function (csFirmMember) {
                        let result = `
                                    <div class="fellow-items flex">
                                        <div class="image-column">
                                            <img src="${csFirmMember.member.image}" alt="">
                                        </div>
                                        <div class="content-column">
                                            <h4>CS Practicing Licence No: ${csFirmMember.private_practice_certificate_no}</h4>
                                            <h3>${csFirmMember.member.name}</h3>
                                            <p class="mb-0"><strong>${csFirmMember.member.designation}</strong></p>
                                            <p><strong>${csFirmMember.member.company_name}</strong></p>
                                            <li><i class="fa-solid fa-house-circle-exclamation"></i>${csFirmMember.member.address}</li>
                                            <li><i class="fa-solid fa-envelope-open-text"></i>Email: <a href="mailto:${csFirmMember.member.email}">${csFirmMember.member.email}</a></li>
                                        </div>
                                    </div>
                                    `;
                        $('.member_data').append(result);
                        });
                        if(data.media_rooms.length<limit){
                                $('.more').parent().hide();
                        }

                },
                error: function (xhr, status, error) {
                    console.error('Error fetching media:', error);
                }
                });
            });
        });
    </script>
@endpush
