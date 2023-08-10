@extends('backend.layouts.master', ['pageSlug' => 'job_placement'])

@section('title', 'Add Job Placement')
@push('css')
<style>
    .input-group-append .input-group-text {
        border-left: none;
        padding: 0 !important;
        border: 0;
        color: #ddd;
        justify-content: center;
    }
    .input-group-append{
        border-radius: 0 !important;
        border-color: rgba(29, 37, 59, 0.5);
    }
    .input-group .form-control:not(:first-child):not(:last-child){
        border-radius: 0 !important;
    }
    .form-control:focus+.input-group-append .input-group-text, .form-control:focus~.input-group-append .input-group-text{
        border-color: transparent;
    }
</style>

@endpush
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Add Job Placement') }}</h5>
                </div>
                <form method="POST" action="{{ route('job_placement.jp_create') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                            <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                                <label>{{ _('Job Title') }}</label>
                                <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter job title') }}" value="{{ old('title') }}">
                                @include('alerts.feedback', ['field' => 'title'])
                            </div>
                            <div class="form-group {{ $errors->has('company_name') ? ' has-danger' : '' }}">
                                <label>{{ _('Company Name') }}</label>
                                <input type="text" name="company_name" class="form-control {{ $errors->has('company_name') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter job company_name') }}" value="{{ old('company_name') }}">
                                @include('alerts.feedback', ['field' => 'company_name'])
                            </div>
                            <div class="form-group {{ $errors->has('company_url') ? ' has-danger' : '' }}">
                                <label>{{ _('Company URL') }}</label>
                                <input type="url" name="company_url" class="form-control {{ $errors->has('company_url') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter job company_url') }}" value="{{ old('company_url') }}">
                                @include('alerts.feedback', ['field' => 'company_url'])
                            </div>
                            <div class="form-group {{ $errors->has('job_type') ? ' has-danger' : '' }} {{ $errors->has('job_type.*') ? ' has-danger' : '' }}">
                                <label>Job Type</label>
                                <div class="form-check">
                                    <label class="form-check-label mr-3">{{_('Full-Time')}}
                                        <input class="form-check-input" name=job_type[] type="checkbox" value="Full-Time">
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                    <label class="form-check-label mr-3">{{_('Part-Time')}}
                                        <input class="form-check-input" name=job_type[] type="checkbox" value="Part-Time">
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                    <label class="form-check-label mr-3">{{_('Work From Home')}}
                                        <input class="form-check-input" name=job_type[] type="checkbox" value="Work From Home">
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                    <label class="form-check-label mr-3">{{_('Contractual')}}
                                        <input class="form-check-input" name=job_type[] type="checkbox" value="Contractual">
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                    <label class="form-check-label mr-3">{{_('Intern')}}
                                        <input class="form-check-input" name=job_type[] type="checkbox" value="Intern">
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                @include('alerts.feedback', ['field' => 'job_type'])
                                @include('alerts.feedback', ['field' => 'job_type.*'])
                            </div>

                            <div class="form-group row {{ $errors->has('salary') ? ' has-danger' : '' }} {{ $errors->has('salary.*') ? ' has-danger' : '' }} {{ $errors->has('salary_type') ? ' has-danger' : '' }}">
                                <label class="col-md-12">Salary</label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="salary[from]" value="{{ old('salary.from') }}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">{{ _('to') }}</div>
                                        </div>
                                        <input type="number" class="form-control" name="salary[to]" value="{{ old('salary.to') }}">
                                        <select name="salary_type" class="form-control">
                                            <option selected hidden>{{ _('Select Salary Type') }}</option>
                                            <option value="Per Month">{{ _('Per Month') }}</option>
                                            <option value="Per Year">{{ _('Per Year') }}</option>
                                        </select>
                                    </div>
                                </div>
                                @include('alerts.feedback', ['field' => 'salary'])
                                @include('alerts.feedback', ['field' => 'salary.*'])
                                @include('alerts.feedback', ['field' => 'salary_type'])
                            </div>
                            <div class="form-group {{ $errors->has('deadline') ? ' has-danger' : '' }}">
                                <label>{{ _('deadline') }}</label>
                                <input type="datetime-local" name="deadline" class="form-control {{ $errors->has('deadline') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter deadline') }}" value="{{ old('deadline') }}">
                                @include('alerts.feedback', ['field' => 'deadline'])
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
                        {{ _('Job Placement') }}
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
@endpush
