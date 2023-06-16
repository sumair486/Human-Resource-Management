@extends('layouts.master')
@section('title', 'Payable')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}"/>
@stop
@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>All Payable Expance checj</h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{route('add.payble')}}">Add Payslip</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="admin-datatable table table-hover" style="width:100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>Option</th>
                                <th>Things</th>
                                <th>Price</th>
                                <th>Plane Price</th>
                                <th>Payment Mode</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Option</th>
                                <th>Things</th>
                                <th>Price</th>
                                <th>Plane Price</th>
                                <th>Paid By</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            @foreach ($payable as $payable )

                            <tr>
                                <td>
                                    <x-options-buttons>
                                        <x-slot name="buttons">
                                            <li><a href="{{route('edit.payable',$payable->id)}}">Edit</a></li>
                                            <li><a href="{{route('delete.payable',$payable->id)}}">Delete</a></li>

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
                                <th>{{$payable->things}}</th>
                                <th>{{$payable->price}}</th>
                                <th>{{$payable->plane_price}}</th>
                                <th>{{$payable->paid_by}}</th>
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
