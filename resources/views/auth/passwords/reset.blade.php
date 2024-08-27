@extends('backend.layouts.master', ['class' => 'login-page', 'page' => _('Reset password'), 'contentClass' => 'login-page'])

@section('content')
    <div class="login-page">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                @include('alerts.success')
                <div class="shadow rounded">
                    <div class="row">
                        <div class="col-md-7 pe-0">
                            <div class="form-left h-100 py-5 px-5">
                                <h3 class="mb-3 text-center">{{ _('Reset password') }}</h3>
                                <form class="form row g-4" method="post" action="{{ route('password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token ?? '' }}">
                                    <input type="hidden" name="email" value="{{ $email ?? '' }}">
                                    <div class="col-12">
                                        <label>Email<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-text" style="border-radius: 0.25rem 0 0 0.25rem;"><i
                                                    class="fa-solid fa-envelope"></i></div>
                                            <input type="email"
                                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                value="{{ $email ?? '' }}" required disabled>
                                        </div>
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>


                                    <div class="col-12">
                                        <label>Password<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-text" style="border-radius: 0.25rem 0 0 0.25rem;"><i
                                                    class="fa-solid fa-envelope"></i></div>
                                            <input type="password" name="password"
                                                class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                placeholder="Enter New Password" required>
                                        </div>
                                        @include('alerts.feedback', ['field' => 'password'])
                                    </div>


                                    <div class="col-12">
                                        <label>Confirm Password<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-text" style="border-radius: 0.25rem 0 0 0.25rem;"><i
                                                    class="fa-solid fa-envelope"></i></div>
                                            <input type="password" name="password_confirmation"
                                                class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                                placeholder="Confirm New Password" required>
                                        </div>
                                        @include('alerts.feedback', ['field' => 'password_confirmation'])
                                    </div>

                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn btn-primary px-4 float-end mt-4 w-100">{{ _('Reset Password') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 ps-0 d-none d-md-block">
                            <div class="form-right h-100 text-white text-center d-flex align-items-center justify-content-center"
                                style="background-color: #273472">
                                <div>
                                    <a href="{{ route('home') }}"><img src="{{ storage_url(settings('site_logo')) }}"></a>
                                    <a href="{{ route('home') }}">
                                        <h5 class="fs-1 text-white mt-3">{{ settings('site_name') }}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
