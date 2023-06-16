@extends('layouts.master')
@section('title', 'Employee Allowance')
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
                <h2>All Employee Allowance</h2>
                <ul class="header-dropdown">
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" id="search-input" class="form-control" placeholder="Search">
    
                        </div>
                    </div>
                    <table id="dtHorizontalExample" class="admin-datatable table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <!--<th>Options</th>-->
                                <th>ID</th>
                                 <th>Emoloyee Code</th>
                                <th>Name</th>
                                <th>Job Title</th>
                                <th>Nationality</th>
                                <th>Sponsor</th>
                                <th>Category</th>
                                <th>Basic Salary</th>
                                <th>Housing</th>
                                <th>Mobile Allowance</th>
                                <th>Badal</th>
                                <th>Transport</th>
                                <th>Other Allowance</th>
                                <th>Gosi</th>
                                <th>Eos</th>
                                <th>Vacation</th>
                                <th>Ticket</th>
                                <th>Housing Allowance</th>
                                <th>Family</th>


                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <!--<th>Options</th>-->
                                <th>ID</th>
                                <th>Emoloyee Code</th>

                                <th>Name</th>
                                <th>Job Title</th>
                                <th>Nationality</th>
                                <th>Sponsor</th>
                                <th>Category</th>
                                <th>Basic Salary</th>
                                <th>Housing</th>
                                <th>Mobile Allowance</th>
                                <th>Badal</th>
                                <th>Transport</th>
                                <th>Other Allowance</th>
                                <th>Gosi</th>
                                <th>Eos</th>
                                <th>Vacation</th>
                                <th>Ticket</th>
                                <th>Housing Allowance</th>
                                <th>Family</th>
                                {{-- <th>Status</th> --}}
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($employee_allownace as $key=>$employee_allownaces)
                            <tr id="element-list">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $employee_allownaces->employee_no }}</td>
                                <td>{{ $employee_allownaces->first_name }}</td>
                                <td>{{ $employee_allownaces->job_title }}</td>
                                <td>{{ $employee_allownaces->nationality }}</td>
                                 <td>{{ $employee_allownaces->sponsor }}</td>
                                <td>{{ $employee_allownaces->category }}</td>
                                <td>{{ $employee_allownaces->salary }}</td>
                                <td>{{ $employee_allownaces->housing }}</td>
                                <td>{{ $employee_allownaces->mobile }}</td>
                                <td>{{ $employee_allownaces->badal }}</td>
                                <td>{{ $employee_allownaces->transport }}</td>
                                <td>{{ $employee_allownaces->other }}</td>
                                <td>{{ $employee_allownaces->gosi }}</td>
                                <td>{{ $employee_allownaces->eos }}</td>
                                <td>{{ $employee_allownaces->vacation }}</td>
                                <td>{{ $employee_allownaces->ticket }}</td>
                                <td>{{ $employee_allownaces->housing_allowance }}</td>
                                <td>{{ $employee_allownaces->family }}</td>
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
    $(document).ready(function() {
  // Search input keyup event
  $('#search-input').keyup(function() {
    filterElements();
  });
  
  // Function to filter elements based on search input
  function filterElements() {
    var searchQuery = $('#search-input').val().toLowerCase();
    
    $('#element-list').each(function() {
      var elementText = $(this).text().toLowerCase();
      
      // Show/hide elements based on the search query
      if (elementText.includes(searchQuery)) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  }
});

</script>
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


