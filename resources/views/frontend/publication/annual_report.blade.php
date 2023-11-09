@extends('frontend.master')

@section('title', 'Annual Report')

@section('content')

    <!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = asset('breadcumb_img/publications.jpg');
        $title = $single_page->title;
        if(isset(json_decode($single_page->saved_data)->{"banner-image"})){
            $banner_image = storage_url(json_decode($single_page->saved_data)->{"banner-image"});
        }
        $datas = [
                    'image'=>$banner_image,
                    'title'=>$title,
                    'paths'=>[
                                'home'=>'Home',
                                'javascript:void(0)'=>'Publications',
                            ]
                ];
    @endphp
    @include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
<section class="cs-handbook-section section-padding">
    <div class="container">
        <div class="row all justify-content-center" >
            @if (isset(json_decode($single_page->saved_data)->{'upload-files'}))
                    @php
                        $files = (array)json_decode($single_page->saved_data)->{'upload-files'};
                        $files = array_reverse($files);
                    @endphp
                    @foreach (array_slice($files, 0, 12) as $file)
                        <div class="col-xl-3 col-lg-4 col-md-6 the_cs mb-5">
                            <div class="new-handbook text-align">
                                <iframe src ="{{ pdf_storage_url($file) }}" width="100%" height="400px"></iframe>
                                <a class="d-block cursor-pointer" target="_blank" href="{{ route('sp.file.download', base64_encode($file)) }}">
                                    <h3>{{ ucfirst(str_replace('-', ' ', Str::before(basename($file), '.pdf'))) }}</h3>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
        </div>
        @if(isset($files) && count($files)>12)
            <div class="see-button text-align">
                <a href="javascript:void(0)" class="more" data-offset="12" data-slug="{{$single_page->frontend_slug}}">{{_('See More')}}</a>
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
        let slug = $(this).data('slug');
        var offset = $(this).attr('data-offset');
        let _url = ("{{ route('single_page.see_more', ['slug','offset']) }}");
        let __url = _url.replace('slug', slug);
        let ___url = __url.replace('offset', offset);
        console.log(___url);
            $.ajax({
                url: ___url,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                $('.more').attr('data-offset', parseInt(offset)+limit);
                data.files.forEach(function (file) {
                    // var routeViewPdf = '{{ route("view.pdf", ":file") }}'.replace(':file', btoa(file));
                    var pdfLink = '{{ asset("/laraview/#../storage/file") }}'.replace('file', file);
                    var routeFileDownload = '{{ route("sp.file.download", ":file") }}'.replace(':file', btoa(file));
                    var fileName = file.split('/').pop().split('.').slice(0, -1).join('.');


                    result = `
                        <div class="col-xl-3 col-lg-4 col-md-6 the_cs mb-5">
                            <div class="new-handbook text-align">
                                    <iframe src ="${pdfLink}" width="100%" height="400px"></iframe>
                                    <a class="d-block cursor-pointer" target="_blank" href="${routeFileDownload}"><h3 > ${fileName}</h3></a>
                            </div>
                        </div>
                    `;
                    $('.all').append(result);
                });
                if(data.files.length<limit){
                    $('.more').parent().hide();
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching awards:', error);
            }
            });
        });
    });
</script>
@endpush
