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
        @if(count($c_members)<0)
            <h3 class="my-5 text-center w-100">{{_('Council Member Not Found')}}</h3>
        @endif




    </div>
</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>

@endsection
