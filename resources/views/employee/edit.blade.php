@extends('layouts.master')
@section('title', 'Employee')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}"/>

<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.css')}}"/>

<link rel="stylesheet" href="{{asset('assets/plugins/fileuploader/font/font-fileuploader.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/fileuploader/jquery.fileuploader.min.css')}}">
@stop

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Edit Employee</h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{url('employee')}}">All Employee</a></li>
                            <li><a href="{{url('employee/create')}}">Create Employee</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <form action="{{url('employee/'.$employee->id)}}" method="post" enctype="multipart/form-data">
                    @method('put')
                @csrf
                <div class="row clearfix">
                    <div class="col-md-6">
                        <h6>Basic Info</h6>
                        <hr>
                        <label>Employee No</label>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" name="employee_no" value="{{$employee->employee_no}}" readonly>
                        </div>

                        <label>First Name</label>
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control form-control-sm form-float" value="{{$employee->first_name}}">
                            @error('first_name')
                                <label class="error">{{$errors->first('first_name')}}</label>
                            @enderror
                        </div>

                        

                        <label>Last Name</label>
                        <div class="form-group">
                            <input type="text" name="last_name" class="form-control form-control-sm" value="{{$employee->last_name}}">
                            @error('last_name')
                                <label class="error">{{$errors->first('last_name')}}</label>
                            @enderror
                        </div>

                        <label>Date of Birth</label>
                        <div class="form-group">
                            <input type="date" name="date_of_birth" class="form-control date" placeholder="dd/mm/yyyy" value="{{$employee->date_of_birth}}">
                        </div>

                        <label>Gender</label>
                        <div class="form-group">
                            <div class="radio inlineblock m-r-20">
                                <input type="radio" name="gender" id="Male" class="with-gap" value="male" {{$employee->gender == 'male' ? 'checked':null}}>
                                <label for="Male">Male</label>
                            </div>
                            <div class="radio inlineblock">
                                <input type="radio" name="gender" id="Female" class="with-gap" value="female" {{$employee->gender == 'female' ? 'checked':null}}>
                                <label for="Female">Female</label>
                            </div>
                            <br>
                            @error('gender')
                                <label class="error">{{$errors->first('gender')}}</label>
                            @enderror
                        </div>

                        <label>Marital Status</label>
                        <div class="form-group">
                            <select name="marital_status" class="form-control form-control-sm show-tick">
                                <option value="unmarried" {{$employee->marital_status == 'unmarried' ? 'selected':null}}>Unmarried</option>
                                <option value="married" {{$employee->marital_status == 'married' ? 'selected':null}}>Married</option>
                            </select>
                        </div>

                        <label>Qualification</label>
                        <div class="form-group">
                            <input type="text" name="qualification" class="form-control form-control-sm" value="{{$employee->qualification}}">
                        </div>

                        <label>CNIC <small>(without dash)</small></label>
                        <div class="form-group">
                            <input type="number" name="cnic" minlength="14" class="form-control form-control-sm" placeholder="Ex:42101542517561" value="{{$employee->cnic}}">
                            @error('cnic')
                                <label class="error">{{$errors->first('cnic')}}</label>
                            @enderror
                        </div>

                        <h6>Contact Details</h6>
                        <hr>
                        <label>Mobile No</label>
                        <div class="form-group">
                            <input type="number" name="mobile_no" class="form-control form-control-sm" value="{{$employee->mobile_no}}">
                            @error('mobile_no')
                                <label class="error">{{$errors->first('mobile_no')}}</label>
                            @enderror
                        </div>

                        <label>Home Phone</label>
                        <div class="form-group">
                            <input type="text" name="home_phone" class="form-control form-control-sm" value="{{$employee->home_phone}}">
                        </div>

                        <label>Emergency Contact</label>
                        <div class="form-group">
                            <input type="number" name="emergency_contact" class="form-control form-control-sm" value="{{$employee->emergency_contact}}">
                        </div>

                        <label>Email</label>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-sm" value="{{$employee->email}}">
                            @error('email')
                                <label class="error">{{$errors->first('email')}}</label>
                            @enderror
                        </div>

                        <label>Other Email</label>
                        <div class="form-group">
                            <input type="email" name="other_email" class="form-control form-control-sm" value="{{$employee->other_email}}">
                        </div>

                        <h6>Job info</h6>
                        <hr>
                        <label>Designation</label>
                        <div class="form-group">
                            <select name="designation_id" class="form-control show-tick ms select2" data-placeholder="Select" >
                                <option></option>
                                @foreach ($designations as $designation)
                                <option value="{{$designation->id}}" {{$employee->designation_id == $designation->id ? 'selected':null}}>{{$designation->title}}</option>
                                @endforeach
                            </select>
                            @error('designation_id')
                                <label class="error">{{$errors->first('designation_id')}}</label>
                            @enderror
                        </div>

                        <label>Salary</label>
                        <div class="form-group">
                            <input type="number" name="salary" class="form-control form-control-sm" value="{{$employee->salary}}">
                            @error('salary')
                                <label class="error">{{$errors->first('salary')}}</label>
                            @enderror
                        </div>

                        <label>Joining Date</label>
                        <div class="form-group">
                            <input type="date" name="joining_date" class="form-control" placeholder="dd/mm/yyyy" value="{{$employee->joining_date}}">
                        </div>

                        <label>Ending Date</label>
                        <div class="form-group">
                            <input type="date" name="ending_date" class="form-control" placeholder="dd/mm/yyyy" value="{{$employee->ending_date}}">
                        </div>
                        
                            <label>Employee Status</label>
                        <div class="form-group">
                            <select name="status" class="form-control show-tick ms select2" data-placeholder="Select">
                               
                                <option value="Internee">Internee</option>
                                <option value="Probation">Probation</option>
                                <option value="X-Employee">X-Employee</option>
                                <option value="Permanent">Permanent</option>
                                <option value="Terminated">Terminated</option>
                                
                                
                            </select>
                           
                        </div>

                        <label>Supervisor</label>
                        <div class="form-group">
                            <select name="employee_id" class="form-control show-tick ms select2" data-placeholder="Select">
                                <option></option>
                                @foreach ($emps as $emp)
                                    <option value="{{$emp->id}}" {{$employee->employee_id == $emp->id ? 'selected':null}}>{{$emp->first_name.' '.$emp->middle_name.' '.$emp->last_name}}</option>
                                @endforeach
                            </select>
                            @error('employee_id')
                                <label class="error">{{$errors->first('employee_id')}}</label>
                            @enderror
                        </div>

                        <label>Working Time Start</label>
                        <div class="form-group">
                            <input type="time" name="working_time_start" class="form-control" placeholder="Ex: 09:00 am" value="{{$employee->working_time_start}}">
                        </div>

                        <label>Working Time End</label>
                        <div class="form-group">
                            <input type="time" name="working_time_end" class="form-control" placeholder="Ex: 06:00 pm" value="{{$employee->working_time_end}}">
                        </div>
                        
                    

                        <!--<label style="color:red;">Termination Date</label>-->
                        <!--<div class="form-group">-->
                        <!--    <input type="date" name="termination_date" class="form-control" placeholder="dd/mm/yyyy" value="{{$employee->termination_date}}">-->
                        <!--</div>-->

                    </div>
                    <div class="col-md-6">
                        <h6>Address</h6>
                        <hr>
                        <label>Country</label>
                        <div class="form-group">
                            <input type="text" name="country" class="form-control form-control-sm" value="{{$employee->country}}">
                        </div>

                        <label>Province/State</label>
                        <div class="form-group">
                            <input type="text" name="province_state" class="form-control form-control-sm" value="{{$employee->province_state}}">
                        </div>

                        <label>City</label>
                        <div class="form-group">
                            <input type="text" name="city" class="form-control form-control-sm" value="{{$employee->city}}">
                        </div>

                        <label>Nationality</label>
                        <div class="form-group">
                            <input type="text" name="nationality" class="form-control form-control-sm" value="{{$employee->nationality}}">
                        </div>

                        <label>Postal/Zip Code</label>
                        <div class="form-group">
                            <input type="number" name="postal_code" class="form-control form-control-sm" value="{{$employee->postal_code}}">
                        </div>

                        <label>Address</label>
                        <div class="form-group">
                            <textarea type="text" name="address" class="form-control form-control-sm">{{$employee->address}}</textarea>
                        </div>

                        <h6>Notes</h6>
                        <hr>
                        <textarea class="summernote" name="notes">{{$employee->notes}}</textarea>
                        <br>

                        <h6>Document Attachment</h6>
                        <hr>
                        <div class="form-group">
                            <label>File Attachment</label>
                            <input type="file" name="file" multiple id="fileuploader" accept=".docx, .doc, .pdf, .csv, .png, .jpeg, .jpg, .pptx, .xls, .xlsx"/>
                        </div>

                        <div class="form-group">
                            <label>Documents</label>
                            @if(!$employeeDocs->isEmpty())
                                @foreach ($employeeDocs as $empdoc)
                                <p class="display:flex;">
                                    <i class="fas fa-download" aria-hidden="true"></i>&nbsp;<a href="{{url('emp-doc-download/'.$empdoc->id)}}">{{$empdoc->file}}</a> <a href="javascript:void(0);" class="delete-doc remove" data-id="{{url('emp-doc-delete/'.$empdoc->id)}}"><i data-toggle="tooltip" title="Delete" class="far fa-trash text-danger"></i></a>
                                </p>
                                @endforeach
                            @else
                                <small class="text-muted"><br><i>--No uploaded files--</i></small>
                            @endif
                        </div>

                        <h6>Profile Image</h6>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="file" name="profile_image" class="dropify" data-allowed-file-extensions="png jpg jpeg" accept=".png, jpg, .jpeg" data-default-file="{{$employee->profile_image ? asset('storage/profile_images/'.$employee->profile_image) : asset('img/no_image.png')}}">
                                </div>
                            </div>
                        </div>

                        <h6>Job Type</h6>
                        <hr>
                        <label>Job Type</label>
                        <div class="form-group">
                            <select name="job_status" id="job-status" class="form-control form-control-sm show-tick">
                                <option value="Full Time" {{$employee->job_status == 'Full Time' ? 'selected':null}}>Full Time</option>
                                <option value="Part Time" {{$employee->job_status == 'Part Time' ? 'selected':null}}>Part Time</option>
                                <option value="Remote" {{$employee->job_status == 'Remote' ? 'selected':null}}>Remote</option>
                                <option value="Internship" {{$employee->job_status == 'Internship' ? 'selected':null}}>Internship</option>
                            </select>
                            @error('job_status')
                                <label class="error">{{$errors->first('job_status')}}</label>
                            @enderror
                        </div>

                        <div id="ip" style="display:none;">
                        <label>Internship Period Start</label>
                        <input type="date" name="internship_period_start" class="form-control" placeholder="dd/mm/yyyy" value="{{$employee->intership_period_start}}">

                        <label>Internship Period End</label>
                        <div class="form-group">
                            <input type="date" name="internship_period_end" class="form-control" placeholder="dd/mm/yyyy" value="{{$employee->internship_period_end}}">
                        </div>
                        </div>

                        <div id="pp">
                        <label>Probation Period Start</label>
                        <div class="form-group">
                            <input type="date" name="probation_period_start" class="form-control" placeholder="dd/mm/yyyy" value="{{$employee->probation_period_start}}">
                        </div>

                        <label>Probation Period End</label>
                        <div class="form-group">
                            <input type="date" name="probation_period_end" class="form-control" placeholder="dd/mm/yyyy" value="{{$employee->probation_period_end}}">
                        </div>
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop

@push('after-scripts')
<script>
    $("#job-status").change( function() {
    var selectedValue = $(this).val();

    if (selectedValue == "Internship") {
        $('#ip').show();
        $('#pp').hide();
    }
    else if(selectedValue == "Full Time"){
        $('#pp').show();
        $('#ip').hide();
    }
    else{
        $('#pp').show();
        $('#ip').hide();
    }

});


$('#fileuploader').fileuploader({
        addMore: true
    });

$(".delete-doc").click('.remove',function(){
    var dataId = $(this).attr("data-id");
    var del = this;
    if(confirm("Do you want to delete this attachment?")){
        $.ajax({
        url: dataId,
        type:'DELETE',
        data:{
            _token : $("input[name=_token]").val()
        },
        success:function(response){
            $(del).closest( "p" ).remove();
            alert(response.message);
        }
        });
    }
});
</script>
@endpush

@section('page-script')
<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>

<script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
<script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/dropify.js')}}"></script>
<script src="{{asset('assets/plugins/fileuploader/jquery.fileuploader.min.js')}}"></script>
@stop


