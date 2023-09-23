@extends('frontend.master')

@section('title', 'Members')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/members.jpg');
$title = $type->title;
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
        <div class="heading-content text-align d-flex justify-content-between align-items-center">
            <h2 class="common-heading">{{$type->title}}</h2>
            <div class="search">
                <div class="input-group">
                    <input type="text" class="search_value" placeholder="Search by member name or title!">
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
            $('.search_button').on('click', function() {
                let search_value = $('.search_value').val();
                if (search_value != null) {
                    let _url = ("{{ route('member_info.search', ['search_value','cat_id']) }}");
                    let __url = _url.replace('search_value', search_value);
                    let ___url = __url.replace('cat_id', {{$type->id}});
                    console.log(___url);

                    $.ajax({
                        url: ___url,
                        method: 'GET',
                        dataType: 'json',
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
                                                <h3 class="mb-0">${member_search.name}</h3>
                                                <p><strong>${member_search.designation}</strong></p>
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
                }
            });
        });

    </script>
@endpush
