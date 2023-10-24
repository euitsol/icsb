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
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="item">
                        <div class="logo-wrapp">
                            <a href="{{route('media_room_view.view',$media_room->slug)}}"><img src="{{$media_room->thumbnail_image ? storage_url($media_room->thumbnail_image) : asset('no_img/no_img.jpg')}}" alt="..." /></a>
                            <div class="post-content">
                                <ul>
                                    <li>
                                        <i class="fa-solid fa-file-import"></i>Latest News
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-calendar-check"></i>{{ date('d M Y', strtotime($media_room->program_date))}}
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
            @if((isset($cat) && count($cat->media_rooms)>12) || (!isset($cat) && count($media_rooms)>=12))
                <div class="see-button text-align" >
                    <a href="javascript:void(0)" class="more" data-cat_id="{{isset($cat) ? $cat->id : 'all' }}" data-offset="12">{{_('See More')}}</a>
                </div>
            @endif
        </div>
    </div>
@endsection
@push('js')
<script>
    $(document).ready(function () {
    $('.more').on('click', function () {
        var limit = 12;
        let id = $(this).data('cat_id');
        var offset = $(this).attr('data-offset');
        let _url = ("{{ route('media_rooms', ['cat_id','offset']) }}");
        let __url = _url.replace('cat_id', id);
        let ___url = __url.replace('offset', offset);
        $.ajax({
            url: ___url,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                $('.more').attr('data-offset', parseInt(offset)+limit);
                data.media_rooms.forEach(function (media_room) {
                    let singleViewRoute = ("{{ route('media_room_view.view', ['slug']) }}");
                    let _singleViewRoute = singleViewRoute.replace('slug', media_room.slug);
                    var noImage = '{{asset("no_img/no_img.jpg")}}';
                    var image = `{{ storage_url('${media_room.thumbnail_image}') }}`;
                    var thumbnailImage = media_room.thumbnail_image ? image : noImage;
                    let result = `
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="item">
                                <div class="logo-wrapp">
                                    <a href="${_singleViewRoute}"><img src="${thumbnailImage}" alt="..." /></a>
                                    <div class="post-content">
                                        <ul>
                                            <li>
                                                <i class="fa-solid fa-file-import"></i>Latest News
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-calendar-check"></i>${media_room.date}
                                            </li>
                                        </ul>
                                        <h3><a href="${_singleViewRoute}">${media_room.title}</a></h3>
                                        <p>${media_room.description}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    $('.media_rooms').append(result);
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
