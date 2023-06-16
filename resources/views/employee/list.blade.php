@extends('layouts.master')
@section('title', 'All Employees')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}"/>
@stop
@section('content')

@include('layouts.alert_message')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>All Employees</h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{url('employee/create')}}">Add Employee</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="admin-datatable table table-hover" style="width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>Options</th>
                                <th>Employee No</th>
                                <th>Employee</th>
                                <th>Jobe Type</th>
                                <th>Job Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Options</th>
                                <th>Employee No</th>
                                <th>Employee</th>
                                <th>Jobe Type</th>
                                <th>Job Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                                <td>
                                    <x-options-buttons>
                                        <x-slot name="buttons">
                                            <li><a href="{{url('employee/'.$employee->id)}}">View</a></li>
                                            <li><a href="{{url('employee/'.$employee->id.'/edit')}}">Edit</a></li>
                                           
                                           {{-- <li>
                                                <a href="{{url('employee/'.$employee->id)}}" onclick="event.preventDefault();
                                                    document.getElementById('delete').submit();">Delete</a>
                                                <form id="delete" action="{{url('employee/'.$employee->id)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            </li>--}}
                                        </x-slot>
                                    </x-options-buttons>
                                </td>
                                <td>{{$employee->employee_no}}</td>
                                <td>{{$employee->first_name.' '.$employee->middle_name.' '.$employee->family_name}}</td>
                                <td>{{$employee->job_status}}</td>
          
                                

                                <td>
                                @if ($employee->employee_status == "X-Employee")
                                    <span class="badge badge-Blue" style="background-color:Blue; color:white;">X-Employee</span>
                                    
                                    @elseif ($employee->employee_status == "Terminated")
                                    <span class="badge badge-Red" style="background-color:Red;color:white;">Terminated</span>
                                    
                                    @elseif ($employee->employee_status == "Internee" )
                                    <span class="badge badge-Yellow" style="background-color:Yellow;">Internee </span>
                                
                                    @elseif ($employee->employee_status == "Probation" )
                                    <span class="badge badge-Orange" style="background-color:Orange;color:white;">Probation </span>
                              
                                    @elseif ($employee->employee_status == "Permanent" )
                                    <span class="badge badge-Green" style="background-color:Green;color:white;">Permanent </span>
                                       @elseif ($employee->employee_status == "Internship" )
                                    <span class="badge badge-success">Internship</span>
                                    @else
                                    <span class="badge badge-success">not define</span>
                             @endif
                                
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
