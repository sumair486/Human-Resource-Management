@extends('layouts.master')
@section('title', 'Employee Status')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.css')}}"/>
@stop

@section('content')
@include('layouts.alert_message')


{{------------------- All Task Modules ----------------}}
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>All Employee Status</h2>
                <ul class="header-dropdown">
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table id="dtHorizontalExample" class="admin-datatable table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <!--<th>Options</th>-->
                                <th>ID</th>
                                <th>Emoloyee #</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Family Name</th>
                                <th>First Name(Arabic)</th>
                                <th>Middle Name(Arabic)</th>
                                <th>Family Name(Arabic)</th>
                                <th>Grand Name(Arabic)</th>
                                

                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <!--<th>Options</th>-->
                                <th>ID</th>
                                <th>Emoloyee #</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Family Name</th>
                                <th>First Name(Arabic)</th>
                                <th>Middle Name(Arabic)</th>
                                <th>Family Name(Arabic)</th>
                                <th>Grand Name(Arabic)</th>
                                {{-- <th>Status</th> --}}
                            </tr>
                        </tfoot>
                        <tbody>
                                @foreach ($employee_status as $key=>$employee)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $employee->employee_no }}</td>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->middle_name }}</td>
                                        <td>{{ $employee->family_name }}</td>
                                        <td>{{ $employee->first_name_arb }}</td>
                                        <td>{{ $employee->middle_name_arb }}</td>
                                        <td>{{ $employee->family_name_arb }}</td>
                                        <td>{{ $employee->grand_name_arb }}</td>
                                        {{-- <td>{{ $employee->status }}</td> --}}

                                       
   
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

@endpush

@section('page-script')
<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>
<script src="{{asset('assets/urdutextbox.js')}}"></script>


  
  
  {{-- <script>
    
    $('#companyEdit').on('shown.bs.modal', function (e) {
      // var id_of_element=$(e).attr('id');
        // console.log(id_of_element);
        // console.log('textkdn');
        MakeTextBoxUrduEnabled(txtBox);

  })
    
      </script> --}}

@stop


