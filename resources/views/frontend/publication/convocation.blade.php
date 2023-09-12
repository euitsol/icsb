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
                    <div class="col-md-3 the_cs mb-5">
                        <div class="new-handbook text-align">
                                <iframe src="{{ route('view.pdf', base64_encode($convocation->file)) }}" type="application/pdf" width="100%" height="200px"></iframe>
                                <a class="d-block cursor-pointer" target="_blank" href="{{route('sp.file.download', base64_encode($convocation->file))}}"><h3> {{$convocation->title}}</h3></a>
                        </div>
                    </div>
                @endforeach
            </div>
            @if(count($convocations)>12)
                <div class="see-button text-align">
                    <a href="javascript:void(0)" class="more">See More</a>
                </div>
            @endif

        </div>
    </section>
@endsection
@push('js')
<script>
    $(document).ready(function () {
    $('.more').on('click', function () {
        $.ajax({
            url: `/convocations/all`,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                var convocationDetailsHtml = '';

                // Loop through the awards data
                data.convocations.forEach(function (convocation) {
                    var routeViewPdf = '{{ route("view.pdf", ":file") }}'.replace(':file', btoa(convocation.file));
                    var routeFileDownload = '{{ route("sp.file.download", ":file") }}'.replace(':file', btoa(convocation.file));

                    convocationDetailsHtml += `
                        <div class="col-md-3 the_cs mb-5">
                            <div class="new-handbook text-align">
                                <iframe src="${routeViewPdf}" type="application/pdf" width="100%" height="200px"></iframe>
                                <a class="d-block cursor-pointer" target="_blank" href="${routeFileDownload}"><h3>${convocation.title}</h3></a>
                            </div>
                        </div>
                    `;
                });

                // Insert the generated HTML into the '.awards' element
                $('.convocations').html(convocationDetailsHtml);
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
