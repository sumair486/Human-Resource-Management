@extends('layouts.master')
@section('title', 'Profile')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('assets/plugins/light-gallery/css/lightgallery.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/fullcalendar/fullcalendar.min.css')}}">
@stop
@section('content')


<div class="row clearfix">
    <div class="col-lg-4 col-md-12">
        <div class="card mcard_3 mt-2">
            <div class="body">
                <img src="{{$employee->profile_image ? asset('storage/profile_images/'.Auth::user()->employee->profile_image) : asset('img/no_image.png') }}" class="rounded-circle shadow" alt="profile-image" width="200" height="200">
                <h4 class="m-t-10"></h4>
                <div class="row">
                    <div class="col-12">
                        <h5>{{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}}</h5>
                        <p class="text-muted"><b>Employee ID:</b> {{$employee->employee_no}}</p>
                        
                        <p class="text-muted"><b>Shift Timing:</b> {{$employee->working_time_start}} to {{$employee->working_time_end}}</p>
                        <p class="text-muted" style:"font-size:10px;"><b>Designation:</b> {{$employee->designation->title}}</p>
                            <p class="text-muted"><b>Date of Joining:</b> {{date('j F, Y', strtotime($employee->joining_date))}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8 col-md-12 checker1">
         <span class="datetime"><b>Current Date Time: </b><span style="color:red;" id="ct6"></span></span>
         <div class="card">
            <div class="body" id="time_track">
                <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-6" id="time_track_3">
                <!--<span class="mb-2"><b>Current Date Time checkk: </b><span style="color:red;" id="ct6"></span></span>-->
                <div class="time_track_4" style="display:flex;" class="mb-5">
                    <style>
                        #time_track{
                            height:433px;
                        
                        }
                        div#time_track_2 {
                              padding-left: 15px;
                           padding-right: 15px;
                        }
                        .col-lg-8.col-md-12.checker1 {
                            margin-top: -20px;
                        }
                        .card .body{
                            padding:10px;
                        }
                      .body.cards_height {
                                    height: 200px;
                                }
                    </style>
                    @if (!$checkinDone)
                        <form action="{{url('checkin')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary mt-2">Check In</button>
                        </form>&nbsp;

                    @elseif($checkinDone && !$breakinDone)
                        <form action="{{url('breakin')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-md btn-primary mt-2">Break</button>
                        </form>&nbsp;

                        <form action="{{url('checkout')}}" method="POST">
                            @csrf
                            @method('put')
                            <input type="hidden" name="is_checkin" value="0">
                            <button type="submit" class="btn btn-md btn-primary mt-2" >Check Out</button>
                        </form>&nbsp;

                    @elseif($breakinDone && $checkinDone)
                        <form action="{{url('breakout')}}" method="POST">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-sm btn-primary mt-2">Break Off</button>
                        </form>
                    @else
                    <p>checkin done</p>
                    @endif
                </div>
                {{-- <div class="row"> --}}
                    <p class="break">Today Time Breaks</p>
                    <table class="table table-bordered" style="text-align:center">
                        <tr>
                            <th>Break In</th>
                            <th>Break Off</th>
                            <th>Total Hours</th>
                        </tr>
                        @foreach ($todayBreakTime as $row)
                        <tr>
                            <td>{{$row->breakin}}</td>
                            <td>{{$row->breakout}}</td>
                            <td>{{$row->total_hours}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <th colspan="2">Total Time</th>
                            <td>{{$sumBreakTime}}</td>
                        </tr>
                    </table>
                {{-- </div> --}}
                </div>

                {{-- <div class="col-md-6">
                </div> --}}
      </div>
            </div>
            </div>
        </div>
        <div class="card" style="margin-bottom:0;">
            <div class="row" id="time_track_2">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="card w_data_1">
                       <div class="body cards_height" >
                            <div class="w_icon dark"><i class="fas fa-tasks"></i></div>
                            <h4 class="mt-3"></h4>
                            <span class="text-muted">Tasks</span><br>
                            <span class="mb-0">Ongoing {{$ongoingTaskCount}}</span><br>
                            <span class="mb-0">Pending {{$pendingTaskCount}}</span><br>
                            <span class="mb-0">In progress {{$inprogressTaskCount}}</span><br>
                            <span class="mb-0">Completed {{$completedTaskCount}}</span>
                       </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="card w_data_1">
                        <div class="body cards_height">
                             <div class="w_icon green"><i class="fal fa-clock"></i></div>
                             <h4 class="mt-3">{{$totalAttendanceCurrentMonth}}</h4>
                             <span class="text-muted">Total Monthly Check-ins</span>
                        </div>
                     </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="card w_data_1">
                       <div class="body cards_height">
                            <div class="w_icon cyan"><i class="fas fa-calendar"></i></div>
                            <h4 class="mt-3">{{$leaveCount}}/14 days</h4>
                            <span class="text-muted">Leaves</span>
                       </div>
                    </div>
                </div>
                
              
                

                
            </div>
        </div>

       

    </div>
</div>


<!--<div class="card">-->
<!--    <div class="header">-->
<!--        <h2>Ongoing/Pending Tasks</h2>-->
<!--        <ul class="header-dropdown">-->
<!--            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> -->
<!--              <button type="button" class="btn btn-primary">Add Task</button>-->
            <!--<i class="zmdi zmdi-more"></i>-->
<!--            </a>-->
<!--                <ul class="dropdown-menu dropdown-menu-left mt-3">-->
<!--                   <li><a href="{{url('employee-task')}}">All Task</a></li>-->
<!--                </ul>-->
<!--            </li>-->
            <!--<li class="remove">-->
            <!--    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>-->
            <!--</li>-->
<!--        </ul>-->
<!--    </div>-->
    <div class="body">
        <div class="table-responsive">
            <table class="emp-datatable table table-hover" style="width: 100%;">
                <thead class="thead-light">
                    <tr class="dash_2">
                        <th>Options</th>
                        <th>Project Title</th>
                        <th>Task No</th>
                        <th>Priority</th>
                        <th>Assign Date</th>
                        <th>Deadline Date</th>
                        <th>Progress</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="dash_2">
                        <th>Options</th>
                        <th>Project Title</th>
                        <th>Task No</th>
                        <th>Priority</th>
                        <th>Assign Date</th>
                        <th>Deadline Date</th>
                        <th>Progress</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($ongoingPendingTasks as $ongoingPendingTask)
                        <tr>
                            <td>
                                <x-options-buttons>
                                    <x-slot name="buttons">
                                        <li><a href="{{url('task/'.$ongoingPendingTask->id.'/edit')}}">View Task</a></li>
                                    </x-slot>
                                </x-options-buttons>
                            </td>
                            <td>{{$ongoingPendingTask->project->title}}</td>
                            <td>{{$ongoingPendingTask->task_no}}</td>
                            <td>{{$ongoingPendingTask->priority}}</td>
                            <td>{{$ongoingPendingTask->assign_date ? \Carbon\Carbon::parse($ongoingPendingTask->assign_date)->format('j F, Y') : null}}</td>
                            <td>{{$ongoingPendingTask->deadline_date ? \Carbon\Carbon::parse($ongoingPendingTask->deadline_date)->format('j F, Y') : null}}
                            </td>
                            <td>
                                <p style="margin-bottom: -10px;"><small>{{$ongoingPendingTask->progress}}%</small></p>
                                <div class="progress" style="margin-top:8px;background:#F7C600;border-radius:0;">
                                <div class="progress-bar l-green" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: {{$ongoingPendingTask->progress}}%;border-radius:0;"></div>
                                </div>
                            </td>
                            <td>
                                @if ($ongoingPendingTask->status == 'in progress')
                                    <span class="badge badge-warning">{{$ongoingPendingTask->status}}</span>
                                @elseif ($ongoingPendingTask->status == 'ongoing')
                                    <span class="badge badge-primary">{{$ongoingPendingTask->status}}</span>
                                @elseif ($ongoingPendingTask->status == 'pending')
                                    <span class="badge badge-danger">{{$ongoingPendingTask->status}}</span>
                                {{-- @elseif ($ongoingPendingTask->status == 'completed')
                                    <span class="badge badge-success">{{$ongoingPendingTask->status}}</span> --}}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    tr.dash_2 {
    font-size: 14px;
}
  @media only screen and (min-width: 980px) {
      span.datetime {
    float: right;
}


p.break {
    font-weight: bolder;
        margin-top: 20px;
        margin-left:240px;
}
}
button.btn.btn-md.btn-primary.mt-2 {
    width: 330px;
    height: 50px;
    font-weight: 600;
    font-size: 15px;
    margin-left: 15px;
    margin-right: 15px;
}
.text-muted {
    color: #6c757d!important;
    font-size: 15px;
}
@media (min-width: 768px){
button.btn.btn-md.btn-primary.mt-2 {
    margin: auto;
    width: 304px;
}
p.break {
    text-align: inherit !important;
}
span.datetime {
    margin: 5px;
}
table.table.table-bordered {
    width: 613px;
}
}
 @media only screen and (min-width: 320px) and (orientation: portrait) {

button.btn.btn-md.btn-primary.mt-2 {
    width: auto;
    height: auto;
}
div#time_track {
    padding-inline: 25px;
}
div#time_track_3 {
    margin-left: 0px;
}
p.break {
    font-weight: bolder;
        margin-top: 20px;
        text-align:center;
      }
</style>

    <div class="card">
        <div class="header">
            <h2>Time Tracker</h2>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="emp-datatable table table-hover" style="width: 100%;">
                    <thead class="thead-light">
                        <tr class="dash_2">
                            <th>Options</th>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Total Hours</th>
                            <th>Break Hours</th>
                            <th>Working Hours</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Options</th>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Total Hours</th>
                            <th>Break Hours</th>
                            <th>Working Hours</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($employeeTimes as $employeeTime)
                        <tr>
                            <td>
                                <x-options-buttons>
                                    <x-slot name="buttons">
                                        <li><a href="javascript:void(0)" onclick="showModule({{$employeeTime->id}})">View Break Times</a></li>
                                    </x-slot>
                                </x-options-buttons>
                            </td>
                           <td> <input type="hidden" value="{{$employeeTime->id}}"></td>
                            <td>{{$employeeTime->date ? date('j F, Y', strtotime($employeeTime->date)):null}}</td>
                            <td>{{$employeeTime->checkin ? date('j F, Y | g:i a', strtotime($employeeTime->checkin)):null}}</td>
                            <td>{{$employeeTime->checkout ? date('j F, Y | g:i a', strtotime($employeeTime->checkout)):null}}</td>
                            <td>{{$employeeTime->total_hours ? $employeeTime->total_hours : null}}</td>
                            <td>{{$employeeTime->break_hours ? $employeeTime->break_hours : null}}</td>
                            <td>{{$employeeTime->working_hours ? $employeeTime->working_hours : null}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Modal -->
                <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Time Breaks</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Break Time In</th>
                                        <th>Break Time Out</th>
                                        <th>Total Break Time</th>
                                    </tr>
                                </thead>
                                <tbody id="break-time">
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!---->


    <!-- Button trigger modal -->

  <!--<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">-->
  <!--  <div class="modal-dialog modal-dialog-scrollable" role="document">-->
  <!--    <div class="modal-content">-->
  <!--      <div class="modal-header">-->
  <!--        <h5 class="modal-title" id="exampleModalScrollableTitle">Check In</h5>-->
  <!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
  <!--          <span aria-hidden="true">&times;</span>-->
  <!--        </button>-->
  <!--      </div>-->
  <!--      <div class="modal-body">-->
  <!--      <center>-->
  <!--        <button type="button" class="btn btn-primary" id="over18">Check In</button>-->
  <!--        </center>-->
  <!--      </div>-->
  <!--      <div class="modal-footer">-->
  <!--        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
  <!---->
<!---->


<!-- Modal -->
<div class="modal fade" id="onloadModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</div>
{{-- <div class="card">
    <div class="body">
        <div id="calendar"></div>
    </div>
</div> --}}

   @if(auth::user()->role_id == 4)

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Missing Check-Outs</h2>
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

           

            </div>
        </div>
    </div>



</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Missing Break-Outs</h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{url('time-tracker')}}">Todays All Break</a></li>
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
                           
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Options</th>
                                <th>Employee</th>
                                <th>Date</th>
                                <th>Time</th>
                             
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($MissingTimeBraker as $MissingTimeBraker)
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
                              @if($check = App\Models\Employee::where('id',$MissingTimeBraker->employee_id)->get())
                                <td>@foreach($check as $item)
                                  {{$item->first_name}} {{$item->last_name}}
                                   @endforeach
                                </td>
                                @else
                                <td>Deleted User </td>
                                @endif
                                <td>{{$MissingTimeBraker->date ? date('l j F, Y', strtotime($MissingTimeBraker->date)):null}}</td>
                                <td>
                                    <p style="margin:0;"><span class="text-primary">Break-In:</span><br>
                                        {{$MissingTimeBraker->breakin ? date('j F, Y | g:i a', strtotime($MissingTimeBraker->breakin)):null}}
                                    </p>
                                    <hr style="margin:0;border-top: 1px dashed #bbb8b8;">
                                    <p style="margin:0;"><span class="text-danger">Break-Out:</span><br>
                                        {{$MissingTimeBraker->breakout ? date('j F, Y | g:i a', strtotime($MissingTimeBraker->breakout)) : '-- Nil --'}}
                                    </p>
                                </td>
                            
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

           

            </div>
        </div>
    </div>



</div>

@endif

@stop

@section('page-script')
<script src="{{asset('assets/plugins/light-gallery/js/lightgallery-all.min.js')}}"></script>
<script src="{{asset('assets/bundles/fullcalendarscripts.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/medias/image-gallery.js')}}"></script>
<script src="{{asset('assets/js/pages/calendar/calendar.js')}}"></script>

<script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<!---->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
<!---->
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
@stop

@push('after-scripts')

 <script>
     
    
//      $(document).ready(function()
//      {
//         $('#exampleModalScrollable').modal('show');
        
//         $('#over18').on('click', function (e) {

//     $('#exampleModalScrollable').modal('hide')

// });
        
//      })
 </script>

<script>

function showModule(id){
    $.get('/timebreaker/'+id, function(viewTimeTracker){
        $('#break-time').empty();
        if (viewTimeTracker.length > 0) {
            $.each(viewTimeTracker, function (index, value) {
                $('#break-time').append('<tr>' +
                    '<td>' + value.breakin  + '</td>' +
                    '<td>' + value.breakout + '</td>' +
                    '<td>' + value.total_hours + '</td>' +
                    '</tr>');
            });

            $('#viewModal').modal('toggle');
        }
        else{
            $('#break-time').append('<div  style="text-align:center;"><p>Break time not found</p></div>');
            $('#viewModal').modal('toggle');
        };

    });
}

$(window).load(function()
{
    $('#onloadModal').modal('show');
})

</script>

<script>
    function display_ct6() {
        var x = new Date()
        var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
        hours = x.getHours( ) % 12;
        hours = hours ? hours : 12;
        var x1 = x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear();
        x1 = x1 + " - " +  hours + ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
        document.getElementById('ct6').innerHTML = x1;
        display_c6();
        }
        function display_c6(){
        var refresh=1000; // Refresh rate in milli seconds
        mytime=setTimeout('display_ct6()',refresh)
        }
    display_c6();
</script>
@endpush
