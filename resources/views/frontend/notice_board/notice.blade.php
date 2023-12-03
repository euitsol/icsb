@extends('frontend.master')

@section('title', 'Notice Board')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/members.jpg');
$title = isset($notice_cat) ? $notice_cat->title : 'Notice Board';
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
{{-- <section class="notice-board-section section-padding">
    <div class="container">
        <div class="heading-content text-align">
            <h1 class="common-heading">Notice Board</h1>
        </div>
        <div class="notice-board-content">
            <table>
                <thead>
                    <th>Serial No</th>
                    <th>Title</th>
                    <th>Release date</th>
                    <th>Download</th>
                </thead>
                <tbody>
                    @php
                        $startSerial = ($notices->currentPage() - 1) * $notices->perPage() + 1;
                    @endphp
                    @foreach ($notices as $key=>$notice)
                        <tr>
                            <td>{{str_pad($startSerial++, 2, '0', STR_PAD_LEFT)}}</td>
                            <td><a href="javascript:void(0)">{{$notice->title}}</a></td>
                            <td>{{date('M d, Y', strtotime($notice->created_at))}}</td>
                            <td>
                                @foreach (json_decode($notice->files) as $file)
                                    <a target="_blank" href="{{route('sp.file.download', base64_encode($file->file_path))}}"><i title="{{substr(strrchr($file->file_path, '/'), 1)}}" class="fa-solid fa-cloud-arrow-down"></i></a>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <div class="table-pagination">
                {{$notices->links('vendor.pagination.notice')}}
            </div>
        </div>
    </div>
</section> --}}

<section class="library-section big-sec-min-height">
    <div class="container">
        <div class="row notices">
            @foreach ($notices as $key=>$notice)
            <div class="col-md-6 the_cs mb-5 mx-auto">
                <h4>{{($key+1).'. '.$notice->title}}</h4>
                <div class="new-handbook text-align">
                    @foreach(json_decode($notice->files) as $file)
                        <iframe src ="{{ pdf_storage_url($file->{'file_path'}) }}" width="100%" height="500px"></iframe>
                        <a class="d-block cursor-pointer" target="_blank" href="{{route('sp.file.download', base64_encode($file->file_path))}}"><h3 > {{$file->file_name}}</h3></a>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        @if(count($count)>12)
            <div class="see-button text-align">
                <a href="javascript:void(0)" class="more" data-offset="12">{{_('See More')}}</a>
            </div>
        @endif

    </div>
</section>
@endsection
@push('js')
<script>
$(document).ready(function () {
$('.more').on('click', function () {
    var limit = 12;
    var offset = $(this).attr('data-offset');
    let _url = ("{{ route('notices', ['offset']) }}");
    let __url = _url.replace('offset', offset);
    $.ajax({
        url: __url,
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            $('.more').attr('data-offset', parseInt(offset)+limit);
            data.notices.forEach(function (notice) {
                var pdfLink = '{{ asset("/laraview/#../storage/file") }}'.replace('file', notice.file);
                var routeFileDownload = '{{ route("sp.file.download", ":file") }}'.replace(':file', btoa(notice.file));

                var result= `
                    <div class="col-xl-3 col-lg-4 col-md-6 the_cs mb-5">
                        <div class="new-handbook text-align">
                            <iframe src ="${pdfLink}" width="100%" height="400px"></iframe>
                            <a class="d-block cursor-pointer" target="_blank" href="${routeFileDownload}"><h3>${notice.title}</h3></a>
                        </div>
                    </div>
                `;
                $('.notices').append(result);
            });
            if(data.notices.length<limit){
                $('.more').parent().hide();
            }
        },
        error: function (xhr, status, error) {
            console.error('Error fetching notices:', error);
        }
        });
    });
});
</script>
@endpush
