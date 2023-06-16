@extends('layouts.master')
@section('title', 'Department')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}"/>
@stop
@section('content')

@include('layouts.alert_message')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Add Department</h2>
                <ul class="header-dropdown">
                    {{-- <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                            <li><a href="{{url('department')}}">All Departments</a></li>
                        </ul>
                    </li> --}}
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <form action="{{url('department')}}" method="post">
                    @csrf
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label>Department Name</label>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control form-control-sm" value="{{old('name')}}">
                            @error('name')
                                <label class="error">{{$errors->first('name')}}</label>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                            <table>
                                <tr>
                                    <td>Designation Title</td>
                                </tr>
                                <tbody class="new-row">
                                <tr>
                                    <td style="padding-right:10px;">
                                        <input type="text" name="title[]" class="form-control"/></td>
                                    <td>
                                        <button type="button" class="delete-row btn btn-neutral"><i class="fas fa-times text-danger"></i></button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <button type="button" id="add" class="mt-3 mb-5 btn btn-sm btn-primary">+Add</button>
                        </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>All Departments</h2>
                <ul class="header-dropdown">
                    {{-- <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                            <li><a href="{{url('')}}">Add</a></li>
                        </ul>
                    </li> --}}
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="admin-datatable table table-hover" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <tr>
                                    <th>Options</th>
                                    <th>Department Name</th>
                                </tr>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Options</th>
                                <th>Department Name</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($departments as $department)
                            <tr>
                                <td>
                                    <x-options-buttons>
                                        <x-slot name="buttons">
                                            <li><a href="{{url('department/'.$department->id.'/edit')}}">Edit</a></li>
                                            <li>
                                                <a href="{{url('department/'.$department->id)}}" onclick="event.preventDefault();
                                                    document.getElementById('delete').submit();">Delete</a>
                                                <form id="delete" action="{{url('department/'.$department->id)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            </li>
                                        </x-slot>
                                    </x-options-buttons>
                                </td>
                                <td>{{$department->name}}</td>
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

@push('after-scripts')
<script>
$('#add').on('click', function(){
    var tr = '<tr>'+
            '<td style="padding-right:10px;"><input type="text" name="title[]" class="form-control"/></td>'+
            '<td><button type="button" class="delete-row btn btn-neutral"><i class="fas fa-times text-danger"></i></button></td>'+
            '</tr>';
        $('.new-row').append(tr);
});

$('.new-row').on('click', '.delete-row', function(){
     $(this).parent().parent().remove();
});
</script>
@endpush

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


