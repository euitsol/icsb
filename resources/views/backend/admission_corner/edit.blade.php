@extends('backend.layouts.master', ['pageSlug' => 'admission_corner'])

@section('title', 'Admission Corner')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add Admission Corner') }}</h5>
                </div>
                <form method="POST" action="{{ route('admission_corner.admission_corner_edit',$admission_corner) }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label>{{ _('Name') }}</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Name') }}" value="{{ $admission_corner->name }}">
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class=" col-md-4 form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                                    <label>{{ _('Order') }}</label>
                                    <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                        @for ($x=1; $x<=1000; $x++)
                                            @php
                                                $check = App\Models\AdmissionCorner::where('order_key',$x)->first();
                                            @endphp
                                            @if($admission_corner->order_key == $x)
                                                <option value="{{$x}}" selected>{{ $x }}</option>
                                            @elseif(!$check)
                                                <option value="{{$x}}">{{ $x }}</option>
                                            @endif
                                        @endfor
                                    </select>
                                    @include('alerts.feedback', ['field' => 'order_key'])
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('Image') ? ' has-danger' : '' }}">
                                <label class="form-label">{{_('Image')}}</label>
                                <input type="file" accept="image/*" name="image"
                                    class="form-control image-upload  {{ $errors->has('image') ? ' is-invalid' : '' }}" data-existing-files="{{ storage_url($admission_corner->image) }}" data-delete-url="">
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group {{ $errors->has('designation') ? ' has-danger' : '' }}">
                                    <label>{{ _('Designation') }}</label>
                                    <input type="text" name="designation" class="form-control {{ $errors->has('designation') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Designation') }}" value="{{ $admission_corner->designation }}">
                                    @include('alerts.feedback', ['field' => 'designation'])
                                </div>
                                <div class="col-md-6 form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                                    <label>{{ _('Phone') }}</label>
                                    <input type="tel" name="phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Phone Number') }}" value="{{ $admission_corner->phone }}">
                                    @include('alerts.feedback', ['field' => 'phone'])
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-6 form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label>{{ _('Email') }}</label>
                                    <input type="text" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Email') }}" value="{{ $admission_corner->email }}">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <div class="col-md-6 form-group {{ $errors->has('pabx') ? ' has-danger' : '' }}">
                                    <label>{{ _('PABX') }}</label>
                                    <input type="tel" name="pabx" class="form-control {{ $errors->has('pabx') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter PABX') }}" value="{{ $admission_corner->pabx }}">
                                    @include('alerts.feedback', ['field' => 'pabx'])
                                </div>
                            </div>



                            @if(isset($admission_corner->telephone) && is_array(json_decode($admission_corner->telephone)))
                                @foreach (json_decode($admission_corner->telephone) as $key=>$telephone)
                                    <div class="form-group" @if($key>0) id="telephone-{{$key+1}}" @endif>
                                        <label>{{ _('Telephone-'.$key+1) }}</label>
                                        <div class="input-group mb-3">
                                            <input type="tel" name="telephone[]" class="form-control" placeholder="{{ _('Enter Telephone Number') }}" value="{{ $telephone }}">
                                            @if($key>0)
                                                <span class="input-group-text text-danger" onclick="delete_telephone({{$key+1}})"><i class="tim-icons icon-trash-simple"></i></span>
                                            @else
                                                <span class="input-group-text" id="add_telephone" data-count="{{ count(json_decode($admission_corner->telephone)) }}"><i class="tim-icons icon-simple-add"></i></span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="form-group {{ $errors->has('telephone.*') ? ' has-danger' : '' }}">
                                    <label>{{ _('Telephone-1') }}</label>
                                    <div class="input-group mb-3">
                                        <input type="tel" name="telephone[]" class="form-control {{ $errors->has('telephone.*') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Telephone Number') }}">
                                        <span class="input-group-text" id="add_telephone" data-count="1"><i class="tim-icons icon-simple-add"></i></span>
                                    </div>
                                </div>
                            @endif
                            @include('alerts.feedback', ['field' => 'telephone.*'])
                            <div id="telephone">

                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <b>{{ _('Admission Corner') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Name:</b> This field is required. It is a text field with character limit of 255 characters.</p>
                        <b>Order:</b> This field is required and unique. It is a number field. It manages the order of the Admission Corners</p>
                        <b>Image:</b> This field is required. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 400 x 450px.</p>
                        <p><b>Designation:</b> This field is required. It is a text field with character limit of 255 characters. It represents the designation of the assigned officers</p>
                        <p><b>Phone:</b> This field is required & unique. It represents the contact number of the assigned officers</p>
                        <p><b>Email:</b> This field is required & unique. It is a email field with a maximum character limit of 255. The entered value must follow the standard email format (e.g., user@example.com) and represents the email of the assigned officers.</p>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    //Append for Telephone
    $(document).ready(function() {
        $('#add_telephone').click(function() {
            result = '';
            count = $(this).data('count') + 1;
            $(this).data('count', count);

            result = `<div class="form-group" id="telephone-${count}">
                        <label>Telephone-${count}</label>
                        <div class="input-group mb-3">
                            <input type="text" name="telephone[]" class="form-control" placeholder="Enter Telephone Number">
                            <span class="input-group-text text-danger" onclick="delete_telephone(${count})"><i class="tim-icons icon-trash-simple"></i></span>
                        </div>
                    </div>`;

            $('#telephone').append(result);

        });
    });
    function delete_telephone(count) {
        $('#telephone-' + count).remove();
    };
</script>
@endpush
