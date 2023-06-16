@extends('layouts.master')
@section('title', 'Clients')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}"/>
@stop
@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>All Clients</h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{url('client/create')}}">Add Client</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                {{-- <div class="table-responsive"> --}}
                    <table class="admin-datatable table table-hover" style="width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th>Options</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Country</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Options</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Country</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>
                                        <x-options-buttons>
                                            <x-slot name="buttons">
                                                <li><a href="{{url('client-invoice/create/'.$client->id)}}">Add Invoice</a></li>
                                                <li><a href="{{url('client/'.$client->id.'/edit')}}">Edit</a></li>
                                                <li>
                                                    <a href="{{url('client/'.$client->id)}}" onclick="event.preventDefault();
                                                        document.getElementById('delete').submit();">Delete</a>
                                                    <form id="delete" action="{{url('client/'.$client->id)}}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                    </form>
                                                </li>
                                            </x-slot>
                                        </x-options-buttons>
                                    </td>
                                <td>{{$client->full_name}}</td>
                                <td>{{$client->gender}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->country}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{-- </div> --}}
                </div>
@stop

@section('page=script')
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
