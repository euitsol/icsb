@extends('frontend.master')

@section('title', 'Media Rooms')

@section('content')
@php
$banner_image = asset('breadcumb_img/media_room.jpg');
$title = 'All Media Rooms';
if(isset($cat)){
    $title = $cat->name;
}

$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'media_room_view.all'=>'Media Room',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->

    <div class="blog-section">
        <div class="container">
            <div class="row media_rooms">
                @foreach ($media_rooms as $media_room)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="item">
                        <div class="logo-wrapp">
                            <a href="{{route('media_room_view.view',$media_room->slug)}}"><img src="{{storage_url($media_room->thumbnail_image)}}" alt="..." /></a>
                            <div class="post-content">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa-solid fa-file-import"></i>Latest News</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-solid fa-calendar-check"></i>{{ date('d M Y', strtotime($media_room->program_date))}}</a>
                                    </li>
                                </ul>
                                <h3><a href="{{route('media_room_view.view',$media_room->slug)}}">{{stringLimit($media_room->title)}}</a></h3>
                                <p>{{ stringLimit(html_entity_decode_table($media_room->description)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="see-button text-align">
                <a href="#">{{_('See More')}}</a>
            </div>
        </div>
    </div>
@endsection
@push('js')
{{-- <script>
    $(document).ready(function () {
    $('.more').on('click', function () {
        $.ajax({
            url: `/media-rooms/all`,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                var awardDetailsHtml = '';

                // Loop through the awards data
                data.awards.forEach(function (award) {
                    var routeViewPdf = '{{ route("view.pdf", ":file") }}'.replace(':file', btoa(award.file));
                    var routeFileDownload = '{{ route("sp.file.download", ":file") }}'.replace(':file', btoa(award.file));

                    awardDetailsHtml += `
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="item">
                            <div class="logo-wrapp">
                                <a href="{{route('media_room_view.view',$media_room->slug)}}"><img src="{{storage_url($media_room->thumbnail_image)}}" alt="..." /></a>
                                <div class="post-content">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fa-solid fa-file-import"></i>Latest News</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa-solid fa-calendar-check"></i>{{ date('d M Y', strtotime($media_room->program_date))}}</a>
                                        </li>
                                    </ul>
                                    <h3><a href="{{route('media_room_view.view',$media_room->slug)}}">{{stringLimit($media_room->title)}}</a></h3>
                                    <p>{{ stringLimit(html_entity_decode_table($media_room->description)) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                });

                // Insert the generated HTML into the '.awards' element
                $('.media_rooms').html(awardDetailsHtml);
                $('.more').hide();
            },
            error: function (xhr, status, error) {
                console.error('Error fetching awards:', error);
            }
            });
        });
    });
</script> --}}

@endpush
