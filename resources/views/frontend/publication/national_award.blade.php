@extends('frontend.master')

@section('title', 'National Awards')

@section('content')

    <!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = asset('breadcumb_img/publications.jpg');
        $title = "ICSB National Award Souvenir";
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
            <div class="row gy-4 awards">
                @foreach ($national_awards as $award)
                    <div class="col-xl-3 col-lg-4 col-md-6 the_cs mb-5">
                        <div class="new-handbook text-align">
                                <iframe src="{{ route('view.pdf', base64_encode($award->file)) }}" type="application/pdf" width="100%" height="200px"></iframe>
                                <a class="d-block cursor-pointer" target="_blank" href="{{route('sp.file.download', base64_encode($award->file))}}"><h3> {{$award->title}}</h3></a>
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
        let _url = ("{{ route('awards', ['offset']) }}");
        let __url = _url.replace('offset', offset);
        $.ajax({
            url: __url,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                $('.more').attr('data-offset', parseInt(offset)+limit);
                data.awards.forEach(function (award) {
                    var routeViewPdf = '{{ route("view.pdf", ":file") }}'.replace(':file', btoa(award.file));
                    var routeFileDownload = '{{ route("sp.file.download", ":file") }}'.replace(':file', btoa(award.file));

                    var result= `
                        <div class="col-xl-3 col-lg-4 col-md-6 the_cs  mb-5">
                            <div class="new-handbook text-align">
                                <iframe src="${routeViewPdf}" type="application/pdf" width="100%" height="200px"></iframe>
                                <a class="d-block cursor-pointer" target="_blank" href="${routeFileDownload}"><h3>${award.title}</h3></a>
                            </div>
                        </div>
                    `;
                    $('.awards').append(result);
                });
                if(data.awards.length<limit){
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
