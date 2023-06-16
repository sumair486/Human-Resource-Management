@extends('layouts.master')
@section('title', 'Client')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.css')}}"/>
@stop

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Add Client</h2>
                <ul class="header-dropdown">
                        <button  type="button" class="btn btn-primary" style="padding: inherit; margin: auto;">
                <li><a style="font-weight:700; color:white; margin-left:20px; text-decoration:none;" href="{{url('client')}}">All Client</a></li>
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <!--<ul class="dropdown-menu dropdown-menu-right">-->
                        <!--    <li><a href="{{url('client')}}">All Client</a></li>-->
                        <!--</ul>-->
                    </li>
                    <!--<li class="remove">-->
                    <!--    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>-->
                    <!--</li>-->
                    </button>
                </ul>
            </div>
            <div class="body">
                <form action="{{url('client')}}" method="post">
                @csrf
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Full Name<span class="text-danger">*</span></label>
                            <input type="text" name="full_name" class="form-control form-control-sm" value="{{old('full_name')}}">
                            @error('full_name')
                                <label class="error">{{$errors->first('full_name')}}</label>
                            @enderror
                        </div>
                        </div>
                          <div class="col-md-6">
                             <div class="form-group">
                            <label>Email<span class="text-danger">*</span></label>
                            <input type="text" name="email" class="form-control form-control-sm" value="{{old('email')}}">
                            @error('email')
                                <label class="error">{{ $errors->first('email') }}</label>
                            @enderror
                        </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                        <label>Gender</label>
                        <div class="form-group">
                            <div class="radio inlineblock m-r-20">
                                <input type="radio" name="gender" id="Male" class="with-gap" value="male" {{old('gender') == 'male' ? 'checked':null}}>
                                <label for="Male">Male</label>
                            </div>
                            <div class="radio inlineblock">
                                <input type="radio" name="gender" id="Female" class="with-gap" value="female" {{old('gender') == 'female' ? 'checked':null}}>
                                <label for="Female">Female</label>
                            </div>
                            <br>
                            @error('gender')
                                <label class="error">{{$errors->first('gender')}}</label>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile No</label>
                            <input type="text" name="mobile_no" class="form-control form-control-sm" value="{{old('mobile_no')}}">
                            @error('mobile_no')
                                <label class="error">{{ $errors->first('mobile_no') }}</label>
                            @enderror
                        </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" class="form-control form-control-sm" value="{{old('country')}}">
                            @error('country')
                                <label class="error">{{ $errors->first('country') }}</label>
                            @enderror
                        </div>
                        </div>
                         <div class="col-md-6">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control form-control-sm" value="{{old('city')}}">
                            @error('city')
                                <label class="error">{{ $errors->first('city') }}</label>
                            @enderror
                        </div>
                        </div>
                        </div>
 
                        
                         
                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label>Payment Resource</label>
                            <select name="payment_resource" class="form-control form-control-sm">
                                <option value="paypal">PayPal</option>
                                <option value="guru">Guru</option>
                                <option value="fiverr">Fiverr</option>
                                <option value="upwork">Upwork</option>
                                <option value="payoneer">Payoneer</option>
                                <option value="bank transfer">Bank Transfer</option>
                            </select>
                            @error('payment_resource')
                                <label class="error">{{ $errors->first('payment_resource') }}</label>
                            @enderror
                        </div>
                        </div>
                            <div class="col-md-6">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control form-control-sm" value="{{old('address')}}">
                            @error('address')
                                <label class="error">{{ $errors->first('address') }}</label>
                            @enderror
                        </div>
                        </div>
                        
                        </div>
   
                        <div class="row">
                            <div class="col-md-6" id="client_1">
                             <div class="form-group mt-2">
                            <label>Remarks</label>
                            <textarea type="text" name="note" class="summernote">{{old('note')}}</textarea>
                            @error('note')
                                <label class="error">{{ $errors->first('note') }}</label>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6" id="client_2">
                        <div class="form-group">
                            <label>Skype</label>
                            <input type="text" name="skype" class="form-control form-control-sm" value="{{old('skype')}}">
                            @error('skype')
                                <label class="error">{{ $errors->first('skype') }}</label>
                            @enderror
                        
                        </div>
                        </div>
                        </div>
                                                                     <div class="container">
                                 <div class="col-md-12 text-center">
                                          <button type="submit" class="btn btn-primary" id="save-btn">Save</button>
                                 </div>
                                 </div>
                                  </div>
                    
                        <style>
                            #save-btn{
                                   width:180px;
                               height: 40px;
                               font-size: 15px;
                            }
                          
                            @media only screen and (max-width: 600px) {
                                
                             div#client_1 {
                                order: 2;
                            }
                            
                            div#client_2 {
                                order: 1;
                            }
                            }

                        </style>
                    <div class="col-md-6">
                        {{-- <h6>Client Login</h6>
                        <div class="form-group">
                            <label>Login Email</label>
                            <input type="email" name="login_email" class="form-control form-control-sm" value="{{old('login_email')}}">
                            @error('login_email')
                                <label class="error">{{ $errors->first('login_email') }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control form-control-sm" value="{{old('password')}}">
                            @error('password')
                                <label class="error">{{ $errors->first('password') }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Login Status</label>
                            <div class="radio inlineblock m-r-20">
                                <input type="radio" name="status" id="Active" class="with-gap" checked value="1" {{old('status') == '1' ? 'checked':null}}>
                                <label for="Active">Active</label>
                            </div>
                            <div class="radio inlineblock">
                                <input type="radio" name="status" id="Inactive" class="with-gap" value="0" {{old('status') == '0' ? 'checked':null}}>
                                <label for="Inactive">Inactive</label>
                            </div>
                            <br>
                            @error('status')
                                <label class="error">{{$errors->first('status')}}</label>
                            @enderror
                        </div> --}}
                    </div>
                </div>

        </div>
    </div>
</div>

@stop

@section('page-script')
<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>
<script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
@stop

@push('after-scripts')
@endpush
