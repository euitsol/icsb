@extends('backend.layouts.master', ['pageSlug' => 'user'])

@section('title', 'Users')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add User') }}</h5>
                </div>
                <form method="POST" action="{{ route('um.user.user_create') }}" autocomplete="off">
                    @csrf
                        <div class="card-body">
                            <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('User Name') }}</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Name') }}" value="{{ old('name') }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                            <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ _('Email') }}</label>
                                <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Email') }}" value="{{ old('email') }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                            <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label>{{ _('Password') }}</label>
                                <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ _('Password') }}">
                                @include('alerts.feedback', ['field' => 'password'])
                            </div>
                            <div class="form-group {{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                                <label>{{ _('Confirm Password') }}</label>
                                <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="{{ _('Confirm Password') }}">
                                @include('alerts.feedback', ['field' => 'password_confirmation'])
                            </div>
                            <div class="form-group {{ $errors->has('role') ? ' has-danger' : '' }}">
                                <label>{{ _('Role') }}</label>
                                <select name="role" class="form-control {{ $errors->has('role') ? ' is-invalid' : '' }}">
                                    <option selected hidden>{{_('Select Role')}}</option>
                                    @foreach ($roles as $role)
                                        <option {{(old('role') == $role->id) ? 'selected' : ''}} value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @include('alerts.feedback', ['field' => 'role'])
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
                        <b>{{ _('User') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>User Name:</b> This field is required. It is a text field with character limit of 6-255 characters </p>

                        <p><b>Email:</b> This field is required and unique. It is a email field with a maximum character limit of 255. The entered value must follow the standard email format (e.g., user@example.com).</p>

                        <p><b>Password:</b> This field is required. It is a password field. Password strength should meet the specified criteria (e.g., include uppercase and lowercase letters, numbers, and special characters). The entered password should be a minimum of 6 characters.</p>

                        <p><b>Confirm Password:</b> This field is required. It is a password field. It should match the entered password in the "Password" field.</p>

                        <p><b>Role:</b> This field is required. This is an option field. It represents the user's role.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('.prefix-checkbox').on('click', function() {
            var prefix = $(this).data('prefix');
            var permissionCheckboxes = $(this).closest('h3').next('ul').find('.permission-checkbox');
            var isChecked = $(this).prop('checked');

            permissionCheckboxes.prop('checked', isChecked);
        });

        $('.permission-checkbox').on('click', function() {
            var checkboxId = $(this).attr('id');
            var prefix = $(this).closest('ul').prev('h3').find('.prefix-checkbox');
            var permissionCheckboxes = $(this).closest('ul').find('.permission-checkbox');
            var isAllChecked = permissionCheckboxes.length === permissionCheckboxes.filter(':checked').length;

            prefix.prop('checked', isAllChecked);
        });

        // Handle click event on text elements
        $('label[for^="permission-checkbox-"]').on('click', function() {
            var checkboxId = $(this).attr('for');
            $('#' + checkboxId).prop('checked'); // Trigger the associated checkbox click event
        });
        $('label[for^="permission-checkbox-"]').on('click', function() {
            var checkboxId = $(this).attr('for');
            $('#' + checkboxId).prop('checked'); // Trigger the associated checkbox click event
        });
    });
</script>
@endpush
