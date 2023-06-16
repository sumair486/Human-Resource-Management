@extends('layouts.master')
@section('title', 'Careers')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}"/>
@stop
@section('content')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>All Careers</h2>
                <ul class="header-dropdown">
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
                                <th>Full Name</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Position</th>
                                <th>Experience</th>
                                <th>File</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Full Name</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Position</th>
                                <th>Experience</th>
                                <th>File</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($career as $key=>$item)
                            <tr>
                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->country }}</td>
                                <td>{{ $item->city }}</td>
                                <td>{{ $item->position }}</td>
                              	<td>{{ $item->experience }}</td>
                              	<td>{{ $item->file }}</td>
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

