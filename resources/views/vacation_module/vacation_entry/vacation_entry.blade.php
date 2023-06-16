@extends('layouts.master')
@section('title', 'Vacation Entry')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.css')}}"/>
@stop

@section('content')
@include('layouts.alert_message')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Add Vacation Entry</h2>
                <ul class="header-dropdown">
                    {{-- <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                            <li><a href="{{url('user')}}">Task Module</a></li>
                        </ul>
                    </li> --}}
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <form method="POST" action="{{ url('vacation_entry') }}">
                    @csrf
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Ref No</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" name="ref_no">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Date(G)</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" name="date_g">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Date(H)</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" name="date_hijri">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Employee Code</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" name="employee_code">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Vacation Type</label>
                      <div class="col-sm-9">
                        {{-- <input type="text" class="form-control" name="blood"> --}}
                        <select class="form-control" name="vacation_type">
                          @foreach ($vacation_entry as $vacation_entries)
                          <option value="{{ $vacation_entries->name }}">{{ $vacation_entries->name }}</option>
                            
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Total Vacation Days</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" name="vacation_days">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Vacation Salary Calculate Without Vacation</label>
                      <div class="col-sm-9 mt-5">
                        <input id="masterCheckbox1" type="checkbox" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label lab="input01" class="col-sm-3 col-form-label">Total Vacation Starting Date(G)</label>
                      <div class="col-sm-9">
                        <input type="date" id="input01" class="form-control" name="vacation_starting_days">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label lab="input02"  class="col-sm-3 col-form-label">Approved Days</label>
                      <div class="col-sm-9">
                        <input type="number" id="input02" class="form-control" name="approved_days">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label lab="input03"  class="col-sm-3 col-form-label">Vacation Starting Days(H)</label>
                      <div class="col-sm-9">
                        <input type="date"  id="input03" class="form-control" name="vacation_starting_days_h">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label lab="input04"  class="col-sm-3 col-form-label">Vacation End Days(G)</label>
                      <div class="col-sm-9">
                        <input type="date" id="input04" class="form-control" name="vacation_end_days">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label lab="input05"   class="col-sm-3 col-form-label">Number of Days Requested</label>
                      <div class="col-sm-9">
                        <input type="number" id="input05" class="form-control" name="days_request">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label  lab="input06"  class="col-sm-3 col-form-label">Vacation End Days(H)</label>
                      <div class="col-sm-9">
                        <input id="input06" type="date" class="form-control" name="vacation_end_days_h">
                      </div>
                    </div>
                  </div>

                  <script>
                    // Get references to the checkbox and input fields
const masterCheckbox1 = document.querySelector('#masterCheckbox1');
const inputLabels1 = document.querySelectorAll('label[lab]');

// Add an event listener to the checkbox
masterCheckbox1.addEventListener('change', () => {
  // Loop through the input labels
  for (let i = 0; i < inputLabels1.length; i++) {
    const inputId1 = inputLabels1[i].getAttribute('lab');
    const inputField1 = document.getElementById(inputId1);
    
    // If the checkbox is checked, disable the input field
    if (masterCheckbox1.checked) {
      inputField1.disabled = true;
    } else {
      // Otherwise, enable the input field
      inputField1.disabled = false;
    }
  }
});

                  </script>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Days Consumed</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" name="days_consumed">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Last Vacation Days</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" name="last_vacation_days">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Balance Days</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" name="balance_days">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Requested By</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="req_by">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Requested Date</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" name="req_date">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Date(H)</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" name="req_date_h">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Remark</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="remark_1">
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="col-sm-3 col-form-label">Approved ?</label>
                      <div class="col-sm-9 mt-2">
                        <input type="checkbox" id="masterCheckbox" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="input1" class="col-sm-3 col-form-label">Approved By</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="input1" name="approved_by">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="input2" class="col-sm-3 col-form-label">Date</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="input2" name="date"></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="input3" class="col-sm-3 col-form-label">Date(H)</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="input3" name="date_h">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="input4" class="col-sm-3 col-form-label">Remark</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="input4" name="remark"></textarea>
                      </div>
                    </div>

                    <script>
                      // Get references to the checkbox and input fields
const masterCheckbox = document.querySelector('#masterCheckbox');
const inputLabels = document.querySelectorAll('label[for]');

// Add an event listener to the checkbox
masterCheckbox.addEventListener('change', () => {
  // Loop through the input labels
  for (let i = 0; i < inputLabels.length; i++) {
    const inputId = inputLabels[i].getAttribute('for');
    const inputField = document.getElementById(inputId);
    
    // If the checkbox is checked, disable the input field
    if (masterCheckbox.checked) {
      inputField.disabled = true;
    } else {
      // Otherwise, enable the input field
      inputField.disabled = false;
    }
  }
});

                    </script>


                    
              
                  </div>
                  <div class="form-group row">
                    {{-- <label for="inputName" class="col-sm-4 col-form-label">Submit:</label> --}}
                    <div class="col-sm-12">
                      <input type="submit" class="btn btn-success" value="Submit Medical"  >
              
                    </div>
                  </div>
                </form>
              
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
{{------------------- All Task Modules ----------------}}
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>All Vacation Entry</h2>
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
                            <th>Ref No</th>
                            <th>Date Gregorian</th>
                            <th>Date Hijri</th>
                            <th>Employee Code</th>
                            <th>Name</th>
                            <th>Vacation Type</th>
                            <th>Vacation Days</th>
                            <th>Vacation Starting Days</th>
                            <th>Approved Days</th>
                            <th>Vacation Starting Days Hijri</th>
                            <th>Vacation End Days</th>
                            <th>Days Request</th>
                            <th>Vacation End Days Hijri</th>
                            <th>Days Consumed</th>
                            <th>Last Vacation Days</th>
                            <th>Balance Days</th>
                            <th>Requested By</th>
                            <th>Request Date</th>
                            <th>Request Date Hijri</th>
                            <th>Remark 1</th>
                            <th>Approved By</th>
                            <th>Approval Date</th>
                            <th>Approval Date Hijri</th>
                            <th>Remark</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Ref No</th>
                            <th>Date Gregorian</th>
                            <th>Date Hijri</th>
                            <th>Employee Code</th>
                            <th>Name</th>
                            <th>Vacation Type</th>
                            <th>Vacation Days</th>
                            <th>Vacation Starting Days</th>
                            <th>Approved Days</th>
                            <th>Vacation Starting Days Hijri</th>
                            <th>Vacation End Days</th>
                            <th>Days Request</th>
                            <th>Vacation End Days Hijri</th>
                            <th>Days Consumed</th>
                            <th>Last Vacation Days</th>
                            <th>Balance Days</th>
                            <th>Requested By</th>
                            <th>Request Date</th>
                            <th>Request Date Hijri</th>
                            <th>Remark 1</th>
                            <th>Approved By</th>
                            <th>Approval Date</th>
                            <th>Approval Date Hijri</th>
                            <th>Remark</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                          @foreach ($vacation_ent as $entry)
                          <tr>
                              <td>{{ $entry->ref_no }}</td>
                              <td>{{ $entry->date_g }}</td>
                              <td>{{ $entry->date_hijri }}</td>
                              <td>{{ $entry->employee_code }}</td>
                              <td>{{ $entry->name }}</td>
                              <td>{{ $entry->vacation_type }}</td>
                              <td>{{ $entry->vacation_days }}</td>
                              <td>{{ $entry->vacation_starting_days }}</td>
                              <td>{{ $entry->approved_days }}</td>
                              <td>{{ $entry->vacation_starting_days_h }}</td>
                              <td>{{ $entry->vacation_end_days }}</td>
                              <td>{{ $entry->days_request }}</td>
                              <td>{{ $entry->vacation_end_days_h }}</td>
                              <td>{{ $entry->days_consumed }}</td>
                              <td>{{ $entry->last_vacation_days }}</td>
                              <td>{{ $entry->balance_days }}</td>
                              <td>{{ $entry->req_by }}</td>
                              <td>{{ $entry->req_date }}</td>
                              <td>{{ $entry->req_date_h }}</td>
                              <td>{{ $entry->remark_1 }}</td>
                              <td>{{ $entry->approved_by }}</td>
                              <td>{{ $entry->date }}</td>
                              <td>{{ $entry->date_h }}</td>
                              <td>{{ $entry->remark }}</td>
                              <td>
                                        
                                <a href="" class="ml-2"><i class="fa fa-edit"></i></a><br><br>
                               
          
                              
                                  <a href="{{ url('vacation_entry/delete',$entry->id) }}" class="ml-2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                 
                              </td>
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
    function editBranches(id){
        $.get('/branches/'+id, function(branches){
            $('#id').val(branches.id);
            $('#name').val(branches.name);
            $('.arabic_name').val(branches.arabic_name);

            $('#updateBranches').modal('toggle');
        });
    }

    $('#branchesEdit').submit(function(e){
        e.preventDefault();

        let id = $('#id').val();
        let name = $('#name').val();
        let arabic_name = $('.arabic_name').val();

        let _token = $('input[name=_token]').val();

        $.ajax({
            url: "{{url('branches')}}"+"/"+id,
            type: "PUT",
            data: {
                id:id,
                name:name,
                arabic_name:arabic_name,
                _token:_token,
            },
            success:function(response){
                $('#mid1' + response.id +' td:nth-child(1)').text(response.name).text(response.arabic_name);
                $('.name').text(response.name);
                $('.arabic_name').text(response.arabic_name);
                $('#updateBranches').modal('toggle');
                alert('Record has been updated!');
                // $('#companyEdit')[0].reset();
            }
        })
    });


$(".delete").click('.remove',function(){

var dataId = $(this).attr("data-id");
var del = this;
if(confirm("Do you want to delete this record?")){
    $.ajax({
    url:dataId,
    type:'DELETE',
    data:{
    _token : $("input[name=_token]").val()
    },
    success:function(response){
        $(del).closest( "tr" ).remove();
        alert(response.message);
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


