@extends('layouts.master')
@section('title', 'Time Tracker')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}" />
@stop
@section('content')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Time Tracker</h2>
                <ul class="header-dropdown">
                    {{-- <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                            <li><a href="javascript:void(0);">Edit</a></li>
                        </ul>
                    </li> --}}
                    <!--<li class="remove">-->
                    <!--    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>-->
                    <!--</li>-->
                </ul>
            </div>

            <div class="body">
                <div class="table-responsive">
                    <table id="refresh-data"refresh-data class="data-datatable table table-hover" style="width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>Options</th>
                                <th>ID</th>

                                <th>Employee</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Hours</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Options</th>
                                <th>ID</th>

                                <th>Employee</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Hours</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($time_trackers as $time_tracker)
                            <tr>
                                <td>
                                    <x-options-buttons>
                                        <x-slot name="buttons">
                                            <li><a href="javascript:void(0);" onclick="viewBreakTimeModule({{$time_tracker->id}})">Edit Break Time</a></li>
                                            <li><a href="javascript:void(0);" onclick="editModule({{$time_tracker->id}})">Edit Check-In Time</a></li>

                                            <!-- delete --  -->
                                            <li>
                                                <a href="{{ route('destroy.tracker', ['id' => $time_tracker->id]) }}" title="@lang('')">
                                                    Delete
                                                </a>
                                            </li>

                                        </x-slot>
                                    </x-options-buttons>
                                </td>
                                <td>{{$time_tracker->id}}</td>

                                 <td>{{$time_tracker->employee->first_name.' '.$time_tracker->employee->middle_name.' '.$time_tracker->employee->last_name}}</td> 
                                <td>{{$time_tracker->date ? date('l j F, Y', strtotime($time_tracker->date)):null}}</td>
                                <td>
                                    <p style="margin:0;"><span class="text-primary">Check-In:</span><br>
                                        {{$time_tracker->checkin ? date('j F, Y | g:i a', strtotime($time_tracker->checkin)):null}}
                                    </p>
                                    <hr style="margin:0;border-top: 1px dashed #bbb8b8;">
                                    <p style="margin:0;"><span class="text-danger">Check-Out:</span><br>
                                        {{$time_tracker->checkout ? date('j F, Y | g:i a', strtotime($time_tracker->checkout)) : '-- Nil --'}}
                                    </p>
                                </td>
                                <td>
                                    <p style="margin:0;"><span class="text-primary">Total Hours:</span><br>
                                        {{$time_tracker->total_hours ?? '-- Nil --'}}
                                    </p>
                                    <hr style="margin:0;border-top: 1px dashed #bbb8b8;">
                                    <p style="margin:0;"><span class="text-danger">Break Hours:</span><br>
                                        {{$time_tracker->break_hours ?? '-- Nil --'}}
                                    </p>
                                    <hr style="margin:0;border-top: 1px dashed #bbb8b8;">
                                    <p style="margin:0;"><span class="text-success">Working Hours:</span><br>
                                        {{$time_tracker->working_hours ?? '-- Nil --'}}
                                    </p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Edit Modal for TimeTracker -->
                <div class="modal fade" id="checkinModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="container breaktime_1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Time</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <style>
                                .modal-content {
                                        width: 750px;
                                        
                                    }
                             .container.breaktime_1 {
                                        padding-right: 230px;
                                    }
                                   
                                @media only screen and (max-width: 600px) {
                                     .modal-dialog{
                                            overflow: auto;
                                        }
                                        .container.breaktime_1 {
                                            padding-right: 0;
                                        }
                                    }
                                    
                             </style>
                            <form id="Edit-Checkin">
                                <div class="modal-body">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" id="id" name="id" />
                                    <!--<div class="form-group">-->
                                    <!--    <label><b>Check In Time</b></label>-->
                                        <!--<input type="datetime" class="form-control form-control-sm" id="checkin" name="checkin">-->
                                    <!--</div>-->
                                   <div class="form-group">
                                        <label><b>Check In Time</b></label>
                                          <input type="datetime" id="checkin" name="checkin" class="form-control form-control-sm" >
                                          </div> 
                                   
                                <div class="form-group">
                                        <label><b>Check Out Time</b></label>
                                        <!--<input type="datetime" class="form-control form-control-sm" id="checkout" name="checkout">-->
                                        <input type="datetime" id="checkout" name="checkout" class="form-control form-control-sm">
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

@stop

@section('modal')
<!-- View Modal for BreakTime -->
<div class="modal fade" id="viewBreakTimeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="container breaktime_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">All Break Time</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="EditBreakTime" name="EditBreakTime" action="">
                <div class="modal-body">
                    @csrf
                    {{-- <input type="hidden" id="id" name="id"/> --}}
                    
                    <!---->
                     <!--<div class="form-group">-->
                     <!--                   <label><b>Break Time In</b></label>-->
                     <!--                     <input type="datetime-local" id="birthdaytime" name="birthdaytime" class="form-control form-control-sm" >-->
                     <!--                     </div> -->
                                   
                     <!--           <div class="form-group">-->
                     <!--                   <label><b>Break Time Out</b></label>-->
                                        <!--<input type="datetime" class="form-control form-control-sm" id="checkout" name="checkout">-->
                     <!--                   <input type="datetime-local" id="birthdaytime" name="birthdaytime" class="form-control form-control-sm">-->
                     <!--               </div>-->
                                    
                     <!--                 <div class="form-group">-->
                     <!--                   <label><b>Total Break Time</b></label>-->
                                        <!--<input type="datetime" class="form-control form-control-sm" id="checkout" name="checkout">-->
                     <!--                   <input type="datetime-local" id="birthdaytime" name="birthdaytime" class="form-control form-control-sm">-->
                     <!--               </div>-->
                    <!---->
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
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
{{-- ./Break Time modal --}}
@stop

@section('page-script')
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
    function editModule(id) {
        $.get('/time-tracker/' + id + '/edit', function(timeTracker) {
            $('#id').val(timeTracker.id);
            $('#checkin').val(timeTracker.checkin);
            $('#checkout').val(timeTracker.checkout);
            $('#checkinModal').modal('toggle');
        });
    }

    $('#Edit-Checkin').submit(function(e) {
        e.preventDefault();

        let _token = $('input[name=_token]').val();
        let id = $('#id').val();
        let checkin = $('#checkin').val();
        let checkout = $('#checkout').val();

        $.ajax({
            url: "{{url('time-tracker')}}" + "/" + id,
            type: "PUT",
            data: {
                _token: _token,
                checkin: checkin,
                checkout: checkout,
            },
            success: function(response) {
                $('#checkinModal').modal('toggle');
                if (alert('Time updated!')) {
                    window.reload();
                }

                // $('#refresh-data').fadeOut(300, function(){
                //     $("#refresh-data").fadeIn().load(location.href + " #refresh-data");
                // });
            }
        });
    });

    function viewBreakTimeModule(id) {
        $.get('/time-breaker/' + id, function(timeBreaker) {
            $('#break-time').empty();
            if (timeBreaker.length > 0) { 
                $.each(timeBreaker, function(index, value) {
                     '<div class="scroll">'
                    $('#break-time').append(
                        '<tr>' +
                        '<input type="hidden" id="id" name="id[]" value="' + value.id + '"/>' +
                        '<td>' +
                        '<div class="form-group">' +
                        '<label>Break In Time</label>' +
                        '<input type="datetime-local" class="form-control form-control-sm breakin" id="breakin" name="breakin[]" value="' + value.breakin + '">' +
                        '</div>' +
                        '</td>' +
                        '<td>' +
                        '<div class="form-group">' +
                        '<label>Break off Time</label>' +
                        '<input type="datetime-local" class="form-control form-control-sm" id="breakout" name="breakout[]" value="' + value.breakout + '">' +
                        '</div>' +
                        '</td>' +
                        '<td>' +
                        '<div class="form-group">' +
                        '<label>Total Break Times</label>' +
                        '<input type="text" class="form-control form-control-sm" id="total_hours" name="total_hours" readonly value="' + value.total_hours + '">' +
                        '</div>' +
                        '</td>'
                    );
                });
   
                // $(document).ready(function(){
                //     $('#breakin').keyup(function(){
                //         $.each(timeBreaker, function(index, value) {
                //             var breakin = $('#breakin').val();
                //             var breakout = $('#breakout').val();
                //           var total_time = breakin + breakout;
                           
                //           $('#total_hours').val(total_time);
                        
                            
                        
                //         });
                //     });
                // });
                $('#viewBreakTimeModal').modal('toggle');
            } else {
                $('#break-time').append('<div  style="text-align:center;"><p>Break time not found</p></div>');
                $('#viewBreakTimeModal').modal('toggle');
            };

        });
    }
    
                 
  
    $('#EditBreakTime').submit(function(e) {
        e.preventDefault();

        var formData = $(document).find("form#EditBreakTime").serializeArray();   
        let id = $('#viewBreakTimeModal').find('#id').val(); 
        var url = "{{url('time-breaker')}}" + "/" + id; 
        $.ajax({
            url: "{{url('time-breaker')}}" + "/" + id,
            type: "PUT",
            data:formData,
            success: function(response) {
                $('#viewBreakTimeModal').modal('toggle');
                alert(response);
            }
        })
    });
    
$(function () {

    var admin_datatable = $('.data-datatable').DataTable({
        dom: 'lBfrtip',
        // 'scrollX': true,
        "autoWidth": true,
        searchHighlight: true,
        
  

        buttons: [
            {
                extend: 'csv',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'colvis',
            },

        ],
            search: {
     regex: false,
     smart: false
  }

    });
        $('.emp-datatable').DataTable();
    });
</script>


@endpush