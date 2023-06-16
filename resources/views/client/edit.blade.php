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
                <h2>Edit Client</h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{url('client')}}">All Client</a></li>
                            <li><a href="{{url('client/create')}}">Add Client</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <form action="{{url('client/'.$client->id)}}" method="post">
                    @method('put')
                    @csrf
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Full Name<span class="text-danger">*</span></label>
                            <input type="text" name="full_name" class="form-control form-control-sm" value="{{$client->full_name}}">
                            @error('full_name')
                                <label class="error">{{$errors->first('full_name')}}</label>
                            @enderror
                        </div>

                        <label>Gender</label>
                        <div class="form-group">
                            <div class="radio inlineblock m-r-20">
                                <input type="radio" name="gender" id="Male" class="with-gap" value="male" {{$client->gender == 'male' ? 'checked':null}}>
                                <label for="Male">Male</label>
                            </div>
                            <div class="radio inlineblock">
                                <input type="radio" name="gender" id="Female" class="with-gap" value="female" {{$client->gender == 'female' ? 'checked':null}}>
                                <label for="Female">Female</label>
                            </div>
                            <br>
                            @error('gender')
                                <label class="error">{{$errors->first('gender')}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Email<span class="text-danger">*</span></label>
                            <input type="text" name="email" class="form-control form-control-sm" value="{{$client->email}}">
                            @error('email')
                                <label class="error">{{ $errors->first('email') }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Mobile No</label>
                            <input type="text" name="mobile_no" class="form-control form-control-sm" value="{{$client->mobile_no}}">
                            @error('mobile_no')
                                <label class="error">{{ $errors->first('mobile_no') }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" class="form-control form-control-sm" value="{{$client->country}}">
                            @error('country')
                                <label class="error">{{ $errors->first('country') }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control form-control-sm" value="{{$client->city}}">
                            @error('city')
                                <label class="error">{{ $errors->first('city') }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control form-control-sm" value="{{$client->address}}">
                            @error('address')
                                <label class="error">{{ $errors->first('address') }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Payment Resource</label>
                            <select name="payment_resource" class="form-control form-control-sm">
                                <option value="paypal" {{$client->payment_resource == 'paypal' ? 'selected' : null}}>PayPal</option>
                                <option value="guru" {{$client->payment_resource == 'guru' ? 'selected' : null}}>Guru</option>
                                <option value="fiverr" {{$client->payment_resource == 'fiverr' ? 'selected' : null}}>Fiverr</option>
                                <option value="upwork" {{$client->payment_resource == 'upwork' ? 'selected' : null}}>Upwork</option>
                                <option value="payoneer" {{$client->payment_resource == 'payoneer' ? 'selected' : null}}>Payoneer</option>
                                <option value="bank transfer" {{$client->payment_resource == 'band transfer' ? 'selected' : null}}>Bank Transfer</option>
                            </select>
                            @error('payment_resource')
                                <label class="error">{{ $errors->first('payment_resource') }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Skype</label>
                            <input type="text" name="skype" class="form-control form-control-sm" value="{{$client->skype}}">
                            @error('skype')
                                <label class="error">{{ $errors->first('skype') }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Note</label>
                            <textarea type="text" name="note" class="summernote">{{$client->note}}</textarea>
                            @error('note')
                                <label class="error">{{ $errors->first('note') }}</label>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
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

@push('after-scripts')

@endpush
