@extends('layouts.master')
@section('title', 'Task Tracker')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.css')}}" />
{{-- <link rel="stylesheet" href="node_modules/@pnotify/bootstrap4/dist/PNotifyBootstrap4.css" /> --}}
{{-- <link rel="stylesheet" href="{{asset('assets/plugins/sticky_notification/sticky.css')}}"/> --}}
{{-- <link href="dist/sticky.css" rel="stylesheet" type="text/css" /> --}}
@stop

@section('content')
@include('layouts.alert_message')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>View Tasks</h2>
                <ul class="header-dropdown">
                        <button  type="button" class="btn btn-primary" style="padding: inherit; margin: auto;">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                    <li><a id="Add_2" style="font-weight:700; color:white; margin-left:-20px; text-decoration:none;" href="{{url('task-tracker')}}">All Task</a></li>                    
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
                <!-- Nav tabs -->
                <ul class="nav nav-tabs p-0 mb-3">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#add-task-update">Add Task Update</a></li>
                    <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#view-task">View Task</a></li>
                    
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane in" id="view-task">
                        <div class="row">
                            <div class="col-12">
                                <div style="margin-right:-20px;margin-left:-20px;">
                                    <table class="table">
                                        <tr style="background: #F2F4F6;border-bottom: 1px solid #dee2e6;">
                                            <td style="border-right: 1px solid #dee2e6;padding-left: 30px;">
                                                <span class="text-muted"><i class="far fa-project-diagram" style="font-size: 18px;"></i> Project</span><br>
                                                {{$task->project->title}}
                                            </td>
                                            <td style="border-right: 1px solid #dee2e6;padding-left: 30px;">
                                                <span class="text-muted"><i class="far fa-calendar" style="font-size: 18px;"></i> Deadline Date</span>
                                                <br>
                                                @if ($task->deadline_date)
                                                {{date('j F, Y', strtotime($task->deadline_date))}}
                                                @else
                                                <small class="text-muted"><i>--Nil--</i></small>
                                                @endif
                                            </td>
                                            <td style="border-right: 1px solid #dee2e6;padding-left: 30px;">
                                                <span class="text-muted"><i class="far fa-badge-check" style="font-size: 18px;"></i> Status</span><br>
                                                <span id="header-status">{{$task->status}}</span>
                                            </td>
                                            <td style="padding-left: 30px;">
                                                <span class="text-muted">
                                                    <i class="far fa-badge-percent" style="font-size: 18px;"></i> {{$task->status}}(<span id="progress-count">{{$task->progress}}</span>%)
                                                </span><br>
                                                <div class="progress" style="margin-top: 8px;background:#F7C600;border-radius:0;">
                                                    <div class="progress-bar l-green" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: {{$task->progress}}%;border-radius:0;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
<!--Rachna-->

<!--Rachnn-->
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mt-3">
                                <div style="display:flex;">
                                    <h6>Task Details</h6>
                                    {{-- <form id="mark-as-completed">
                                    @csrf
                                    <input type="hidden" id="id" value="{{$task->id}}">
                                    <input type="hidden" id="status" value="completed">
                                    @if ($task->status == 'completed')
                                    <button type="submit" style="margin-top:-5px; margin-left:10px;" class="btn btn-sm btn-success"><i class="fal fa-check"></i> <span id="btn-task-completed">{{$task->status}}</span></button>
                                    @else
                                    <button type="submit" style="margin-top:-5px; margin-left:10px;" class="btn btn-sm btn-success" id="btn-task-completed">Mark as Completed</button>
                                    @endif
                                    </form> --}}
                                    {{-- @if ($task->status != 'ongoing')
                                <form style="margin: -20px 0px 15px 100px;">
                                    @csrf
                                    <input type="hidden" id="id" value="{{$task->id}}">
                                    <label>Select Task Progress(%)</label>
                                    <select style="width: 160px;" name="progress" id="progress">
                                        <option value="0" {{$task->progress == 0 ? 'selected' : null}}>0%</option>
                                        <option value="25" {{$task->progress == 25 ? 'selected' : null}}>25%</option>
                                        <option value="50" {{$task->progress == 50 ? 'selected' : null}}>50%</option>
                                        <option value="75" {{$task->progress == 75 ? 'selected' : null}}>75%</option>
                                        <option value="100" {{$task->progress == 100 ? 'selected' : null}}><span style="color: green;">Mark as Completed(100%)</span></option>
                                    </select>
                                    </form>
                                    @endif --}}
                                </div>
                                <div class="row">
                                     <div class="col-md-6">
                                         <label class="text-muted">Project Name</label>
                                         <p>{{$task->project->title}}</p>
                                     </div>
                                     <div class="col-md-6">
                                         <label class="text-muted">Project Name</label>
                                         <p>{{$task->project->title}}</p>
                                     </div>
                                </div> 
                                <table class="table">
                                    <tr>
                                        <td><label class="text-muted">Project Name</label></td>
                                        <td>
                                            <p>{{$task->project->title}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="text-muted">Task No </label></td>
                                        <td>
                                            <p>{{$task->task_no}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="text-muted">Assign To:</label></td>
                                        <td>
                                            <p>{{ $task->employee->first_name.' '.$task->employee->middle_name.' '.$task->employee->last_name }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="text-muted">Priority</label></td>
                                        <td>
                                            @if ($task->priority == 'normal')
                                            <p class="badge badge-primary">{{$task->priority}}</p>
                                            @elseif ($task->priority == 'medium')
                                            <p class="badge badge-warning">{{$task->priority}}</p>
                                            @elseif ($task->priority == 'high')
                                            <p class="badge badge-danger">{{$task->priority}}</p>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="text-muted">Assign Date</label></td>
                                        <td>
                                            <p>{{$task->assign_date ? date('j F, Y', strtotime($task->assign_date)) : null}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="text-muted">Deadline Date</label></td>
                                        <td>
                                            @if ($task->deadline_date)
                                            <p>{{date('j F, Y', strtotime($task->deadline_date))}}</p>
                                            @else
                                            <small class="text-muted"><i>--Nil--</i></small>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="text-muted">Status</label></td>
                                        <td>
                                            @if ($task->status == 'pending')
                                            <p class="badge badge-danger hide-badge">{{$task->status}}</p>
                                            @elseif ($task->status == 'ongoing')
                                            <p class="badge badge-primary hide-badge">{{$task->status}}</p>
                                            @elseif ($task->status == 'in progress')
                                            <p class="badge badge-warning hide-badge">{{$task->status}}</p>
                                            @elseif ($task->status == 'completed')
                                            <p class="badge badge-success hide-badge">{{$task->status}}</p>
                                            @endif
                                            <span id="task-status"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="text-muted">Document</label></td>
                                        <td>
                                            <div class="form-group">
                                            @if(!$task_attachment->isEmpty())
                                            @foreach ($task_attachment as $ta)
                                            <p><i class="fas fa-download" aria-hidden="true"></i>&nbsp;<a href="{{url('task-download/'.$ta->id)}}">{{$ta->attachment}}</a></p>
                                            @endforeach
                                            @else
                                            <small class="text-muted"><br><i>--No uploaded files--</i></small>
                                            @endif
                                           </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label class="text-muted">Note</label>
                                            <p>{!!$task->note!!}</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <!--<div class="col-md-6 col-sm-12  mt-3">-->
                            <!--    <div class="form-group">-->
                            <!--        <label><b>Documents</b></label>-->
                            <!--        @if(!$task_attachment->isEmpty())-->
                            <!--        @foreach ($task_attachment as $ta)-->
                            <!--        <p><i class="fas fa-download" aria-hidden="true"></i>&nbsp;<a href="{{url('task-download/'.$ta->id)}}">{{$ta->attachment}}</a></p>-->
                            <!--        @endforeach-->
                            <!--        @else-->
                            <!--        <small class="text-muted"><br><i>--No uploaded files--</i></small>-->
                            <!--        @endif-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane active " id="add-task-update">
                        <div class="row clearfix">
                            <div class="col-md-6 mt-3">
                                @if ($task->status != 'ongoing')
                                <form>
                                    @csrf
                                    <input type="hidden" id="id" value="{{$task->id}}">
                                    <div class="form-group">
                                        <label>Select Task Progress(%)</label>
                                        <select style="width: 160px;" name="progress" id="progress" class="form-control form-control-sm">
                                            <option value="0" {{$task->progress == 0 ? 'selected' : null}}>0%</option>
                                            <option value="25" {{$task->progress == 25 ? 'selected' : null}}>25%</option>
                                            <option value="50" {{$task->progress == 50 ? 'selected' : null}}>50%</option>
                                            <option value="75" {{$task->progress == 75 ? 'selected' : null}}>75%</option>
                                            <option value="100" {{$task->progress == 100 ? 'selected' : null}}><span style="color: green;">Mark as Completed(100%)</span></option>
                                        </select>
                                    </div>
                                </form>
                                @endif
                            </div>
                            
                            <div class="col-md-6 mt-3">
                                 <div class="form-group">
                                        <label>Module</label>
                                        <select name="module" class="form-control show-tick ms select2" data-placeholder="Select">
                                            <option></option>
                                            @foreach ($modules as $module)
                                            <option value="{{$module->module}}">{{$module->module}}</option>
                                            @endforeach
                                        </select>
                                        @error('module')
                                        <label class="error">{{$errors->first('module')}}</label>
                                        @enderror
                                    </div>
                            </div>
                        </div>
                        
                           
                        <form action="{{url('task-taker-progress/'.$task->id)}}" method="post">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-6">
                                     <!--<h6>Add hourly Task Progress</h6>-->
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" name="date" class="form-control form-control-sm" value="{{date('Y-m-d')}}">
                                        @error('date')
                                        <label class="error">{{$errors->first('date')}}</label>
                                        @enderror
                                   </div>
                                   </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hours</label>
                                        <input type="text" name="hours" class="form-control form-control-sm" value="{{old('hours')}}">
                                        @error('hours')
                                        <label class="error">{{$errors->first('hours')}}</label>
                                        @enderror
                                 </div>
                                 </div>
                                 </div>
          
                                   <div class="row">
                                       <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Notes</label>
                                        <textarea name="work_detail" class="summernote">{{old('work_detail')}}</textarea>
                                        @error('work_detail')
                                        <label class="error">{{$errors->first('work_detail')}}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                            </div>
                       <div class="container">
                                 <div class="col-md-12 text-center">
                                          <button type="submit" class="btn btn-primary" id="save-btn">Save</button>
                                 </div>
                     </div>
                          <style>
                           #save-btn{
                                width:180px;
                               height: 40px;
                               font-size: 15px;;
                            }
                            </style>
                </div>
            </div>
        </div>
    </div>

    @stop

    @section('page-script')
    <script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>
    <script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
    <script src="{{asset('assets/js/notify.js')}}"></script>
    @stop

    @push('after-scripts')
    <script>
        $("#progress").change(function() {

            let _token = $('input[name=_token]').val();
            var id = $("#id").val();
            var progress = $("#progress").val();

            $.ajax({
                url: "{{url('task-takerup-progress')}}" + "/" + id,
                type: "PUT",
                data: {
                    _token: _token,
                    progress: progress
                },
                success: function(data) {
                    $('#progress-count').html(progress);
                    $('.progress-bar').css({
                        "width": progress + '%'
                    });
                    if (progress == 100) {

                        $.ajax({
                            url: "{{url('task-taker')}}" + "/" + id,
                            type: "PUT",
                            data: {
                                _token: _token,
                                id: id,
                                status: 'completed'
                            },
                            success: function(response, textStatus, jqXHR) {
                                $('#header-status').html('completed');
                                $('.hide-badge').hide();
                                $('#task-status').html('<p class="badge badge-success">completed</p>');
                                $.notify(
                                    "Task 100(%) mark as completed", "success"
                                );
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log(jqXHR);
                                console.log(textStatus);
                                console.log(errorThrown);
                            }
                        });

                    } else {
                        $.ajax({
                            url: "{{url('task-taker')}}" + "/" + id,
                            type: "PUT",
                            data: {
                                _token: _token,
                                id: id,
                                status: 'in progress'
                            },
                            success: function(response, textStatus, jqXHR) {
                                $('#header-status').html('in progress');
                                $('.hide-badge').hide();
                                $('#task-status').html('<p class="badge badge-warning">in progress</p>');
                                $.notify(
                                    "Task " + progress + "(%) in progress", "warning"
                                );
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log(jqXHR);
                                console.log(textStatus);
                                console.log(errorThrown);
                            }
                        });
                    }
                },
            });
        });
    </script>
    @endpush