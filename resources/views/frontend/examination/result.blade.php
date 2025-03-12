@extends('frontend.master')

@section('title', 'Result')

@section('content')
    <!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = asset('breadcumb_img/examination.jpg');
        $title = $single_page->title;
        if (isset(json_decode($single_page->saved_data)->{"banner-image"})) {
            $banner_image = storage_url(json_decode($single_page->saved_data)->{"banner-image"});
        }
        $datas = [
            'image' => $banner_image,
            'title' => $title,
            'paths' => [
                'home' => 'Home',
                'javascript:void(0)' => 'Examination',
            ],
        ];
    @endphp
    @include('frontend.includes.breadcrumb', ['datas' => $datas])
    <!-- =============================== Breadcrumb Section ======================================-->
    <section class="cs-handbook-section section-padding">
        <div class="container">
            @if (isset(json_decode($single_page->saved_data)->{'upload-files'}))
                <div class="row all justify-content-center">
                    @php
                        $files = array_reverse((array) json_decode($single_page->saved_data)->{'upload-files'});
                    @endphp
                    @foreach (array_slice($files, 0, 4) as $file)
                        <div class="col-md-6 the_cs mb-5 mx-auto">
                            <div class="new-handbook text-align">
                                <iframe src ="{{ pdf_storage_url($file) }}" width="100%" height="500px"></iframe>
                                <a class="d-block cursor-pointer" target="_blank"
                                    href="{{ route('sp.file.download', base64_encode($file)) }}">
                                    <h3> {{ ucfirst(str_replace('-', ' ', Str::before(basename($file), '.pdf'))) }}</h3>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if (count($files) > 4)
                    <div class="see-button text-align">
                        <a href="javascript:void(0)" data-offset="4" class="more"
                            data-slug="{{ $single_page->frontend_slug }}">{{ _('See More') }}</a>
                    </div>
                @endif
            @endif
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.more').on('click', function() {
                var limit = 4;
                let slug = $(this).data('slug');
                var offset = $(this).attr('data-offset');
                let _url = ("{{ route('single_page.see_more', ['slug', 'offset', 'limit']) }}");
                let __url = _url.replace('slug', slug);
                let ___url = __url.replace('offset', offset);
                let ____url = ___url.replace('limit', limit);
                $.ajax({
                    url: ____url,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('.more').attr('data-offset', parseInt(offset) + limit);
                        data.files.forEach(function(file) {
                            // var routeViewPdf = '{{ route('view.pdf', ':file') }}'.replace(':file', btoa(file));
                            var pdfLink = '{{ asset('/laraview/#../storage/file') }}'
                                .replace('file', file);
                            var routeFileDownload =
                                '{{ route('sp.file.download', ':file') }}'.replace(
                                    ':file', btoa(file));
                            var fileName = file.split('/').pop().split('.').slice(0, -1)
                                .join('.');


                            result = `
                        <div class="col-md-6 the_cs mb-5 mx-auto">
                            <div class="new-handbook text-align">
                                    <iframe src ="${pdfLink}" width="100%" height="500px"></iframe>
                                    <a class="d-block cursor-pointer" target="_blank" href="${routeFileDownload}"><h3 > ${fileName}</h3></a>
                            </div>
                        </div>
                    `;
                            $('.all').append(result);
                        });
                        if (data.files.length < limit) {
                            $('.more').parent().hide();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching awards:', error);
                    }
                });
            });
        });
    </script>
@endpush
