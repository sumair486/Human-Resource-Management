@extends('layouts.master')
@section('title', 'Clients')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}"/>
@stop
@section('content')

<div style="background-color: white" class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Add Loan</h2>
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


            {{-- <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
            </div> --}}

            <div class="container">
                <form method="POST" action="{{ url('loan') }}">
                    @csrf
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group row">
                        <label for="input1" class="col-sm-4 col-form-label">Ref No</label>
                        <div class="col-sm-8">
                          <input type="number" name="ref" class="form-control" id="input1">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group row">
                        <label for="input2" class="col-sm-4 col-form-label">Date(G):</label>
                        <div class="col-sm-8">
                          <input type="date" name="date" class="form-control" id="input2">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                          <label for="input1" class="col-sm-4 col-form-label">Hijri</label>
                          <div class="col-sm-8">
                            <input type="date" name="hijri" class="form-control" id="input1">
                          </div>
                        </div>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="input3" class="col-sm-2 col-form-label">Emp Code:</label>
                        <div class="col-sm-10">
                          <select name="emp_code">
                            @foreach ($emp as $employee)
                            <option value={{ $employee->employee_no}}>{{ $employee->employee_no}}</option>
                              
                            @endforeach
                          </select>
                        </div>  
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        {{-- <label for="input4" class="col-sm-2 col-form-label">Input 4:</label> --}}
                        <div class="col-sm-12">
                          <select name="name">
                            @foreach ($emp as $employee)
                            <option value="{{ $employee->first_name}} {{ $employee->middle_name}} {{ $employee->family_name}}">{{ $employee->first_name}} {{ $employee->middle_name}} {{ $employee->family_name}} </option>
                              
                            @endforeach
                          </select>
                          {{-- <input type="text" placeholder="name" class="form-control" id="input4"> --}}
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Type of Loan:</label>
                        <div class="col-sm-10">

                          <select name="type_loan" style="width:300px" >
                            @foreach ($loan_type as $loan_types)
                            {{-- <option value="{{ $loan_types->name }}">{{ $loan_types->name }}</option> --}}
                            <option value="{{ $loan_types->name }}">{{ $loan_types->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>

                  </div>

                  



                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="input3" class="col-sm-6 col-form-label">Loan Amount:</label>
                        <div class="col-sm-6">
                          <input type="number" class="form-control" name="amount">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="input4" class="col-sm-6 col-form-label">Installment Period(Month):</label>
                        <div class="col-sm-6">
                          <input type="number"  name="installment" class="form-control" id="input4">
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="input3" class="col-sm-6 col-form-label">Monthly Deb:</label>
                        <div class="col-sm-6">
                          <input type="number" class="form-control" name="monthly">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="input4" class="col-sm-6 col-form-label">Ded Starting Date:</label>
                        <div class="col-sm-6">
                          <input type="date"  name="ded_starting" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="input3" class="col-sm-6 col-form-label">No of Inst. Unpaid:</label>
                        <div class="col-sm-6">
                          <input type="number" class="form-control" name="unpaid">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="input4" class="col-sm-6 col-form-label"> Balance Amount:</label>
                        <div class="col-sm-6">
                          <input type="number"  name="balance_amount" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group row">
                        <label for="input1" class="col-sm-6 col-form-label">Requested By</label>
                        <div class="col-sm-6">
                          <input type="text" name="req_by" class="form-control" id="input1">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group row">
                        <label for="input2" class="col-sm-12 col-form-label">Approved ?</label>

                      </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <input type="checkbox"  id="myCheckbox" class="col-sm-2 col-form-label">
                          <label for="input1" class="col-sm-4 col-form-label">By</label>
                          <div class="col-sm-6">
                            <input type="text" id="myInput" name="approved" class="form-control" id="input1">
                          </div>
                        </div>
                      </div>
                  </div>

<script>
                    // Get references to the checkbox and input field
const checkbox = document.querySelector('#myCheckbox');
const inputField = document.querySelector('#myInput');

// Add an event listener to the checkbox
checkbox.addEventListener('change', () => {
  // If the checkbox is checked, disable the input field
  if (checkbox.checked) {
    inputField.disabled = true;
  } else {
    // Otherwise, enable the input field
    inputField.disabled = false;
  }
});

</script>


                  <div class="row mt-3">
                    <div class="col-md-3">
                      <div class="form-group row">
                        <label for="input1" class="col-sm-5 col-form-label">Request Date</label>
                        <div class="col-sm-7">
                          <input type="date" name="req_date" class="form-control" id="input1">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group row">
                        <label for="input2" class="col-sm-5 col-form-label">Date(H):</label>
                        <div class="col-sm-7">
                          <input type="date" name="date_h" class="form-control" id="input2">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group row">
                          <label for="input1" class="col-sm-5 col-form-label">Date</label>
                          <div class="col-sm-7">
                            <input type="date" name="date_req" class="form-control" id="input1">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group row">
                          <label for="input1" class="col-sm-5 col-form-label">Date(H)</label>
                          <div class="col-sm-7">
                            <input type="date" name="date_h1" class="form-control" id="input1">
                          </div>
                        </div>
                      </div>
                  </div>

                  


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="input3" class="col-sm-6 col-form-label">Remarks:</label>
                        <div class="col-sm-6">
                          <input type="number" class="form-control" name="remark">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="input4" class="col-sm-6 col-form-label">Remarks:</label>
                        <div class="col-sm-6">
                          <input type="number"  name="remark_2" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-md-12">
                        <div class="form-group row">
                          {{-- <label for="input4" class="col-sm-6 col-form-label">Remarks:</label> --}}
                          <div class="col-sm-12">
                            <input class="btn btn-success" type="submit">
                          </div>
                        </div>
                      </div>

                  </div>
 
                </form>
              </div>
              

            <div class="body">
                {{-- <div class="table-responsive"> --}}

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