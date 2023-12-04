@extends('frontend.master')

@section('title', 'Admission Corner')
@push('css')
<style>
    table {
        background-color: #f8f9f9;
        margin: 0;
    }
    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;  
    }
    .image-columns{
        max-width: 45px ;
    }
    .image-columns img{
        width: 100%;

    }
    .serial {
        width: 3%;
        text-align: center;
        font-weight: bold;
    }
    td strong{
        color:#444444;
    }
    td span{
        font-family: Roboto, sans-serif;
        font-size: 14px;
        line-height: 18px;
        font-weight: 400;
        font-style: normal;
    }
    .image{
        position: relative;
        overflow: hidden;
    }
    .image{
        width: auto;
        margin: 0 auto;
    }
    .image .page_image{
        transition: .4s;
    }
    .details-button{
        position: absolute;
        top: 110%;
        left: 50%;
        transform: translate(-50%, -50%);
        transition: .4s;
        opacity: 0;
        visibility: hidden;
    }
    .image:hover .details-button{
        top: 50%;
        opacity: 1;
        visibility: visible;
    }
    .image:hover .page_image {
        opacity: .5;
    }
    
</style>
@endpush

@section('content')
    <!-- =============================== Breadcrumb Section ======================================-->
    @php
        $banner_image = asset('breadcumb_img/students.jpg');
        $title = 'Admission Corner';
        $datas = [
            'image' => $banner_image,
            'title' => $title,
            'paths' => [
                'home' => 'Home',
            ],
        ];
    @endphp
    @include('frontend.includes.breadcrumb', ['datas' => $datas])
    <!--=========================== Contact Form Section ==========================-->

    <section class="admission-corner-section big-sec-min-height">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(!empty($page_image->page_image))
                    <div class="card mb-4 border-0">
                        <div class="image">
                            <img class="mx-auto @if(!empty($page_image->url)) page_image @endif" style="max-width: 100%; width:auto;" src="{{storage_url($page_image->page_image)}}" alt="{{__('Admission Corner Page Image')}}">
                            @if(!empty($page_image->url))
                                <div class="details-button">
                                    <a href="{{$page_image->url}}" class="btn btn-outline-dark px-5 py-4"><strong>DETAILS</strong></a>
                                </div>
                            @endif
                        </div>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h1 class="entry-title-icmab p-3 m-0">Admission Corner Information</h1>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-responsive m-0">
                                <tbody>
                                    @foreach($details as $key=>$detail)
                                    <tr>
                                        <td class="serial">{{$key+1}}</td>
                                        <td class="image-columns">
                                            <img
                                                src="{{storage_url($detail->image)}}"
                                                alt="{{$detail->name}}" ></td>
                                        <td>
                                            <strong>{{$detail->name}}</strong><br>
                                            <strong>{{$detail->designation}}</strong><br>
                                            <span> Cell : {{$detail->phone}}</span><br>
                                            <span>e-mail : {{$detail->email}}</span><br>
                                            <span>Phone: 
                                                @foreach((json_decode($detail->telephone, true)) as $key=>$telephone)
                                                    {{$telephone}}{{((count(json_decode($detail->telephone, true))-1)!= $key) ? ', ' :''}}
                                                @endforeach
                                            </span><br>
                                            @if(!empty($detail->pabx))
                                                <span>PABX Ext. : {{$detail->pabx}}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
