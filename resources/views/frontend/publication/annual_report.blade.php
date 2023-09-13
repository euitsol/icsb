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
        <div class="row all" >
            @if (isset(json_decode($single_page->saved_data)->{'upload-files'}))
            @php
                $files = array_reverse((array)json_decode($single_page->saved_data)->{'upload-files'});
            @endphp
                @foreach (array_slice($files, -12) as $file)
                    <div class="col-md-3 the_cs mb-5">
                        <div class="new-handbook text-align">
                                <iframe src="{{ route('view.pdf', base64_encode($file)) }}" type="application/pdf" width="100%" height="200px"></iframe>
                                <a class="d-block cursor-pointer" target="_blank" href="{{route('sp.file.download', base64_encode($file))}}"><h3 > {{ucfirst(str_replace('-', ' ', Str::before(basename($file), '.pdf')))}}</h3></a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        @if(count($files)>12)
            <div class="see-button text-align">
                <a href="javascript:void(0)" class="more" data-slug="{{$single_page->frontend_slug}}">{{_('See More')}}</a>
            </div>
        @endif
    </div>
</section>
@endsection
@push('js')
<script>
    $(document).ready(function () {
    $('.more').on('click', function () {
        let slug = $(this).data('slug');
            $.ajax({
                url: `/single_page/see_more/${slug}`,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                var allDetailsHtml = '';

                // Loop through the awards data
                data.files.forEach(function (file) {
                    var routeViewPdf = '{{ route("view.pdf", ":file") }}'.replace(':file', btoa(file));
                    var routeFileDownload = '{{ route("sp.file.download", ":file") }}'.replace(':file', btoa(file));
                    var fileName = file.split('/').pop().split('.').slice(0, -1).join('.');


                    allDetailsHtml += `
                        <div class="col-md-3 the_cs mb-5">
                            <div class="new-handbook text-align">
                                    <iframe src="${routeViewPdf}" type="application/pdf" width="100%" height="200px"></iframe>
                                    <a class="d-block cursor-pointer" target="_blank" href="${routeFileDownload}"><h3 > ${fileName}</h3></a>
                            </div>
                        </div>
                    `;
                });

                // Insert the generated HTML into the '.awards' element
                $('.all').html(allDetailsHtml);
                $('.more').hide();
            },
            error: function (xhr, status, error) {
                console.error('Error fetching awards:', error);
            }
            });
        });
    });
</script>
@endpush
