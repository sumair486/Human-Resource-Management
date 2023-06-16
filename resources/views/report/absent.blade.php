@extends('layouts.master')
@section('title', 'Employee Absent')
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
                <h2>All Employee Absent</h2>
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
                         
                            
                                <th>Entry Date</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Days</th>


                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <!--<th>Options</th>-->
                                <th>ID</th>
                                <th>Emoloyee Code</th>

                                <th>Name</th>
                                <th>Entry Date</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Days</th>



                                
                                {{-- <th>Status</th> --}}
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($employee_absent as $key=>$employee_absents)
                            <tr id="element-list">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $employee_absents->employee_no }}</td>
                                <td>{{ $employee_absents->first_name }} {{ $employee_absents->middle_name }} {{ $employee_absents->family_name }}</td>
                                <td>{{ $employee_absents->entry_date }}</td>
                                <td>{{ $employee_absents->start_date }}</td>
                                <td>{{ $employee_absents->end_date }}</td>
                                <td>{{ $employee_absents->total_days }}</td>

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


