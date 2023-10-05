@extends('backend.layouts.master', ['pageSlug' => 'job_placement'])

@section('title', 'Add Job Placement')
@push('css')
<style>
    .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable,
    .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
    height: 20vh !important;
    }
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
                            <div class="row">
                                <div class="form-group col-md-6 {{ $errors->has('company_name') ? ' has-danger' : '' }}">
                                    <label>{{ _('Company Name') }}</label>
                                    <input type="text" name="company_name" class="form-control {{ $errors->has('company_name') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter job company_name') }}" value="{{ old('company_name') }}">
                                    @include('alerts.feedback', ['field' => 'company_name'])
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('company_url') ? ' has-danger' : '' }}">
                                    <label>{{ _('Company URL') }}</label>
                                    <input type="url" name="company_url" class="form-control {{ $errors->has('company_url') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter job company_url') }}" value="{{ old('company_url') }}">
                                    @include('alerts.feedback', ['field' => 'company_url'])
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('application_url') ? ' has-danger' : '' }}">
                                    <label>{{ _('Application URL') }}</label>
                                    <input type="url" name="application_url" class="form-control {{ $errors->has('application_url') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter job application url') }}" value="{{ old('application_url') }}">
                                    @include('alerts.feedback', ['field' => 'application_url'])
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label>{{ _('Email') }}</label>
                                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter job email') }}" value="{{ old('email') }}">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('job_type') ? ' has-danger' : '' }}">
                                <label>Job Type</label>
                                <div class="form-radio">
                                    <input class="form-check-input ml-2" name='job_type' type="radio" value="Full-Time">
                                    <label class="form-check-label mr-3 ml-4">{{_('Full-Time')}}</label>
                                    <input class="form-check-input ml-2" name='job_type' type="radio" value="Part-Time">
                                    <label class="form-check-label mr-3 ml-4">{{_('Part-Time')}}</label>
                                    <input class="form-check-input ml-2" name='job_type' type="radio" value="Work From Home">
                                    <label class="form-check-label mr-3 ml-4">{{_('Work From Home')}}</label>
                                    <input class="form-check-input ml-2" name='job_type' type="radio" value="Contractual">
                                    <label class="form-check-label mr-3 ml-4">{{_('Contractual')}}</label>
                                    <input class="form-check-input ml-2" name='job_type' type="radio" value="Intern">
                                    <label class="form-check-label mr-3 ml-4">{{_('Intern')}}</label>
                                </div>
                                @include('alerts.feedback', ['field' => 'job_type'])
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
                                        <select name="salary_type" class="form-control no-select">
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
                                <label>{{ _('Deadline') }}</label>
                                <input type="date" name="deadline" class="form-control {{ $errors->has('deadline') ? ' is-invalid' : '' }}" placeholder="{{ _('Enter deadline') }}" value="{{ old('deadline') }}">
                                @include('alerts.feedback', ['field' => 'deadline'])
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 {{ $errors->has('educational_requirement') ? ' has-danger' : '' }}">
                                    <label>{{ _('Educational Requirement') }}</label>
                                    <input type="text" name="educational_requirement" class="form-control {{ $errors->has('educational_requirement') ? ' is-invalid' : '' }}" placeholder="{{ _('MBA/ M.Sc/ BBA/ Masters') }}" value="{{ old('educational_requirement') }}">
                                    @include('alerts.feedback', ['field' => 'educational_requirement'])
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('professional_requirement') ? ' has-danger' : '' }}">
                                    <label>{{ _('Professional Requirement') }}</label>
                                    <input type="text" name="professional_requirement" class="form-control {{ $errors->has('professional_requirement') ? ' is-invalid' : '' }}" placeholder="{{ _('FCS/ ACS/ QCS/ Certificate Level Passed') }}" value="{{ old('professional_requirement') }}">
                                    @include('alerts.feedback', ['field' => 'professional_requirement'])
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 {{ $errors->has('experience_requirement') ? ' has-danger' : '' }}">
                                    <label>{{ _('Experience Requirement') }}</label>
                                    <div class="input-group">
                                        <input type="number" name="experience_requirement" class="form-control w-75" value="{{ old('experience_requirement') }}" placeholder="Enter Experience Requirements">
                                        <input type="text" value="in Years" class="form-control text-center w-25" disabled>
                                    </div>
                                    @include('alerts.feedback', ['field' => 'experience_requirement'])
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('age_requirement') ? ' has-danger' : '' }}">
                                    <label>{{ _('Age Requirement') }}</label>
                                    <div class="input-group">
                                        <input type="number" value="{{ old('age_requirement') }}" name="age_requirement" class="form-control w-75" placeholder="Enter Age Requirements">
                                        <input type="text" value="in Years" class="form-control text-center w-25" disabled>
                                    </div>
                                    @include('alerts.feedback', ['field' => 'age_requirement'])
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('company_address') ? 'has-danger' : '' }}">
                                <label>{{ _('Company Address') }}</label>
                                <textarea name="company_address" class="form-control {{ $errors->has('company_address') ? ' is-invalid' : '' }}" placeholder="Enter company address">{{ old('company_address') }}</textarea>
                                @include('alerts.feedback', ['field' => 'company_address'])
                            </div>
                            <div class="form-group {{ $errors->has('job_responsibility') ? 'has-danger' : '' }}">
                                <label>{{ _('Job Responsibility') }}</label>
                                <textarea name="job_responsibility" class="form-control {{ $errors->has('job_responsibility') ? ' is-invalid' : '' }}" placeholder="Enter job responsibility">{{ old('job_responsibility') }}</textarea>
                                @include('alerts.feedback', ['field' => 'job_responsibility'])
                            </div>
                            <div class="form-group {{ $errors->has('additional_requirement') ? 'has-danger' : '' }}">
                                <label>{{ _('Additional Requirement') }}</label>
                                <textarea name="additional_requirement" class="form-control {{ $errors->has('additional_requirement') ? ' is-invalid' : '' }}" placeholder="Enter additional requirement">{{ old('additional_requirement') }}</textarea>
                                @include('alerts.feedback', ['field' => 'additional_requirement'])
                            </div>
                            <div class="form-group {{ $errors->has('job_location') ? 'has-danger' : '' }}">
                                <label>{{ _('Job Location') }}</label>
                                <textarea name="job_location" class="form-control {{ $errors->has('job_location') ? ' is-invalid' : '' }}" placeholder="Enter job location">{{ old('job_location') }}</textarea>
                                @include('alerts.feedback', ['field' => 'job_location'])
                            </div>
                            <div class="form-group {{ $errors->has('other_benefits') ? 'has-danger' : '' }}">
                                <label>{{ _('Other Benefits') }}</label>
                                <textarea name="other_benefits" class="form-control {{ $errors->has('other_benefits') ? ' is-invalid' : '' }}" placeholder="Enter ohter benefits">{{ old('other_benefits') }}</textarea>
                                @include('alerts.feedback', ['field' => 'other_benefits'])
                            </div>
                            <div class="form-group {{ $errors->has('special_instractions') ? 'has-danger' : '' }}">
                                <label>{{ _('Special Instructions') }}</label>
                                <textarea name="special_instractions" class="form-control {{ $errors->has('special_instractions') ? ' is-invalid' : '' }}" placeholder="Enter special instractions">{{ old('special_instractions') }}</textarea>
                                @include('alerts.feedback', ['field' => 'special_instractions'])
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1">
                                  <span class="form-check-sign"><strong>{{_('Notify All Members')}}</strong></span>
                                </label>
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
