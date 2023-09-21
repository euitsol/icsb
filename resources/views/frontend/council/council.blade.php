@extends('frontend.master')

@section('title', 'Council')

@section('content')
    <!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = asset('breadcumb_img/council.jpg');
        $title = stringLimit($council->title, 20, '...');
        $datas = [
            'image' => $banner_image,
            'title' => $title,
            'paths' => [
                'home' => 'Home',
                'javascript:void(0)' => 'Council',
            ],
        ];
    @endphp
    @include('frontend.includes.breadcrumb', ['datas' => $datas])
    <!-- =============================== Breadcrumb Section ======================================-->
    <!----============================= council Section ========================---->
    <div class="council-section big-sec-min-height">
        <div class="container">
            @php
                $index = 0;
                $step = 1;
            @endphp

            @while ($index < count($c_members))
                <div class="row justify-content-center my-4">
                    @for ($i = 0; $i < $step; $i++)
                        @if ($index < count($c_members))
                            <div class="column">
                                <img src="{{ getMemberImage($c_members[$index]->member) }}"
                                    alt="{{ $c_members[$index]->member->name }}" />
                                <div class="info text-center">
                                    <p>{{ $c_members[$index]->council_member_type->title }}</p>
                                    <h5 type="button" class="profile_data" data-member-id="{{ $c_members[$index]->member->id }}">
                                        {{ $c_members[$index]->member->name }}</h5>
                                </div>
                            </div> {{-- Replace id with the desired property --}}
                            @php
                                $index++;
                            @endphp
                        @endif
                    @endfor
                </div>
                @php
                    if ($index == 1) {
                        $step += 2;
                    } elseif ($index >= 3 && $index <= 12) {
                        $step++;
                    }

                @endphp
            @endwhile
            @if (count($c_members) < 0)
                <h3 class="my-5 text-center w-100">{{ _('Council Member Not Found') }}</h3>
            @endif




        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="view-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Profile Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="fellow-row flex my-5" id="member_data">
                            {{-- <div class="fellow-items flex w-100">
                                <div class="image-column">
                                    <img src="{{ asset('no_img/no_img.jpg') }}" alt="">
                                </div>
                                <div class="content-column">
                                    <h4>{{ _('Member ID: F-001') }}</h4>
                                    <h3 class="mb-0">Md Shariful Islam</h3>
                                    <p><strong>Software Developer <br> European IT Solutions Bangladesh</strong></p>
                                    <li><i class="fa-solid fa-house-circle-exclamation"></i>House # 412 (A8), Road # 8,
                                        Block #D Bashundhara R/A, Dhaka-1229</li>
                                    <li><i class="fa-solid fa-phone"></i>Phone: <a
                                            href="tel:+8801792980503">+8801792980503(Official)</a></li>
                                    <li><i class="fa-solid fa-envelope-open-text"></i>Email: <a
                                            href="mailto:shariful94@gmail.com">shariful94@gmail.com</a></li>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button> --}}
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.profile_data').on('click', function() {
                let id = $(this).data('member-id');
                let _url = ("{{ route('m.info', ['member_id']) }}");
                let __url = _url.replace('member_id', id);
                $.ajax({
                    url: __url,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var noImage = '{{asset("no_img/no_img.jpg")}}';
                        var image = `{{ storage_url('${data.member.image}') }}`;
                        var member_image = data.member.image ? image : noImage;
                        $('#member_data').html(`
                                                <div class="fellow-items flex w-100">
                                                    <div class="image-column">
                                                        <img src="${member_image}" alt="">
                                                    </div>
                                                    <div class="content-column">
                                                        <h4>Member ID: ${data.member_id}</h4>
                                                        <h3 class="mb-0">${data.member.name}</h3>
                                                        <p><strong>${data.member.designation}<br> European IT Solutions Bangladesh</strong></p>
                                                        <li><i class="fa-solid fa-house-circle-exclamation"></i>House # 412 (A8), Road # 8,
                                                            Block #D Bashundhara R/A, Dhaka-1229</li>
                                                        <li><i class="fa-solid fa-phone"></i>Phone: <a
                                                                href="tel:+8801792980503">+8801792980503(Official)</a></li>
                                                        <li><i class="fa-solid fa-envelope-open-text"></i>Email: <a
                                                                href="mailto:${data.member.email}">${data.member.email}</a></li>
                                                    </div>
                                                </div>
                                            `);
                        $('#view-modal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching member data:', error);
                    }
                });
            });
        });
    </script>
@endpush
