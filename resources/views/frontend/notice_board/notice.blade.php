@extends('frontend.master')

@section('title', 'Notice Board')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
if(isset($slug) && $slug == 'member-notice'){
    $banner_image = asset('breadcumb_img/members.jpg');
}elseif(isset($slug) && $slug == 'student-notice'){
    $banner_image = asset('breadcumb_img/students.jpg');
}
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
           <div class="col-md-9">
                <h4>{{($key+1).'. '.$notice->title}}</h4>
           </div>
            <div class="col-md-3">
                <h5 class="text-md-end"><small>{{_('Release Date: ')}}{{date('d M, Y', strtotime($notice->release_date))}}</small></h5>
            </div>
            <div class="col-md-12 mb-5 ">
                
                <div class="row">
                    @foreach(json_decode($notice->files) as $file)
                    <div class="col-md-6 mx-auto">
                        <div class="new-handbook text-align">
                            <iframe src ="{{ pdf_storage_url($file->{'file_path'}) }}" width="100%" height="500px"></iframe>
                            <a class="d-block cursor-pointer" target="_blank" href="{{route('sp.file.download', base64_encode($file->file_path))}}"><h3 > {{$file->file_name}}</h3></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        @if(count($count)>12)
            <div class="see-button text-align">
                <a href="javascript:void(0)" class="more" data-count={{count($notices)}} data-offset="12" data-slug="{{$slug}}">{{_('See More')}}</a>
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
        var slug = $(this).attr('data-slug');
        let _url = ("{{ route('notices', ['offset','slug']) }}");
        let __url = _url.replace('offset', offset);
        let ___url = __url.replace('slug', slug);
        var count = $(this).attr('data-count');
        $.ajax({
            url: ___url,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                
                $('.more').attr('data-offset', parseInt(offset)+limit);
                data.notices.forEach(function (notice) {
                    var result = '';
                    count = parseInt(count)+1;
                    result+= `
                            <div class="col-md-9">
                                <h4>${count}. ${notice.title}</h4>
                            </div>
                                <div class="col-md-3">
                                    <h5 class="text-md-end"><small>Release Date: ${notice.release_date}</small></h5>
                                </div>
                                <div class="col-md-12 mb-5 ">
                                    
                                    <div class="row">
                                `;
                    var files = $.parseJSON(notice.files);
                    
                    $.each(files, function(key) {
                        var pdfLink = '{{ asset("/laraview/#../storage/file") }}'.replace('file', files[key]['file_path']);
                        var routeFileDownload = '{{ route("sp.file.download", ":file") }}'.replace(':file', btoa(files[key]['file_path']));
                        result += `
                        <div class="col-md-6 mx-auto">
                        <div class="new-handbook text-align">
                        <iframe src="${pdfLink}" width="100%" height="500px"></iframe>
                        <a class="d-block cursor-pointer" target="_blank" href="${routeFileDownload}">
                            <h3>${files[key]['file_name']}</h3>
                        </a>
                        </div>
                        </div>
                        `;
                    });
                    result +=`
                            </div>
                            </div>`;

                    $('.notices').append(result);
                });
                $('.more').attr('data-count', count);
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
