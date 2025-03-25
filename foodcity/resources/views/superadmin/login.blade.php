@extends('layouts.superadmin-login-app')

@section('styles')

@endsection

@section('class')

        <div class="register1">

@endsection

@section('content')

        <div class="page">
            <div class="page-single">
                <div class="container">
                    <div class="row">
                        <div class="col mx-auto">
                            <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center mb-5">
                                                <img src="{{asset('assets/images/brand/ownmake.png')}}" class="header-brand-img desktop-lgo" alt="Azea logo">
                                            </div>
                                            <div class="text-center mb-3">
                                                <h1 class="mb-2">Log In</h1>
                                                <a href="javascript:void(0);" class="">Welcome Back !</a>
                                            </div>
                                            <form class="mt-5" id="loginForm">
                                                <div class="input-group mb-4">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-user"></i>
                                                        </div>
                                                    <input type="text" class="form-control" id="inputUname" placeholder="Username">
                                                </div>
                                                <div class="input-group mb-4">
                                                    <div class="input-group" id="Password-toggle1">
                                                        <a href="" class="input-group-text">
                                                        <i class="fe fe-eye" aria-hidden="true"></i>
                                                        </a>
                                                        <input class="form-control" type="password" id="inputPassword" placeholder="Confirm Password">
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" />
                                                        <span class="custom-control-label">Remember me</span>
                                                    </label>
                                                </div> -->
                                                <div class="form-group text-center mb-3" >
                                                    <button type="submit" class="btn btn-primary btn-lg w-100 br-7" id="btnSubmit">Log In</button>
                                                </div>
                                                <div class="form-group fs-13 text-center">
                                                    <a href="{{url('forgot-password2')}}">Forget Password ?</a> 
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection('content')

@section('scripts')
    <script src="{{asset('assets/superadmin/js/config/login.js')}}"></script>
@endsection
