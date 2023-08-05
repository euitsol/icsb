@extends('backend.layouts.master', ['pageSlug' => 'single_page'])

@section('title', 'Create Single Page')
@push('css')
<style>
</style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Create Single Page') }}</h5>
                </div>
                <form method="POST" action="{{ route('sp.store') }}" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        @include('alerts.success')
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title"class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Page key / Backend slug</label>
                            <input type="text" name="page_key"class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Frontend slug</label>
                            <input type="text" name="frontend_slug"class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Documentation Title</label>
                            <input type="text" name="documentation[title]"class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Documentation Details</label>
                            <textarea class="form-control" name="documentation[details]"></textarea>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <p class="m-0">Input Fields</p>
                            <div class="row">
                                <a href="javascript:void(0)" class="btn btn-dark btn-sm btn-rounded p-6 ml-4 generate_atf" data-count="0"><i class="fa fa-plus-circle"></i>
                                    {{ trans('Add Field') }}
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row addedField">

                            </div>
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
                        {{ _('Blog') }}
                    </p>
                    <div class="card-description">
                        {{ _('The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_link')

<script>
    'use script'
    $(document).on('click', '.generate_atf', function () {
        let count = $(this).data('count') + 1;
        $(this).data('count', count);
        var form = `<div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input name="formdata[${count}][field_name]" class="form-control " type="text" value="" required placeholder="{{trans('Field Name')}}">

                                    <select name="formdata[${count}][type]"  class="form-control form-data">
                                        <option value="text">{{trans('Input Text')}}</option>
                                        <option value="number">{{trans('Input Number')}}</option>
                                        <option value="url">{{trans('Input URL')}}</option>
                                        <option value="email">{{trans('Email')}}</option>
                                        <option value="date">{{trans('Date')}}</option>
                                        <option value="option">{{trans('Option')}}</option>
                                        <option value="textarea">{{trans('Textarea')}}</option>
                                        <option value="image">{{trans('Image')}}</option>
                                        <option value="image_multipe">{{trans('Multiple Image')}}</option>
                                        <option value="file_single">{{trans('File Single')}}</option>
                                        <option value="file_multiple">{{trans('File Multiple')}}</option>
                                    </select>

                                    <select name="formdata[${count}][required]"  class="form-control  ">
                                        <option value="required">{{trans('Required')}}</option>
                                        <option value="nullable">{{trans('Optional')}}</option>
                                    </select>

                                    <span class="input-group-btn">
                                        <button class="btn btn-danger delete_desc" type="button" style=" margin-top: 0px; padding-bottom: 8px;">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group select_option" style="display:none">
                                <label>Add select fields option and values (value = option) <small>(Eg. 0 = Off; 1 = On)</small> </label>
                                <textarea class="form-control" name="formdata[${count}][option_data]"></textarea>
                            </div>
                        </div>
                        `;

        // $('.addedField').append(form);
        $(this).closest('.card').find('.addedField').append(form);
    });

    $(document).on('click', '.delete_desc', function () {
		$(this).closest('.input-group').parent().remove();
	});

    $(document).on('change', '.form-data', function () {
        var selectedType = $(this).val();
        var optionInputs = $(this).closest('.col-md-12').find('.select_option');
        if (selectedType === 'option') {
            optionInputs.show();
        } else {
            optionInputs.hide();
        }
	});
</script>
@endpush
