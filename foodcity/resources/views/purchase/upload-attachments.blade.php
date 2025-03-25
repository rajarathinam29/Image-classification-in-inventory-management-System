@extends('layouts.custom-app')

@section('styles')


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
                                    <!-- <div class="text-center mb-5">
                                        <img src="{{asset('assets/images/brand/ownmake.png')}}" class="header-brand-img desktop-lgo" alt="Azea logo">
                                    </div> -->
                                    <div class="text-center mb-3">
                                        <h1 class="mb-2">Upload Purchase Order Attachment</h1>
                                    </div>
                                    <form class="mt-5" id="attachmentForm">
                                        <!-- <div class="form-group">
                                            <label class="form-label">Title<span class="text-red">*</span></label>
                                            <input type="text" class="form-control" name="attachmentTitle" id="attachmentTitle" placeholder="Attachment Title"  autocomplete="off">
                                        </div> -->
                                        <div class="form-group">
                                            <label class="form-label">Attachment<span class="text-red">*</span></label>
                                            <div class="input-group file-browser mb-5">
                                                <input type="file" class="form-control " name="file" id="file" capture="user" accept="image/*" placeholder="choose">
                                                
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" />
                                                <span class="custom-control-label">Remember me</span>
                                            </label>
                                        </div> -->
                                        <div class="form-group text-center mb-3" >
                                            <button type="submit" class="btn btn-primary btn-lg w-100 br-7" id="btnSubmit">Upload</button>
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

@section('modal')

@endsection

@section('scripts')

<script src="{{asset('assets/js/purchase/uploadAttachment.js?v=1.0.2')}}"></script>

@endsection