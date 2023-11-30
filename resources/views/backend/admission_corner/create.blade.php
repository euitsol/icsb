@extends('backend.layouts.master', ['pageSlug' => 'admission_corner'])

@section('title', 'Admission Corner')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add Admission Corner') }}</h5>
                </div>
                <form method="POST" action="{{ route('admission_corner.admission_corner_create') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label>{{ _('Name') }}</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Name') }}" value="{{ old('name') }}">
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="col-md-4 form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                                    <label>{{ _('Order') }}</label>
                                    <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}" name="order_key">
                                        <option value="" selected hidden>{{ _('Select Order') }}</option>
                                        @for ($x=1; $x<=100; $x++)
                                            @php
                                                $check = App\Models\AdmissionCorner::where('order_key',$x)->first();
                                            @endphp
                                            @if(!$check)
                                                <option value="{{$x}}">{{ $x }}</option>
                                            @endif
                                        @endfor
                                    </select>
                                    @include('alerts.feedback', ['field' => 'order_key'])
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('image') ? ' has-danger' : '' }}">
                                <label>{{ _('Image') }}</label>
                                <input type="file" accept="image/*" name="image" class="form-control image-upload  {{ $errors->has('image') ? ' is-invalid' : '' }}">
                                @include('alerts.feedback', ['field' => 'image'])
                           </div>

                            <div class="row">
                                <div class="col-md-6 form-group {{ $errors->has('designation') ? ' has-danger' : '' }}">
                                    <label>{{ _('Designation') }}</label>
                                    <input type="text" name="designation" class="form-control {{ $errors->has('designation') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Designation') }}" value="{{ old('designation') }}">
                                    @include('alerts.feedback', ['field' => 'designation'])
                                </div>
                                <div class="col-md-6 form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                                    <label>{{ _('Phone') }}</label>
                                    <input type="tel" name="phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Phone Number') }}" value="{{ old('phone') }}">
                                    @include('alerts.feedback', ['field' => 'phone'])
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-6 form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label>{{ _('Email') }}</label>
                                    <input type="text" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Email') }}" value="{{ old('email') }}">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <div class="col-md-6 form-group {{ $errors->has('pabx') ? ' has-danger' : '' }}">
                                    <label>{{ _('PABX') }}</label>
                                    <input type="tel" name="pabx" class="form-control {{ $errors->has('pabx') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter PABX') }}" value="{{ old('pabx') }}">
                                    @include('alerts.feedback', ['field' => 'pabx'])
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('telephone.*') ? ' has-danger' : '' }}">
                                <label>{{ _('Telephone-1') }}</label>
                                <div class="input-group mb-3">
                                    <input type="tel" name="telephone[]" class="form-control {{ $errors->has('telephone.*') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter Telephone Number') }}">
                                    <span class="input-group-text" id="add_telephone" data-count="1"><i class="tim-icons icon-simple-add"></i></span>
                                    @include('alerts.feedback', ['field' => 'telephone.*'])
                                </div>
                            </div>
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
                        <p><b>Designation:</b> This field is required. It is a text field with character limit of 255 characters. It represents the designation of the admission corner</p>
                        <p><b>Phone:</b> This field is required & unique. It represents the contact number of the admission corner</p>
                        <p><b>Email:</b> This field is required & unique. It is a email field with a maximum character limit of 255. The entered value must follow the standard email format (e.g., user@example.com) and represents the email of the admission corner.</p>
                        <p><b>PABX:</b> This field is nullable. It is a number field</p>
                        <p><b>Telephone:</b> This field is required. It represents the telephone number of the admission corner. By clicking on the '+' icon you can add multiple telephone numbers.</p>
                         
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
