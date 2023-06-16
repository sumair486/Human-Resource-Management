@extends('layouts.master')
@section('title', 'Dashboard')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/light-gallery/css/lightgallery.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/fullcalendar/fullcalendar.min.css')}}">
@stop
@section('content')

@include('layouts.alert_message')

<div class="row clearfix">
    <div class="col-lg-4 col-md-12">
        <div class="card mcard_3">
            <div class="body">
                <img src="{{$employee->profile_image ? asset('storage/profile-images/'.Auth::user()->employee->profile_image) : asset('img/no_image.png') }}" class="rounded-circle shadow" alt="profile-image" width="200" height="200">
                <h4 class="m-t-10"></h4>
                <div class="row">
                    <div class="col-12">
                        {{-- <ul class="social-links list-unstyled">
                            <li><a title="facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                            <li><a title="twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                            <li><a title="instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                        </ul> --}}
                        <h5>{{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}}</h5>
                        <p class="text-muted">{{$employee->address}}</p>
                        {{-- <small class="text-muted">Email address: </small> --}}
                        <p class="text-muted">{{$employee->designation}}</p>
                        {{-- <hr> --}}
                        {{-- <small class="text-muted">Phone: </small> --}}
                        <p class="text-muted">{{$employee->joining_date}}</p>
                    </div>
                    {{-- <div class="col-4">
                        <small>Following</small>
                        <h5>852</h5>
                    </div>
                    <div class="col-4">
                        <small>Followers</small>
                        <h5>13k</h5>
                    </div>
                    <div class="col-4">
                        <small>Post</small>
                        <h5>234</h5>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- <div class="card">
            <div class="body">
                <small class="text-muted">Email address: </small>
                <p>{{$employee->email}}</p>
                <hr>
                <small class="text-muted">Phone: </small>
                <p>{{$employee->mobile_no}}</p>
            </div>
        </div> --}}
    </div>

    <div class="col-lg-8 col-md-12">
        <div class="card" style="margin-bottom:0;">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card w_data_1">
                        <div class="body">
                             <div class="w_icon green"><i class="fal fa-clock"></i></div>
                             <h4 class="mt-3">{{$totalAttendanceCurrentMonth}}</h4>
                             <span class="text-muted">Total Monthly Attendance</span>
                        </div>
                     </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card w_data_1">
                       <div class="body">
                            <div class="w_icon cyan"><i class="fas fa-calendar"></i></div>
                            <h4 class="mt-3">{{$leaveCount}}/14 days</h4>
                            <span class="text-muted">Leaves</span>
                       </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card w_data_1">
                       <div class="body">
                            <div class="w_icon dark"><i class="fas fa-tasks"></i></div>
                            <h4 class="mt-3"></h4>
                            <span class="text-muted">Tasks</span><br>
                            <span class="mb-0">Ongoing {{$processTaskCount}}</span><br>
                            <span class="mb-0">Completed {{$completedTaskCount}}</span>
                       </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="header">
                <h2>Time Tracker</h2>
            </div>
            <div class="body">
                <div class="row">
                <div class="col-md-12 col-sm-6">
                <span class="mb-2">Current Date Time: <span style="color:red;" id="ct6"></span></span>
                <div style="display:flex;" class="mt-3 mb-5">
                    @if (!$checkinDone)
                        <form action="{{url('manager/checkin')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">Check In</button>
                        </form>&nbsp;

                    @elseif($checkinDone && !$breakinDone)
                        <form action="{{url('manager/breakin')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">Break</button>
                        </form>&nbsp;

                        <form action="{{url('manager/checkout')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">Check Out</button>
                        </form>&nbsp;

                    @elseif($breakinDone && $checkinDone)
                        <form action="{{url('manager/breakout')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">Break Off</button>
                        </form>
                    @else
                    <p>checkin done</p>

                    @endif
                </div>
                {{-- <div class="row"> --}}
                    <p><b>Today Time Breaks</b></p>
                    <table class="table table-bordered">
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
</div>

    <div class="card">
        <div class="header">
            <h2>Time Tracker</h2>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="emp-datatable table table-hover" style="width: 100%;">
                    <thead class="thead-light">
                        <tr>
                            <th>Date</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Total Hours</th>
                            <th>Break Hours</th>
                            <th>Working Hours</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Date</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Total Hours</th>
                            <th>Break Hours</th>
                            <th>Working Hours</th>
                            <th>Options</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($employeeTimes as $employeeTime)
                        <tr>
                            <td>
                                <x-options-buttons>
                                    <x-slot name="buttons">
                                        <li><a href="javascript:void(0)" onclick="showModule({{$employeeTime->id}})"class="btn btn-sm btn-default">View</a></li>
                                    </x-slot>
                                </x-options-buttons>
                            </td>
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

<div class="card">
    <div class="header">
        <h2>Ongoing/Pending Tasks</h2>
        <ul class="header-dropdown">
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                <ul class="dropdown-menu dropdown-menu-right">
                   <li><a href="{{url('employee-task')}}">All Task</a></li>
                </ul>
            </li>
            <li class="remove">
                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
            </li>
        </ul>
    </div>
    <div class="body">
        <div class="table-responsive">
            <table class="emp-datatable table table-hover" style="width: 100%;">
                <thead class="thead-light">
                    <tr>
                        <th>Project Title</th>
                        <th>Task No</th>
                        <th>Priority</th>
                        <th>Assign Date</th>
                        <th>Deadline Date</th>
                        <th>Progress</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Project Title</th>
                        <th>Task No</th>
                        <th>Priority</th>
                        <th>Assign Date</th>
                        <th>Deadline Date</th>
                        <th>Progress</th>
                        <th>Status</th>
                        <th>Options</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($ongoingPendingTasks as $ongoingPendingTask)
                        <tr>
                            <td>
                                <x-options-buttons>
                                    <x-slot name="buttons">
                                        <li><a href="{{url('employee-task/'.$ongoingPendingTask->id.'/edit')}}">View/Edit</a></li>
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
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
@stop

@push('after-scripts')

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
