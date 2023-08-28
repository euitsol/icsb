@extends('frontend.master')

@section('title', 'Council')

@section('content')
<!-- =============================== Breadcrumb Section ======================================-->
@php
$banner_image = asset('breadcumb_img/council.jpg');
$title = stringLimit($council->title,20,'...');
$datas = [
            'image'=>$banner_image,
            'title'=>$title,
            'paths'=>[
                        'home'=>'Home',
                        'javascript:void(0)'=>'Council',
                    ]
        ];
@endphp
@include('frontend.includes.breadcrumb',['datas'=>$datas])
<!-- =============================== Breadcrumb Section ======================================-->
<!----============================= council Section ========================---->
<div class="council-section py-5">
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
                            <img
                                src="{{getMemberImage($c_members[$index]->member)}}"
                                alt="{{$c_members[$index]->member->name}}"
                            />
                            <div class="info text-center">
                                <p>{{$c_members[$index]->council_member_type->title}}</p>
                                <h5>{{$c_members[$index]->member->name}}</h5>
                            </div>
                        </div> {{-- Replace id with the desired property --}}
                        @php
                            $index++;
                        @endphp
                    @endif
                @endfor
            </div>
            @php
                if($index == 1){
                    $step+=2;
                }elseif($index >= 3 && $index <=12){
                    $step++;
                }

            @endphp
        @endwhile




    </div>
</div>

@endsection
