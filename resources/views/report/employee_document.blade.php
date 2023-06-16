@extends('layouts.master')
@section('title', 'Employee Documents')
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
                <h2>All Employee Documents</h2>
                <ul class="header-dropdown">
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
             
                <div class="row">
                    <div class="col-md-12">
                        <ul style="justify-content: space-evenly;" class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">Passport</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#tab2" role="tab">Iqama/Id</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#tab3" role="tab">Work Permit</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#tab4" role="tab">Driving License</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab5" role="tab">Insurance</a>
                              </li>

                          </ul>

                          <div class="tab-content">
                            <div class="tab-pane active" id="tab1" role="tabpanel">
                                {{-- start  --}}
                                <div class="table-responsive-sm">
                                  <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" id="search-input1" class="form-control" placeholder="Search">
                    
                                    </div>
                                </div>
                                    <table class="table">
                                         <thead>
                                            <tr>
                                                <th>S.No</th>
                                              <th>Employee Code</th>
                                              <th>Name</th>
                                              <th>No</th>
                                              <th>Issue Date </th>
                                              <th>Expiry Date </th>

                                            </tr>
                                          </thead>
                                          @foreach ($employee_document as $key=>$employee_documents )
                                              <tr id="element-list1">
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $employee_documents->employee_no }}</td>
                                                <td>{{ $employee_documents->first_name }} {{ $employee_documents->middle_name }} {{ $employee_documents->family_name }}</td>
                                                <td>{{ $employee_documents->passport }}</td>
                                                <td>{{ $employee_documents->passport_issuedate }}</td>
                                                <td>{{ $employee_documents->passport_expdate }}</td>

                                              </tr>
                                          @endforeach
                                          <tbody>
                                            
                                            
                                          </tbody>
                                    </table>
                                  </div>
                                {{-- end --}}
                            </div>
                            <div class="tab-pane " id="tab2" role="tabpanel">
                                                               {{-- start  --}}
                                                               <div class="table-responsive-sm">
                                                                <div class="row">
                                                                  <div class="col-md-3">
                                                                      <input type="text" id="search-input2" class="form-control" placeholder="Search">
                                                  
                                                                  </div>
                                                              </div>
                                                                <table class="table">
                                                                     <thead>
                                                                        <tr >
                                                                            <th>S.No</th>
                                                                          <th>Employee Code</th>
                                                                          <th>Name</th>
                                                                          <th>No</th>
                                                                          <th>Issue Date </th>
                                                                          <th>Expiry Date </th>
                            
                                                                        </tr>
                                                                      </thead>
                                                                      @foreach ($employee_document as $key=>$employee_documents )
                                                                          <tr id="element-list2">
                                                                            <td>{{ $key+1 }}</td>
                                                                            <td>{{ $employee_documents->employee_no }}</td>
                                                                            <td>{{ $employee_documents->first_name }} {{ $employee_documents->middle_name }} {{ $employee_documents->family_name }}</td>
                                                                            <td>{{ $employee_documents->Iqama }}</td>
                                                                            <td>{{ $employee_documents->Iqama_issuedate }}</td>
                                                                            <td>{{ $employee_documents->Iqama_expdate }}</td>
                            
                                                                          </tr>
                                                                      @endforeach
                                                                      <tbody>
                                                                        
                                                                        
                                                                      </tbody>
                                                                </table>
                                                              </div>
                                                            {{-- end --}}
                            </div>
                            <div class="tab-pane " id="tab3" role="tabpanel">
                                                                {{-- start  --}}
                                                                <div class="table-responsive-sm">
                                                                  <div class="row">
                                                                    <div class="col-md-3">
                                                                        <input type="text" id="search-input3" class="form-control" placeholder="Search">
                                                    
                                                                    </div>
                                                                </div>
                                                                    <table class="table">
                                                                         <thead>
                                                                            <tr>
                                                                                <th>S.No</th>
                                                                              <th>Employee Code</th>
                                                                              <th>Name</th>
                                                                              <th>No</th>
                                                                              <th>Issue Date </th>
                                                                              <th>Expiry Date </th>
                                
                                                                            </tr>
                                                                          </thead>
                                                                          @foreach ($employee_document as $key=>$employee_documents )
                                                                              <tr id="element-list3">
                                                                                <td>{{ $key+1 }}</td>
                                                                                <td>{{ $employee_documents->employee_no }}</td>
                                                                                <td>{{ $employee_documents->first_name }} {{ $employee_documents->middle_name }} {{ $employee_documents->family_name }}</td>
                                                                                <td>{{ $employee_documents->work }}</td>
                                                                                <td>{{ $employee_documents->work_issuedate }}</td>
                                                                                <td>{{ $employee_documents->work_expdate }}</td>
                                
                                                                              </tr>
                                                                          @endforeach
                                                                          <tbody>
                                                                            
                                                                            
                                                                          </tbody>
                                                                    </table>
                                                                  </div>
                                                                {{-- end --}}
                            </div>
                            <div class="tab-pane " id="tab4" role="tabpanel">
                                                               {{-- start  --}}
                                                               <div class="table-responsive-sm">
                                                                <div class="row">
                                                                  <div class="col-md-4">
                                                                      <input type="text" id="search-input2" class="form-control" placeholder="Search">
                                                  
                                                                  </div>
                                                              </div>
                                                                <table class="table">
                                                                     <thead>
                                                                        <tr>
                                                                            <th>S.No</th>
                                                                          <th>Employee Code</th>
                                                                          <th>Name</th>
                                                                          <th>No</th>
                                                                          <th>Issue Date </th>
                                                                          <th>Expiry Date </th>
                            
                                                                        </tr>
                                                                      </thead>
                                                                      @foreach ($employee_document as $key=>$employee_documents )
                                                                          <tr id="element-list4">
                                                                            <td>{{ $key+1 }}</td>
                                                                            <td>{{ $employee_documents->employee_no }}</td>
                                                                            <td>{{ $employee_documents->first_name }} {{ $employee_documents->middle_name }} {{ $employee_documents->family_name }}</td>
                                                                            <td>{{ $employee_documents->driving }}</td>
                                                                            <td>{{ $employee_documents->driving_issuedate }}</td>
                                                                            <td>{{ $employee_documents->driving_expdate }}</td>
                            
                                                                          </tr>
                                                                      @endforeach
                                                                      <tbody>
                                                                        
                                                                        
                                                                      </tbody>
                                                                </table>
                                                              </div>
                                                            {{-- end --}}
                            </div>

                            <div class="tab-pane " id="tab5" role="tabpanel">
                                                                {{-- start  --}}
                                                                <div class="table-responsive-sm">
                                                                  <div class="row">
                                                                    <div class="col-md-3">
                                                                        <input type="text" id="search-input5" class="form-control" placeholder="Search">
                                                    
                                                                    </div>
                                                                </div>
                                                                    <table class="table">
                                                                         <thead>
                                                                            <tr>
                                                                                <th>S.No</th>
                                                                              <th>Employee Code</th>
                                                                              <th>Name</th>
                                                                              <th>No</th>
                                                                              <th>Issue Date </th>
                                                                              <th>Expiry Date </th>
                                
                                                                            </tr>
                                                                          </thead>
                                                                          @foreach ($employee_document as $key=>$employee_documents )
                                                                              <tr id="element-list5">
                                                                                <td>{{ $key+1 }}</td>
                                                                                <td>{{ $employee_documents->employee_no }}</td>
                                                                                <td>{{ $employee_documents->first_name }} {{ $employee_documents->middle_name }} {{ $employee_documents->family_name }}</td>
                                                                                <td>{{ $employee_documents->vehicle }}</td>
                                                                                <td>{{ $employee_documents->vehicle_issuedate }}</td>
                                                                                <td>{{ $employee_documents->vehicle_expdate }}</td>
                                
                                                                              </tr>
                                                                          @endforeach
                                                                          <tbody>
                                                                            
                                                                            
                                                                          </tbody>
                                                                    </table>
                                                                  </div>
                                                                {{-- end --}}
                            </div>
                          </div>
                          


                    </div>
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
$('#search-input1').keyup(function() {
  filterElements();
});

// Function to filter elements based on search input
function filterElements() {
  var searchQuery = $('#search-input1').val().toLowerCase();
  
  $('#element-list1').each(function() {
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

<script>
  $(document).ready(function() {
// Search input keyup event
$('#search-input2').keyup(function() {
  filterElements();
});

// Function to filter elements based on search input
function filterElements() {
  var searchQuery = $('#search-input2').val().toLowerCase();
  
  $('#element-list2').each(function() {
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

<script>
  $(document).ready(function() {
// Search input keyup event
$('#search-input3').keyup(function() {
  filterElements();
});

// Function to filter elements based on search input
function filterElements() {
  var searchQuery = $('#search-input3').val().toLowerCase();
  
  $('#element-list3').each(function() {
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

<script>
  $(document).ready(function() {
// Search input keyup event
$('#search-input4').keyup(function() {
  filterElements();
});

// Function to filter elements based on search input
function filterElements() {
  var searchQuery = $('#search-input4').val().toLowerCase();
  
  $('#element-list4').each(function() {
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

<script>
  $(document).ready(function() {
// Search input keyup event
$('#search-input5').keyup(function() {
  filterElements();
});

// Function to filter elements based on search input
function filterElements() {
  var searchQuery = $('#search-input5').val().toLowerCase();
  
  $('#element-list5').each(function() {
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


