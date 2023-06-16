@extends('layouts.master')
@section('title', 'Add Blogs')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.css')}}"/>
@stop

@section('content')

<div class="row clearfix">

    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
             <div class="header">
                <h2>Add Blogs</h2>
                <ul class="header-dropdown">
                     <button type="button" class="btn btn-primary" style="padding: inherit;margin: auto;">
                    <li><a style="font-weight:700; color:white; margin-left:20px; text-decoration:none;" href="{{url('blogs')}}">All Blogs</a></li>
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                    </button>
                </ul>
            </div>
            <div class="body">
                <form method="POST" action="{{url('blogs/store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body p-0">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Blog Title</label>
                            <input type="text" class="form-control" name="blog_title" id="category" placeholder="Blog Title" required="">
                            <span id="err-category" class="invalid-feedback" style="display: block" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" placeholder="Meta Title" required="">
                            <span id="err-title" class="invalid-feedback" style="display: block" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                  	</div>
                   
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Blog Description</label>
                            <textarea name="long_description" class="summernote form-control"></textarea>
                            <span id="err-long_description" class="invalid-feedback" style="display: block" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                     	<div class="form-group col-md-6">
                            <label for="email">Meta Description</label>
                            <textarea name="meta_description" class="form-control summernote"></textarea>
                            <span id="err-email" class="invalid-feedback" style="display: block" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" required="">
                            <span id="err-image" class="invalid-feedback" style="display: block" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Meta Keywords</label>
                            <input type="text" name="keywords" class="form-control" placeholder="Enter comma seprated values" required="">
                            <span id="err-keyword" class="invalid-feedback" style="display: block" role="alert">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                </div>
                <div class=" text-center">
                    <button class="btn btn-primary btn-lg" >Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@stop

@section('page-script')
<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>
<script src="{{asset('assets/js/plupload.full.min.js')}}"></script>
<script src="{{asset('assets/plugins/ssi-uploader/dist/ssi-uploader/js/ssi-uploader.min.js')}}"></script>
@stop

