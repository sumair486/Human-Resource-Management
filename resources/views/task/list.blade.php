@extends('layouts.master')
@section('title', 'Task Tracker')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="//cdn.datatables.net/plug-ins/1.10.24/features/searchHighlight/dataTables.searchHighlight.css" />
@stop

@section('content')
@include('layouts.alert_message')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>All Tasks check</h2>
                <ul class="header-dropdown">
                     <button type="button" class="btn btn-primary" style="padding: inherit;margin: auto;">
                    <li><a style="font-weight:700; color:white; margin-left:20px; text-decoration:none;" href="{{url('task-tracker/create')}}">Add Task</a></li>
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <!--<ul class="dropdown-menu dropdown-menu-right">-->
                        <!--    <li><a href="{{url('task-tracker/create')}}">Add Task</a></li>-->
                        <!--</ul>-->
                    </li>
                    <!--<li class="remove">-->
                    <!--    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>-->
                    <!--</li>-->
                    </button>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="admin-datatable table table-hover" style="width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>project</th>
                                <th>Assign To</th>
                                <th>Progress</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>project</th>
                                <th>Assign To</th>
                                <th>Progress</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td>
                                    {{$task->project_id ? $task->project->title : null}}<br>
                                    <small>Task No: {{$task->task_no}}</small><br>
                                    <small>Priority:
                                        @if ($task->priority == 'normal')
                                        <span class="text-primary">{{$task->priority}}</span>
                                        @elseif ($task->priority == 'medium')
                                        <span class="text-warning">{{$task->priority}}</span>
                                        @elseif ($task->priority == 'high')
                                        <span class="text-danger">{{$task->priority}}</span>
                                        @endif
                                    </small><br>
                                </td>
                                <td>
                                    @if(DB::table('employees')->where('id',$task->employee_id)->count() > 0)
                                    {{ $task->employee->first_name.' '.$task->employee->middle_name.' '.$task->employee->last_name }}<br>
                                    @else
                                    Deleted Employee
                                    @endif

                                    <small>Assign Date: {{date('d F, Y', strtotime($task->assign_date))}}</small><br>
                                    <small class="text-danger">Deadline Date: {{$task->deadline_date ? date('d F, Y', strtotime($task->deadline_date)) : null }}</small>
                                </td>
                                <td>
                                    <p style="margin-bottom: -10px;"><small>{{$task->progress}}%</small></p>
                                    <div class="progress" style="margin-top:8px;background:#F7C600;border-radius:0;">
                                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: {{$task->progress}}%;border-radius:0;"></div>
                                    </div>

                                    @if ($task->status == 'ongoing')
                                    <span class="badge badge-primary">{{$task->status}}</span>
                                    @elseif ($task->status == 'pending')
                                    <span class="badge badge-danger">{{$task->status}}</span>
                                    @elseif ($task->status == 'in progress')
                                    <span class="badge badge-warning">{{$task->status}}</span>
                                    @elseif($task->status == 'completed')
                                    <span class="badge badge-success">{{$task->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('task-taker/'.$task->id.'/view')}}"><i class="far fa-eye"></i></a>
                                   <a href="javascript:void(0);" onclick="viewProgress({{$task->id}})"><i class="fas fa-tasks"></i></a>
                                    <a href="{{url('task-tracker/'.$task->id.'/edit')}}"><i class="fad fa-pencil-alt"></i></a>
                                    <a href="{{url('task-tracker/'.$task->id)}}" onclick="event.preventDefault();
                                            document.getElementById('delete').submit();"><i class="far fa-trash-alt"></i></a>
                                    <form id="delete" action="{{url('task-tracker/'.$task->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                    </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('modal')
<!-- Modal -->
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Task Details</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" style="height:0px;">
                    <tr>
                        <td class="table-style text-muted">Project</td>
                        <td id="project" class="table-style"></td>
                    </tr>
                    <tr>
                        <td class="table-style text-muted">Employee</td>
                        <td id="employee" class="table-style"></td>
                    </tr>
                    <tr>
                        <td class="table-style text-muted">Task No</td>
                        <td id="task_no" class="table-style"></td>
                    </tr>
                    <tr>
                        <td class="table-style text-muted">Priority</td>
                        <td id="priority" class="table-style"></td>
                    </tr>
                    <tr>
                        <td class="table-style text-muted">Assign Date</td>
                        <td id="assign_date" class="table-style"></td>
                    </tr>
                    <tr>
                        <td class="table-style text-muted">Deadline Date</td>
                        <td id="deadline_date" class="table-style"></td>
                    </tr>
                    <tr>
                        <td class="table-style text-muted">Status</td>
                        <td id="status" class="table-style"></td>
                    </tr>

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('page-script')
<script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/features/searchHighlight/dataTables.searchHighlight.min.js"></script>
<script src="https://bartaz.github.io/sandbox.js/jquery.highlight.js"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
@stop

@push('after-scripts')

<script>
    function viewDetails(id) {
        $.get('/task/' + id, function(task) {
            $('#id').html(task.id);
            $('#project').html(task.project_id);
            $('#employee').html(task.employee_id);
            $('#task_no').html(task.task_no);
            $('#priority').html(task.priority);
            $('#assign_date').html(task.assign_date);
            $('#deadline_date').html(task.deadline_date);
            $('#status').html(task.status);
            $('#showModal').modal('toggle');
        });
    }

    function viewProgress(id) {
        $.get('/check-view-progress/' + id, function(checkViewProgress) {
            if (checkViewProgress.title) {
                window.location.href = "{{url('/view-task-progress')}}" + "/" + id;
            } else {
                alert('No task progress submit yet');
            }
        });
    }
</script>

@endpush