@extends('backend.layouts.master', ['pageSlug' => 'role'])

@section('title', 'Edit Role')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Role') }}</h5>
                </div>
                <form method="POST" action="{{ route('um.role.role_edit', $role->id) }}" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                            <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('Role Name') }}</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Name') }}" value="{{ $role->name }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group {{ $errors->has('note') ? ' has-danger' : '' }}">
                                <label>{{ _('Note') }} </label><small>({{ _('optional') }})</small>
                                <textarea rows="3" name="note" class="form-control {{ $errors->has('note') ? ' is-invalid' : '' }}">
                                    {{ $role->note }}
                                </textarea>
                                @include('alerts.feedback', ['field' => 'note'])
                            </div>

                            <div class="row">
                                @foreach ($groupedPermissions->chunk(2) as $chunks)
                                    <div class="col-md-6">
                                        @foreach ($chunks as $prefix => $permissions)
                                        <h3>
                                            <input type="checkbox" class="prefix-checkbox" id="prefix-checkbox-{{ $prefix }}" data-prefix="{{ $prefix }}">
                                            <label for="prefix-checkbox-{{ $prefix }}">{{ $prefix }}</label>
                                        </h3>
                                        <ul>
                                            @foreach($permissions as $permission)
                                                <li>
                                                    <input type="checkbox" name="permissions[]" id="permission-checkbox-{{ $permission->id }}" value="{{ $permission->id }}" class="permission-checkbox" @if($role->hasPermissionTo($permission->name)) @checked(true) @endif>
                                                    <label for="permission-checkbox-{{ $permission->id }}">{{ $permission->name }}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                        @endforeach
                                    </div>
                                @endforeach
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
                        {{ _('Role') }}
                    </p>
                    <div class="card-description">
                        {{ _('The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.') }}
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
