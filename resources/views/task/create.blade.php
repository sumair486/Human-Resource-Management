@extends('layouts.master')
@section('title', 'Task Tracker')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/fileuploader/font/font-fileuploader.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/fileuploader/jquery.fileuploader.min.css')}}">
@stop

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Add Task > {{$newTaskNo}}</h2>
                <ul class="header-dropdown">
                      <button type="button" class="btn btn-primary" style="padding: inherit;margin: auto;">
                    <li><a style="font-weight:700; color:white; margin-left:20px; text-decoration:none;" href="{{url('task-tracker')}}">All Task</a></li>
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <!--<ul class="dropdown-menu dropdown-menu-right">-->
                        <!--    <li><a href="{{url('task-tracker')}}">All Task</a></li>-->
                        <!--</ul>-->
                    </li>
                    <!--<li class="remove">-->
                    <!--    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>-->
                    <!--</li>-->
                    </button>
                </ul>
            </div>
            <div class="body">
                <form id="form_validation" action="{{url('task-tracker')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Project Title</label>
                                <select name="project_id" class="form-control show-tick ms select2" data-placeholder="Select">
                                    <option></option>
                                    @foreach ($projects as $project)
                                        <option value="{{$project->id}}" {{old('project_id') == $project->id ? 'selected':null}}>{{$project->title}}</option>
                                    @endforeach
                                </select>
                                @error('project_id')
                                    <label class="error">{{$errors->first('project_id')}}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Assign To Employee</label>
                                <select name="employee_id" class="form-control show-tick ms select2" data-placeholder="Select">
                                    <option></option>
                                    @foreach ($employees as $employee)
                                        <option value="{{$employee->id}}" {{old('employee_id') == $employee->id ? 'selected':null}}>{{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}}</option>
                                    @endforeach
                                </select>
                                @error('employee_id')
                                    <label class="error">{{$errors->first('employee_id')}}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <!--    <div class="col-md-6">-->
                            <!--<div class="form-group">-->
                            <!--    <label>Task No </label>-->
                                <input type="hidden" name="task_no" class="form-control form-control-sm" value="{{$newTaskNo}}" readonly>
                            <!--    @error('task_no')-->
                            <!--    <label class="error">{{$errors->first('task_no')}}</label>-->
                            <!--    @enderror-->
                            <!--</div>-->
                            <!-- </div>-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control ms">
                                    <option value="pending">Pending</option>
                                    <option value="in progress">In Progress</option>
                                    <option value="ongoing">Ongoing</option>
                                </select>
                                @error('status')
                                    <label class="error">{{$errors->first('status')}}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label-form">Priority</label>
                                <select name="priority" class="form-control ms" placeholder="Select" >
                                    <option value="normal" id="one">Normal</option>
                                    <option value="medium" id="two">Medium</option>
                                    <option value="high" id="three">High</option>
                                </select>
                                @error('priority')
                                    <label class="error">{{$errors->first('priority')}}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Assign Date</label>
                                <input type="date" name="assign_date" class="form-control form-control-sm" value="{{date('Y-m-d')}}">
                                @error('assign_date')
                                    <label class="error">{{$errors->first('assign_date')}}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Deadline Date</label>
                                <input type="date" name="deadline_date" class="form-control form-control-sm" value="{{old('deadline_date')}}">
                                @error('deadline_date')
                                    <label class="error">{{$errors->first('deadline_date')}}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6  col order-last">
                            <div class="form-group">
                                <label>File Attachment</label>
                                <input type="file" name="attachment" multiple id="fileuploader"/>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Details</label>
                                <textarea name="note" class="summernote">{{old('note')}}</textarea>
                                @error('note')
                                    <label class="error">{{$errors->first('note')}}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="mt-5 btn btn-primary">Save</button>
                            <!--<button type="submit" class="btn btn-primary" id="save-btn">Save</button>-->
                        </div>
                    </div>
                </form>
            </div>
            <style>
                #save-btn{
                    width:180px;
                   height: 40px;
                   font-size: 15px;
                }
            </style>
        </div>
    </div>
</div>

@stop


@section('page-script')
<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>
<script src="{{asset('assets/plugins/fileuploader/jquery.fileuploader.min.js')}}"></script>

<script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-steps/jquery.steps.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/form-validation.js')}}"></script>
@stop

@push('after-scripts')
<script>
// enable fileuploader plugin
$('#fileuploader').fileuploader({
        addMore: true
    });

</script>
@endpush
