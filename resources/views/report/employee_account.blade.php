@extends('layouts.master')
@section('title', 'Account Report')
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
                <h2>All Account Report</h2>
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
                                <th>Employee Name</th>
                                <th>Bank Name</th>
                                <th>Account Number</th>
                                <th>Branch Name</th>
                                <th>Account Code</th>
                                <th>Bank Code</th>
                                <th>Notes</th>
                                <th>Address</th>
                                <th>Summary</th>
                                <th>Reason</th>
                                <!-- Search input field -->

<!-- Elements to filter -->
{{-- <ul >
  <li>Element 1</li>
  <li>Element 2</li>
  <li>Element 3</li>
  <li>Element 4</li>
</ul> --}}

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Employee Name</th>
                                <th>Bank Name</th>
                                <th>Account Number</th>
                                <th>Branch Name</th>
                                <th>Account Code</th>
                                <th>Bank Code</th>
                                <th>Notes</th>
                                <th>Address</th>
                                <th>Summary</th>
                                <th>Reason</th>
                            </tr>
                        </tfoot>
                        <tbody >
                            @foreach($account as $employee)
            <tr id="element-list">
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->bank_name }}</td>
                <td>{{ $employee->account_no }}</td>
                <td>{{ $employee->branch_name }}</td>
                <td>{{ $employee->account_code }}</td>
                <td>{{ $employee->bank_code }}</td>
                <td>{{ $employee->notes_bank }}</td>
                <td>{{ $employee->address }}</td>
                <td>{{ $employee->summary }}</td>
                <td>{{ $employee->reason }}</td>
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
<script>

    window.onload = myOnload;

    function myOnload(evt){
      MakeTextBoxUrduEnabled(txtBox1);//enable arabic in html text box
      MakeTextBoxUrduEnabled(txtBox);//enable arabic in html text box

    //   MakeTextBoxUrduEnabled(txtBoxes);//enable arabic in html text box
    }
</script>

  
  
 

@stop


