@extends('layouts.master')
@section('title', 'Dashboard')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}"/>
@stop
@section('content')

<!--<div class="row clearfix">-->
    <!--<div class="col-lg-3 col-md-6">-->
    <!--    <div class="card">-->
    <!--        <div class="body xl-blue">-->
    <!--            <h6 class="m-t-0 m-b-0">Active Employees</h6>-->
    <!--            <hr>-->
    <!--            @foreach($employeeLogin as $employeeLogin)-->
    <!--            <small>{{$employeeLogin->employee->first_name.''.$employeeLogin->employee->middle_name.''.$employeeLogin->employee->family_name}}: <i class="fa fa-circle" style="font-size:14px;color:green"></i>  </small><br>-->
    <!--            @endforeach-->
    <!--            <div class="sparkline" data-type="line" data-spot-radius="1" data-highlight-spot-color="rgb(233, 30, 99)" data-highlight-line-color="#222" data-min-spot-color="rgb(233, 30, 99)" data-max-spot-color="rgb(0, 150, 136)" data-spot-color="rgb(0, 188, 212)" data-offset="90" data-width="100%" data-height="40px" data-line-width="2" data-line-color="#ffffff" data-fill-color="transparent"><canvas width="177" height="40" style="display: inline-block; width: 177.25px; height: 40px; vertical-align: top;"></canvas></div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--R-->
    <style>
    @media only screen and (max-width: 768px) {
  h4.totla1 {
    font-size:12px !important;
}  
}
  
        #cards .card-body.text-center {
                margin: auto;
                    padding: 0px;
        }
        #cards .card .card-body {
            min-height: 100px !important;
        }
        #cards p {
            margin-bottom: 0.4rem !important;
        }
        .card {
    height: 115px;
}
small.v1 {
    border-left: 1px solid;
    padding: 3px;
}
h4.totla1 {
    margin: auto;
}
  </style>
    <div class="container" id="cards">
  <div class="card-deck">
    <div class="card" style="background: rgba(70,182,254,0.5) !important;">
      <div class="card-body text-center">
          <h4>{{$totalEmployees}}</h4>
                <p class="card-text">Total Employees</p>
      </div>
    </div>
    
    <div class="card" style="background: rgba(111,66,193,0.5) !important;">
      <div class="card-body text-center">
            <h4>{{$totalClients}}</h4>
                <p class="card-text">Total Clients</p>
      </div>
    </div>
    
     <div class="card" style="background: rgba(4,190,91,0.5) !important;">
      <div class="card-body text-center" >
            <h4 class="totla1">{{$totalProjects}}</h4>
                <p class="card-text">Total Projects</p>
                <small>Ongoing Project: {{$processProjects}}</small>
                <small class="v1">Pending Project: {{$pendingProjects}}</small>
                <small class="v1">Completed Project: {{$completedProjects}}</small>
      </div>
    </div>
    
      <div class="card" style="background: rgba(255,77,171,0.5) !important;">
      <div class="card-body text-center">
            <h4 class="totla1">{{$totalTasks}}</h4>
                <p class="card-text">Total Tasks</p>
               
                <small>Ongoing Task: {{$totalTasksOngoing}}</small>
                <small class="v1">Completed Task: {{$totalTasksCompleted}}</small>
      </div>
    </div>
    
    </div>
    </div>
    <!--R-->
   <!--<div class="col-lg-3 col-md-6">-->
   <!--     <div class="card">-->
   <!--         <div class="body xl-blue">-->
   <!--             <h4 class="m-t-0 m-b-0">{{$totalEmployees}}</h4>-->
   <!--             <p class="m-b-0">Total Employees</p>-->
   <!--             <div class="sparkline" data-type="line" data-spot-radius="1" data-highlight-spot-color="rgb(233, 30, 99)"-->
   <!--             data-highlight-line-color="#222" data-min-spot-color="rgb(233, 30, 99)" data-max-spot-color="rgb(0, 150, 136)"-->
   <!--             data-spot-color="rgb(0, 188, 212)" data-offset="90" data-width="100%" data-height="40px" data-line-width="2" -->
   <!--             data-line-color="#ffffff" data-fill-color="transparent">-->
   <!--                 <canvas width="177" height="40" style="display: inline-block; -->
   <!--             width: 177.25px; height: 40px; vertical-align: top;"></canvas></div>-->
   <!--         </div>-->
   <!--     </div>-->
   <!-- </div>-->
   <!-- <div class="col-lg-3 col-md-6">-->
   <!--     <div class="card">-->
   <!--         <div class="body xl-purple">-->
   <!--             <h4 class="m-t-0 m-b-0">{{$totalClients}}</h4>-->
   <!--             <p class="m-b-0 ">Total Clients</p>-->
   <!--             <div class="sparkline" data-type="line" data-spot-radius="1" data-highlight-spot-color="rgb(233, 30, 99)"-->
   <!--             data-highlight-line-color="#222" data-min-spot-color="rgb(233, 30, 99)" data-max-spot-color="rgb(0, 150, 136)"-->
   <!--             data-spot-color="rgb(0, 188, 212)" data-offset="90" data-width="100%" data-height="40px" data-line-width="2"-->
   <!--             data-line-color="#ffffff" data-fill-color="transparent"><canvas width="177" height="40" -->
   <!--             style="display: inline-block; width: 177.25px; height: 40px; vertical-align: top;"></canvas></div>-->
   <!--         </div>-->
   <!--     </div>-->
   <!-- </div>-->
   <!-- <div class="col-lg-3 col-md-6">-->
   <!--     <div class="card">-->
   <!--         <div class="body xl-green">-->
   <!--             <h4 class="m-t-0 m-b-0">{{$totalProjects}}</h4>-->
   <!--             <p class="m-b-0 ">Total Project</p>-->
   <!--             <hr>-->
   <!--             <small>Ongoing Project: {{$processProjects}}</small>-->
   <!--             <small>Pending Project: {{$pendingProjects}}</small>-->
   <!--             <small>Completed Project: {{$completedProjects}}</small>-->
                <!--<div class="sparkline" data-type="line" data-spot-radius="1" data-highlight-spot-color="rgb(233, 30, 99)" -->
                <!--data-highlight-line-color="#222" data-min-spot-color="rgb(233, 30, 99)" data-max-spot-color="rgb(0, 150, 136)" -->
                <!--data-spot-color="rgb(0, 188, 212)" data-offset="90" data-width="100%" data-height="40px" data-line-width="2"-->
                <!--data-line-color="#ffffff" data-fill-color="transparent">-->
                <!--    <canvas width="177" height="40" style="display: inline-block; width: 177.25px; height: 40px; vertical-align: top;">-->
                <!--</canvas></div>-->
   <!--         </div>-->
   <!--     </div>-->
   <!-- </div>-->
   <!-- <div class="col-lg-3 col-md-6">-->
   <!--     <div class="card">-->
   <!--         <div class="body xl-pink">-->
   <!--             <h4 class="m-t-0 m-b-0">{{$totalTasks}}</h4>-->
   <!--             <p class="m-b-0">Total Tasks</p>-->
   <!--             <hr>-->
   <!--             <small>Ongoing Task: {{$totalTasksOngoing}}</small>-->
   <!--             <small>Completed Task: {{$totalTasksCompleted}}</small>-->
                <!--<div class="sparkline" data-type="line" data-spot-radius="1" data-highlight-spot-color="rgb(233, 30, 99)" -->
                <!--data-highlight-line-color="#222" data-min-spot-color="rgb(233, 30, 99)" data-max-spot-color="rgb(0, 150, 136)"-->
                <!--data-spot-color="rgb(0, 188, 212)" data-offset="90" data-width="100%" data-height="40px" data-line-width="2"-->
                <!--data-line-color="#ffffff" data-fill-color="transparent">-->
                <!--<canvas width="177" height="40" style="display: inline-block; width: 177.25px; height: 40px; vertical-align: top;">-->
                <!--</canvas></div>-->
   <!--         </div>-->
   <!--     </div>-->
   <!-- </div>-->
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <button name="All" class="addtask"><a style="color:white;text-decoration: none;" href=" https://hrm.thedatech.com/task-tracker">All Task</a></button>
        </div>
        
           <div class="col-lg-4 col-md-4">
            <button name="Add" class="addtask"><a  style="color:white;text-decoration: none;" href=" https://hrm.thedatech.com/task-tracker/create">Add Task</a></button>
        </div>
        
           <div class="col-lg-4 col-md-4">
            <button  name="Hourly" class="addtask"><a  style="color:white;text-decoration: none;" href=" https://hrm.thedatech.com/task-report">Hourly Report</a></button>
        </div>
    </div>
</div>
<style>
button.addtask {
    border: none;
    font-weight:600;
    font-size:15px;
    margin-bottom:30px;
    margin-top:30px;
    background: #0c7ce6;;
    width: inherit;
    border-radius: 5px;
    height: 50px;
}
button.addtask:hover{
     box-shadow: 0 3px 8px 0 rgb(41 42 51 / 17%);
}
.card-body.text-center {
    margin-top: -35px;
}
p.card-text {
    font-size: 12px;
    font-weight: 700;
}
</style>

<!---->

<!--<div class="row clearfix">-->
<!--    <div class="col-lg-6 col-md-6">-->
<!--        <div class="card">-->
<!--            <div class="body xl-blue">-->
<!--                <h4 class="m-t-0 m-b-0">{{$totalTasksOngoing}}</h4>-->
<!--                <p class="m-b-0">Ongoing Task</p>-->
<!--                <div class="sparkline" data-type="line" data-spot-radius="1" data-highlight-spot-color="rgb(233, 30, 99)" data-highlight-line-color="#222" data-min-spot-color="rgb(233, 30, 99)" data-max-spot-color="rgb(0, 150, 136)" data-spot-color="rgb(0, 188, 212)" data-offset="90" data-width="100%" data-height="40px" data-line-width="2" data-line-color="#ffffff" data-fill-color="transparent"><canvas width="177" height="40" style="display: inline-block; width: 177.25px; height: 40px; vertical-align: top;"></canvas></div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-lg-6 col-md-6">-->
<!--        <div class="card">-->
<!--            <div class="body xl-purple">-->
<!--                <h4 class="m-t-0 m-b-0">{{$totalTasksCompleted}}</h4>-->
<!--                <p class="m-b-0 ">Completed Task</p>-->
<!--                <div class="sparkline" data-type="line" data-spot-radius="1" data-highlight-spot-color="rgb(233, 30, 99)" data-highlight-line-color="#222" data-min-spot-color="rgb(233, 30, 99)" data-max-spot-color="rgb(0, 150, 136)" data-spot-color="rgb(0, 188, 212)" data-offset="90" data-width="100%" data-height="42px" data-line-width="2" data-line-color="#ffffff" data-fill-color="transparent"><canvas width="177" height="42" style="display: inline-block; width: 177.25px; height: 42px; vertical-align: top;"></canvas></div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Ongoing Task</h2>
                <!--<ul class="header-dropdown">-->
                <!--     <button type="button" class="btn btn-primary" style="padding: inherit;margin: auto;">-->
                <!--    <li><a style="font-weight:700; color:white; margin-left:20px; text-decoration:none;" href="{{url('task')}}">All Task</a></li>-->
                <!--    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>-->
                        <!--<ul class="dropdown-menu dropdown-menu-right">-->
                        <!--    <li><a href="{{url('task')}}">All Task</a></li>-->
                        <!--</ul>-->
                <!--    </li>-->
                    <!--<li class="remove">-->
                    <!--    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>-->
                    <!--</li>-->
                <!--    </button>-->
                <!--</ul>-->
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="admin-datatable table table-hover" style="width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>Employee</th>
                                <th>Project Title</th>
                                <th>Task No</th>
                                <th>Priority</th>
                                <th>Assign Date</th>
                                <th>Deadline Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Employee</th>
                                <th>Project Title</th>
                                <th>Task No</th>
                                <th>Priority</th>
                                <th>Assign Date</th>
                                <th>Deadline Date</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($ongoingTasks as $ongoingTask)
                           
                            <tr>
                                <td>
                                  {{$ongoingTask->employee->first_name.' '.$ongoingTask->employee->middle_name.' '.$ongoingTask->employee->family_name ?? null}}


                                </td>
                                <td>
                                    {{$ongoingTask->project->title ?? null}}
                                </td>
                                <td>{{$ongoingTask->task_no}}</td>
                                @if ($ongoingTask->priority == 'normal')
                                <td><span class="badge badge-primary">{{$ongoingTask->priority}}</span></td>
                                @elseif ($ongoingTask->priority == 'medium')
                                <td><span class="badge badge-warning">{{$ongoingTask->priority}}</span></td>
                                @elseif ($ongoingTask->priority == 'high')
                                <td><span class="badge badge-danger">{{$ongoingTask->priority}}</span></td>
                                @endif
                                <td>{{$ongoingTask->assign_date ? \Carbon\Carbon::parse($ongoingTask->assign_date)->format('j F, Y') : null}}</td>
                                <td>{{$ongoingTask->deadline_date ? \Carbon\Carbon::parse($ongoingTask->deadline_date)->format('j F, Y') : null}}</td>
                                <td>
                                    @if ($ongoingTask->status == 'ongoing')
                                        <span class="badge badge-primary">{{$ongoingTask->status}}</span>
                                    @elseif($ongoingTask->status == 'completed')
                                        <span class="badge badge-success">{{$ongoingTask->status}}</span>
                                    @endif
                                </td>
                                {{-- <td>
                                    <div style="display: flex;">
                                        <a href="" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>
                                        <a href="" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="View"><i class="far fa-eye"></i></a>
                                        <form action="" method="post">
                                            @csrf
                                            <button type="submit"  class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2 style="padding: 10px"></h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{url('time-tracker')}}">All Checkin</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table id="refresh-data" class="admin-datatable table table-hover" style="width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>Options</th>
                                <th>Employee</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Hours</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Options</th>
                                <th>Employee</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Hours</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($todayCheckins as $todayCheckin)
                            <tr>
                                <td>
                                    {{-- <x-options-buttons>
                                        <x-slot name="buttons">
                                            <li><a href="javascript:void(0);" onclick="viewBreakTimeModule({{$time_tracker->id}})">View</a></li>
                                            <li><a href="javascript:void(0);" onclick="editModule({{$time_tracker->id}})">Edit</a></li>
                                            <li>
                                                <a href="{{url('time-tracker/'.$time_tracker->id)}}" onclick="event.preventDefault();
                                                    document.getElementById('delete').submit();">Delete</a>
                                                <form id="delete" action="{{url('time-tracker/'.$time_tracker->id)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            </li>
                                        </x-slot>
                                    </x-options-buttons> --}}
                                </td>
                                <td>{{$todayCheckin->first_name.' '.$todayCheckin->middle_name.' '.$todayCheckin->last_name}}</td>
                                <td>{{$todayCheckin->date ? date('l j F, Y', strtotime($todayCheckin->date)):null}}</td>
                                <td>
                                    <p style="margin:0;"><span class="text-primary">Check-In:</span><br>
                                        {{$todayCheckin->checkin ? date('j F, Y | g:i a', strtotime($todayCheckin->checkin)):null}}
                                    </p>
                                    <hr style="margin:0;border-top: 1px dashed #bbb8b8;">
                                    <p style="margin:0;"><span class="text-danger">Check-Out:</span><br>
                                        {{$todayCheckin->checkout ? date('j F, Y | g:i a', strtotime($todayCheckin->checkout)) : '-- Nil --'}}
                                    </p>
                                </td>
                                <td>
                                    <p style="margin:0;"><span class="text-primary">Total Hours:</span><br>
                                        {{$todayCheckin->total_hours ?? '-- Nil --'}}
                                    </p>
                                    <hr style="margin:0;border-top: 1px dashed #bbb8b8;">
                                    <p style="margin:0;"><span class="text-danger">Break Hours:</span><br>
                                        {{$todayCheckin->break_hours ?? '-- Nil --'}}
                                    </p>
                                    <hr style="margin:0;border-top: 1px dashed #bbb8b8;">
                                    <p style="margin:0;"><span class="text-success">Working Hours:</span><br>
                                        {{$todayCheckin->working_hours ?? '-- Nil --'}}
                                    </p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Edit Modal for TimeTracker -->
                <div class="modal fade" id="checkinModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Time</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form id="Edit-Checkin">
                        <div class="modal-body">
                            @csrf
                            @method('put')
                            <input type="hidden" id="id" name="id"/>
                            <div class="form-group">
                                <label><b>Check In Time</b></label>
                                <input type="datetime" class="form-control form-control-sm" id="checkin" name="checkin">
                            </div>
                            <div class="form-group">
                                <label><b>Check Out Time</b></label>
                                <input type="datetime" class="form-control form-control-sm" id="checkout" name="checkout">
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>

            </div>
        </div>



    </div>
</div>



{{-- <div class="row clearfix">
    <div class="col-lg-6">
        <div class="card">
            <div class="header">
                <h2>Pending Projects</h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{url('time-tracker')}}">All Projects</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table id="refresh-data" class="admin-datatable table table-hover" style="width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>Options</th>
                                <th>Project Name</th>
                                <th>Client</th>
                                <th>Status</th>
                                <th>Task Count</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Options</th>
                                <th>Project Name</th>
                                <th>Client</th>
                                <th>Status</th>
                                <th>Task Count</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($pendingProjectsDatas as $pendingProjectsData)
                            <tr>
                                <td>
                                </td>
                                <td>{{$pendingProjectsData->title}}</td>
                                <td>{{$pendingProjectsData->full_name}}</td>
                                <td>{{$pendingProjectsData->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




</div> --}}

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2 style="padding: 10px"></h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{url('time-tracker')}}">All Checkin</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table id="refresh-data" class="admin-datatable table table-hover" style="width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>Options</th>
                                <th>Employee</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Hours</th>
                            </tr>
                        </thead>
                        <tfoot  class="thead-light">
                            <tr>
                                <th>Options</th>
                                <th>Employee</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Hours</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($missingCheckouts as $missingCheckout)
                            <tr>
                                <td>
                                    {{-- <x-options-buttons>
                                        <x-slot name="buttons">
                                            <li><a href="javascript:void(0);" onclick="viewBreakTimeModule({{$time_tracker->id}})">View</a></li>
                                            <li><a href="javascript:void(0);" onclick="editModule({{$time_tracker->id}})">Edit</a></li>
                                            <li>
                                                <a href="{{url('time-tracker/'.$time_tracker->id)}}" onclick="event.preventDefault();
                                                    document.getElementById('delete').submit();">Delete</a>
                                                <form id="delete" action="{{url('time-tracker/'.$time_tracker->id)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            </li>
                                        </x-slot>
                                    </x-options-buttons> --}}
                                </td>
                                <td>{{$missingCheckout->employee->first_name.' '.$missingCheckout->employee->middle_name.' '.$missingCheckout->employee->last_name}}</td>
                                <td>{{$missingCheckout->date ? date('l j F, Y', strtotime($missingCheckout->date)):null}}</td>
                                <td>
                                    <p style="margin:0;"><span class="text-primary">Check-In:</span><br>
                                        {{$missingCheckout->checkin ? date('j F, Y | g:i a', strtotime($missingCheckout->checkin)):null}}
                                    </p>
                                    <hr style="margin:0;border-top: 1px dashed #bbb8b8;">
                                    <p style="margin:0;"><span class="text-danger">Check-Out:</span><br>
                                        {{$missingCheckout->checkout ? date('j F, Y | g:i a', strtotime($missingCheckout->checkout)) : '-- Nil --'}}
                                    </p>
                                </td>
                                <td>
                                    <p style="margin:0;"><span class="text-primary">Total Hours:</span><br>
                                        {{$missingCheckout->total_hours ?? '-- Nil --'}}
                                    </p>
                                    <hr style="margin:0;border-top: 1px dashed #bbb8b8;">
                                    <p style="margin:0;"><span class="text-danger">Break Hours:</span><br>
                                        {{$missingCheckout->break_hours ?? '-- Nil --'}}
                                    </p>
                                    <hr style="margin:0;border-top: 1px dashed #bbb8b8;">
                                    <p style="margin:0;"><span class="text-success">Working Hours:</span><br>
                                        {{$missingCheckout->working_hours ?? '-- Nil --'}}
                                    </p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Edit Modal for TimeTracker -->
                <div class="modal fade" id="checkinModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Time</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form id="Edit-Checkin">
                        <div class="modal-body">
                            @csrf
                            @method('put')
                            <input type="hidden" id="id" name="id"/>
                            <div class="form-group">
                                <label><b>Check In Time</b></label>
                                <input type="datetime" class="form-control form-control-sm" id="checkin" name="checkin">
                            </div>
                            <div class="form-group">
                                <label><b>Check Out Time</b></label>
                                <input type="datetime" class="form-control form-control-sm" id="checkout" name="checkout">
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--<div class="col-lg-6">-->
    <!--    <div class="card">-->
    <!--        <div class="header">-->
    <!--            <h2>Today Checkins</h2>-->
    <!--            <ul class="header-dropdown">-->
    <!--                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>-->
    <!--                    <ul class="dropdown-menu dropdown-menu-right">-->
    <!--                        <li><a href="{{url('time-tracker')}}">All Checkin</a></li>-->
    <!--                    </ul>-->
    <!--                </li>-->
    <!--                <li class="remove">-->
    <!--                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>-->
    <!--                </li>-->
    <!--            </ul>-->
    <!--        </div>-->
    <!--        <div class="body">-->
    <!--            <div class="table-responsive">-->
    <!--                <table id="refresh-data" class="admin-datatable table table-hover" style="width: 100%;">-->
    <!--                    <thead class="thead-light">-->
    <!--                        <tr>-->
    <!--                            <th>Options</th>-->
    <!--                            <th>Employee</th>-->
    <!--                            <th>Date</th>-->
    <!--                            <th>Time</th>-->
    <!--                            <th>Hours</th>-->
    <!--                        </tr>-->
    <!--                    </thead>-->
    <!--                    <tfoot>-->
    <!--                        <tr>-->
    <!--                            <th>Options</th>-->
    <!--                            <th>Employee</th>-->
    <!--                            <th>Date</th>-->
    <!--                            <th>Time</th>-->
    <!--                            <th>Hours</th>-->
    <!--                        </tr>-->
    <!--                    </tfoot>-->
    <!--                    <tbody>-->
    <!--                        @foreach ($todayCheckins as $todayCheckin)-->
    <!--                        <tr>-->
    <!--                            <td>-->
    <!--                                {{-- <x-options-buttons>-->
    <!--                                    <x-slot name="buttons">-->
    <!--                                        <li><a href="javascript:void(0);" onclick="viewBreakTimeModule({{$time_tracker->id}})">View</a></li>-->
    <!--                                        <li><a href="javascript:void(0);" onclick="editModule({{$time_tracker->id}})">Edit</a></li>-->
    <!--                                        <li>-->
    <!--                                            <a href="{{url('time-tracker/'.$time_tracker->id)}}" onclick="event.preventDefault();-->
    <!--                                                document.getElementById('delete').submit();">Delete</a>-->
    <!--                                            <form id="delete" action="{{url('time-tracker/'.$time_tracker->id)}}" method="post">-->
    <!--                                                @method('delete')-->
    <!--                                                @csrf-->
    <!--                                            </form>-->
    <!--                                        </li>-->
    <!--                                    </x-slot>-->
    <!--                                </x-options-buttons> --}}-->
    <!--                            </td>-->
    <!--                            <td>{{$todayCheckin->first_name.' '.$todayCheckin->middle_name.' '.$todayCheckin->last_name}}</td>-->
    <!--                            <td>{{$todayCheckin->date ? date('l j F, Y', strtotime($todayCheckin->date)):null}}</td>-->
    <!--                            <td>-->
    <!--                                <p style="margin:0;"><span class="text-primary">Check-In:</span><br>-->
    <!--                                    {{$todayCheckin->checkin ? date('j F, Y | g:i a', strtotime($todayCheckin->checkin)):null}}-->
    <!--                                </p>-->
    <!--                                <hr style="margin:0;border-top: 1px dashed #bbb8b8;">-->
    <!--                                <p style="margin:0;"><span class="text-danger">Check-Out:</span><br>-->
    <!--                                    {{$todayCheckin->checkout ? date('j F, Y | g:i a', strtotime($todayCheckin->checkout)) : '-- Nil --'}}-->
    <!--                                </p>-->
    <!--                            </td>-->
    <!--                            <td>-->
    <!--                                <p style="margin:0;"><span class="text-primary">Total Hours:</span><br>-->
    <!--                                    {{$todayCheckin->total_hours ?? '-- Nil --'}}-->
    <!--                                </p>-->
    <!--                                <hr style="margin:0;border-top: 1px dashed #bbb8b8;">-->
    <!--                                <p style="margin:0;"><span class="text-danger">Break Hours:</span><br>-->
    <!--                                    {{$todayCheckin->break_hours ?? '-- Nil --'}}-->
    <!--                                </p>-->
    <!--                                <hr style="margin:0;border-top: 1px dashed #bbb8b8;">-->
    <!--                                <p style="margin:0;"><span class="text-success">Working Hours:</span><br>-->
    <!--                                    {{$todayCheckin->working_hours ?? '-- Nil --'}}-->
    <!--                                </p>-->
    <!--                            </td>-->
    <!--                        </tr>-->
    <!--                        @endforeach-->
    <!--                    </tbody>-->
    <!--                </table>-->
    <!--            </div>-->

                <!-- Edit Modal for TimeTracker -->
    <!--            <div class="modal fade" id="checkinModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
    <!--                <div class="modal-dialog">-->
    <!--                <div class="modal-content">-->
    <!--                    <div class="modal-header">-->
    <!--                    <h5 class="modal-title" id="exampleModalLabel">Edit Time</h5>-->
    <!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
    <!--                        <span aria-hidden="true">&times;</span>-->
    <!--                    </button>-->
    <!--                    </div>-->
    <!--                    <form id="Edit-Checkin">-->
    <!--                    <div class="modal-body">-->
    <!--                        @csrf-->
    <!--                        @method('put')-->
    <!--                        <input type="hidden" id="id" name="id"/>-->
    <!--                        <div class="form-group">-->
    <!--                            <label><b>Check In Time</b></label>-->
    <!--                            <input type="datetime" class="form-control form-control-sm" id="checkin" name="checkin">-->
    <!--                        </div>-->
    <!--                        <div class="form-group">-->
    <!--                            <label><b>Check Out Time</b></label>-->
    <!--                            <input type="datetime" class="form-control form-control-sm" id="checkout" name="checkout">-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="modal-footer">-->
    <!--                    <button type="submit" class="btn btn-primary">Save changes</button>-->
    <!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
    <!--                    </div>-->
    <!--                    </form>-->
    <!--                </div>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->


</div>


@stop

@section('page-script')
<script src="{{asset('assets/bundles/countTo.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/knob.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/widgets/infobox/infobox-1.js')}}"></script>
<script src="{{asset('assets/js/pages/charts/jquery-knob.js')}}"></script>
<script src="{{asset('assets/js/pages/charts/sparkline.js')}}"></script>

<script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
@stop
