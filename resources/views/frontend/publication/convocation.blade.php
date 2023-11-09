@extends('frontend.master')

@section('title', 'Convocation')

@section('content')

    <!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = asset('breadcumb_img/publications.jpg');
        $title = "ICSB Convocation Souvenir";
        $datas = [
            'image' => $banner_image,
            'title' => $title,
            'paths' => [
                'home' => 'Home',
                'javascript:void(0)' => 'Publications',
            ],
        ];
    @endphp
    @include('frontend.includes.breadcrumb', ['datas' => $datas])
    <!-- =============================== Breadcrumb Section ======================================-->
    <section class="library-section big-sec-min-height">
        <div class="container">
            <div class="row convocations">
                @foreach ($convocations as $convocation)
                    <div class="col-xl-3 col-lg-4 col-md-6 the_cs mb-5">
                        <div class="new-handbook text-align">
                            <iframe src ="{{ pdf_storage_url($convocation->file) }}" width="100%" height="400px"></iframe>
                            <a class="d-block cursor-pointer" target="_blank" href="{{route('sp.file.download', base64_encode($convocation->file))}}"><h3> {{$convocation->title}}</h3></a>
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
        let _url = ("{{ route('convocations', ['offset']) }}");
        let __url = _url.replace('offset', offset);
        $.ajax({
            url: __url,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                $('.more').attr('data-offset', parseInt(offset)+limit);
                data.convocations.forEach(function (convocation) {
                    var pdfLink = '{{ asset("/laraview/#../storage/file") }}'.replace('file', convocation.file);
                    var routeFileDownload = '{{ route("sp.file.download", ":file") }}'.replace(':file', btoa(convocation.file));

                    var result= `
                        <div class="col-xl-3 col-lg-4 col-md-6 the_cs mb-5">
                            <div class="new-handbook text-align">
                                <iframe src ="${pdfLink}" width="100%" height="400px"></iframe>
                                <a class="d-block cursor-pointer" target="_blank" href="${routeFileDownload}"><h3>${convocation.title}</h3></a>
                            </div>
                        </div>
                    `;
                    $('.convocations').append(result);
                });
                if(data.convocations.length<limit){
                    $('.more').parent().hide();
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching convocations:', error);
            }
            });
        });
    });
</script>
@endpush
