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
<section class="notice-board-section section-padding">
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
                                    <a href="{{route('sp.file.download', base64_encode($file->file_path))}}"><i title="{{substr(strrchr($file->file_path, '/'), 1)}}" class="fa-solid fa-cloud-arrow-down"></i></a>
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
</section>
@endsection
