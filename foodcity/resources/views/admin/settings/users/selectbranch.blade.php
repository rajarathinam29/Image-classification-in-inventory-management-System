@extends('layouts.custom-app')

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
                                                <h1 class="mb-2">Select Branch</h1>
                                                <a href="javascript:void(0);" class="">Welcome Back !</a>
                                            </div>
                                            <form class="mt-5" id="loginForm">
                                                <div class="form-group ">
													<div class="custom-controls-stacked" id="listCompanyBranches">
														<label class="custom-control custom-radio">
															<input type="radio" class="custom-control-input" name="example-radios" value="option1" checked>
															<span class="custom-control-label">Option 1</span>
														</label>
														<label class="custom-control custom-radio">
															<input type="radio" class="custom-control-input" name="example-radios" value="option2">
															<span class="custom-control-label">Option 2</span>
														</label>
													</div>
												</div>
                                                <div class="form-group text-center mb-3" >
                                                    <button type="submit" class="btn btn-primary btn-lg w-100 br-7" id="btnSubmit">Log In</button>
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
    <script src="{{asset('assets/js/config/common.js?v=1.0.0')}}"></script>
    <script src="{{asset('assets/js/settings/users/selectBranch.js?v=1.0.0')}}"></script>
@endsection
