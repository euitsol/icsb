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
                    <input type="text" class="search_value" placeholder="Search by Member Name, Designation, Private Practice Certificate No!">
                    <button class="search_button" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
        <div class="fellow-row flex member_data">

        </div>
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
                            console.log(data);
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
@endpush
