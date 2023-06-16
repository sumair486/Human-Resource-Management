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
                <h2>Edit Task</h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{url('task-tracker')}}">All Tasks</a></li>
                            <li><a href="{{url('task-tracker/create')}}">Add Task</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <form action="{{url('task-tracker/'.$task->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Project Title</label>
                            <select name="project_id" class="form-control show-tick ms select2" data-placeholder="Select">
                                <option></option>
                                @foreach ($projects as $project)
                                    <option value="{{$project->id}}" {{$task->project_id == $project->id ? 'selected':null}}>{{$project->title}}</option>
                                @endforeach
                            </select>
                            @error('project_id')
                                <label class="error">{{$errors->first('project_id')}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Assign To Employee</label>
                            <select name="employee_id" class="form-control show-tick ms select2" data-placeholder="Select">
                                <option></option>
                                @foreach ($employees as $employee)
                                    <option value="{{$employee->id}}" {{$task->employee_id == $employee->id ? 'selected':null}}>{{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}}</option>
                                @endforeach
                            </select>
                            @error('employee_id')
                                <label class="error">{{$errors->first('employee_id')}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Priority</label>
                            <select name="priority" class="form-control">
                                <option value="normal" {{$task->priority == 'normal' ? 'selected' : null}}>Normal</option>
                                <option value="medium" {{$task->priority == 'medium' ? 'selected' : null}}>Medium</option>
                                <option value="high" {{$task->priority == 'high' ? 'selected' : null}}>High</option>
                            </select>
                            @error('priority')
                                <label class="error">{{$errors->first('priority')}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Assign Date</label>
                            <input type="date" name="assign_date" class="form-control form-control-sm" value="{{$task->assign_date}}">
                            @error('assign_date')
                                <label class="error">{{$errors->first('assign_date')}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Deadline Date</label>
                            <input type="date" name="deadline_date" class="form-control form-control-sm" value="{{$task->deadline_date}}">
                            @error('deadline_date')
                                <label class="error">{{$errors->first('deadline_date')}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control form-control-sm">
                                <option value="pending" {{$task->status == 'pending' ? 'selected' : null}}>Pending</option>
                                <option value="in progress" {{$task->status == 'in progress' ? 'selected' : null}}>In Progress</option>
                                <option value="ongoing" {{$task->status == 'ongoing' ? 'selected' : null}}>Ongoing</option>
                            </select>
                            @error('status')
                                <label class="error">{{$errors->first('status')}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Note</label>
                            <textarea name="note" class="summernote">{{$task->note}}</textarea>
                            @error('note')
                                <label class="error">{{$errors->first('note')}}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>File Attachment</label>
                            <input type="file" name="attachment" multiple id="fileuploader" accept=".docx, .doc, .pdf, .csv, .png, .jpeg, .jpg, .pptx, .xls, .xlsx"/>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Documents</label>
                            @if(!$task_attachment->isEmpty())
                                @foreach ($task_attachment as $ta)
                                <p class="display:flex;">
                                    <i class="fas fa-download" aria-hidden="true"></i>&nbsp;<a href="{{url('admin-task-download/'.$ta->id)}}">{{$ta->attachment}}</a> <a href="javascript:void(0);" class="delete-doc remove" data-id="{{url('task-doc-delete/'.$ta->id)}}"><i data-toggle="tooltip" title="Delete" class="far fa-trash text-danger"></i></a>
                                </p>
                                @endforeach
                            @else
                                <small class="text-muted"><br><i>--No uploaded files--</i></small>
                            @endif
                        </div>
                    </div>
                </div>

                <button type="submit" class="mt-5 btn btn-primary">Save Changes</button>
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
<script src="{{asset('assets/plugins/fileuploader/jquery.fileuploader.min.js')}}"></script>
@stop

@push('after-scripts')
<script>

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
