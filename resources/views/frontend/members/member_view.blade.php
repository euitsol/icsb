@extends('frontend.master')

@section('title', 'Members')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/members.jpg');
$title = $title;
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Members',
                        'javascript:void(0)'=>'Member’s Search',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->


<section class="fellow-member-section big-sec-min-height">
    <div class="container">
        <div class="heading-content d-flex justify-content-between">
            <h2 class="common-heading">{{$title}}</h2>
            <div class="search">
                <div class="input-group">
                    <input type="text" class="search_value" placeholder="Search by Member Name, Designation, Company Name or Membership ID!">
                    <button class="search_button" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
        <div class="fellow-row flex member_data">
            @if($slug == 'honorary' || $slug == 'deceased')
                @foreach ($members as $member)
                    <div class="fellow-items flex">
                        <div class="image-column">
                            <img src="{{getMemberImage($member)}}" alt="{{$member->name}}">
                        </div>
                        <div class="content-column">
                            <h4>{{$member->membership_id}}</h4>
                            <h3 class="mb-0">{{$member->name}}</h3>
                            <p class="mb-0"><strong>{{$member->designation}}</strong></p>
                            <p><strong>{{$member->company_name}}</strong></p>
                            <li><i class="fa-solid fa-house-circle-exclamation"></i>{{$member->address}}</li>
                            <li><i class="fa-solid fa-envelope-open-text"></i>{{_('Email:')}} <a href="mailto:{{$member->email}}">{{$member->email}}</a></li>
                        </div>
                    </div>
                @endforeach
            @endif
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
                    let _url = ("{{ route('member_info.search', ['search_value','cat_id']) }}");
                    let __url = _url.replace('search_value', search_value);
                    let ___url = __url.replace('cat_id', '{{$slug}}' );

                    $.ajax({
                        url: ___url,
                        method: 'GET',
                        dataType: 'json',
                        beforeSend:function() {
                            $('.member_data').html('Loading...');
                        },
                        success: function(data) {
                            console.log(data);
                            var member_data= '';
                            if(!data.member_searchs || data.member_searchs.length === 0){
                                console.log(data);
                                member_data +=`
                                                <h3 class="text-danger mx-auto my-5">Member Not Found</h3>
                                            `;
                            } else{

                                data.member_searchs.forEach(function(member_search) {
                                    member_data += `
                                        <div class="fellow-items flex">
                                            <div class="image-column">
                                                <img src="${member_search.image}" alt="">
                                            </div>
                                            <div class="content-column">
                                                <h4>${member_search.membership_id}</h4>
                                                <h3>${member_search.name}</h3>
                                                <p class="mb-0"><strong>${member_search.designation}</strong></p>
                                                <p><strong>${member_search.company_name}</strong></p>
                                                <li><i class="fa-solid fa-house-circle-exclamation"></i>${member_search.address}</li>
                                                <li><i class="fa-solid fa-envelope-open-text"></i>Email: <a href="mailto:${member_search.email}">${member_search.email}</a></li>
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
