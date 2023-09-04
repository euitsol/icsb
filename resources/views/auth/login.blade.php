@extends('backend.layouts.master', ['class' => 'login-page', 'pageSlug' => _('Login Page'), 'contentClass' => 'login-page'])

@section('content')
<div class="login-page">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="shadow rounded">
                        <div class="row">
                            <div class="col-md-7 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <h3 class="mb-3 text-center">Login</h3>
                                    <form class="form row g-4" method="post" action="{{ route('login') }}">
                                        @csrf
                                            <div class="col-12">
                                                <label>Email<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text" style="border-radius: 0.25rem 0 0 0.25rem;"><i class="fa-solid fa-envelope"></i></div>
                                                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter Email" required>
                                                </div>
                                                @include('alerts.feedback', ['field' => 'email'])
                                            </div>

                                            <div class="col-12">
                                                <label>Password<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text" style="border-radius: 0.25rem 0 0 0.25rem;"><i class="fa-solid fa-lock"></i></i></div>
                                                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Enter Password" required>
                                                </div>
                                                @include('alerts.feedback', ['field' => 'password'])
                                            </div>

                                            <div class="col-sm-6">
                                                <a href="{{ route('password.request') }}" class="float-end text-primary">Forgot Password?</a>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary px-4 float-end mt-4 w-100">Login</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 ps-0 d-none d-md-block">
                                <div class="form-right h-100 text-white text-center d-flex align-items-center justify-content-center" style="background-color: #273472">
                                    <div>
                                        <a href="{{route('home')}}"><img src="{{storage_url(settings('site_logo'))}}"></a>
                                        <a href="{{route('home')}}"><h5 class="fs-1 text-white mt-3">{{settings('site_name')}}</h5></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


@endsection
