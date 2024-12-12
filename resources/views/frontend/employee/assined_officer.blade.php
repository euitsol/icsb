@extends('frontend.master')

@section('title', 'Assigned Officers')

@section('content')
    <!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = asset('breadcumb_img/employees.jpg');
        $title = 'Assigned Officers';
        $datas = [
            'image' => $banner_image,
            'title' => $title,
            'paths' => [
                'home' => 'Home',
                'javascript:void(0)' => 'Employees',
            ],
        ];
    @endphp
    @include('frontend.includes.breadcrumb', ['datas' => $datas])
    <!-- =============================== Breadcrumb Section ======================================-->


    <section class="officers-section big-sec-min-height">
        <div class="container">
            @foreach ($branches as $key => $branch)
                <div class="officers_table">
                    <h3>{{ $branch->name }}</h3>
                    <table>
                        <tr>
                            <th>{{ _('SL') }}</th>
                            <th>{{ _('Image') }}</th>
                            <th>{{ _('Name and Designation') }}</th>
                            <th>{{ _('Contact Details') }}</th>
                        </tr>
                        @forelse ($branch->officers as $key=>$officer)
                            <tr>
                                <td>{{ $officer->order_key }}</td>
                                <td>
                                    <img src="{{ $officer->image ? storage_url($officer->image) : asset('no_img/no_img.jpg') }}"
                                        alt="{{ $officer->name }}">
                                </td>
                                <td>
                                    <p>{{ $officer->name }}</p>
                                    <p>{{ $officer->designation }}</p>
                                </td>
                                <td>
                                    <p>{{ _('Mobile:') }} <a
                                            href="tel:88{{ $officer->phone }}">{{ _('+88') }}{{ $officer->phone }}</a>
                                    </p>
                                    <p>{{ _('E-Mail:') }} <a
                                            href="mailto:{{ $officer->email }}">{{ $officer->email }}</a>
                                    </p>
                                </td>
                            </tr>
                        @empty
                            <h3 class="my-5 text-center w-100">{{ _('Officers Not Found') }}</h3>
                        @endforelse

                    </table>
                </div>
            @endforeach

        </div>
    </section>
@endsection
