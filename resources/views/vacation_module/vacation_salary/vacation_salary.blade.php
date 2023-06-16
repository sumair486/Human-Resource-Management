@extends('layouts.master')
@section('title', 'Vacation Salary')
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
                <h2>Add Vacation Salary</h2>
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
                    <form class="form" method="POST" action="{{ url('vacation_salary') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Ref No:</label>
                                <div class="col-sm-6">
                                  <input type="number" class="form-control" name="ref_no">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Date(G):</label>
                                <div class="col-sm-6">
                                  <input type="date"  class="form-control"  name="date" id="input4">
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Hijri:</label>
                                <div class="col-sm-6">
                                  <input type="date" class="form-control" name="hijri">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Ref Vacation No:</label>
                                <div class="col-sm-6">
                                  <input type="number"  class="form-control"  name="ref_vacation_no" id="input4">
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Employee Code:</label>
                                <div class="col-sm-6">
                                  <input type="number"  class="form-control"  name="emp_code" id="input4">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Name:</label>
                                <div class="col-sm-6">
                                  <input type="text"  class="form-control"  name="name" id="input4">
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Ref Vacation Date:</label>
                                <div class="col-sm-6">
                                  <input type="date"  class="form-control"  name="ref_vacation_date" id="input4">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Last Vacation/Join Date:</label>
                                <div class="col-sm-6">
                                  <input type="date"  class="form-control"  name="join_date" id="input4">
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="row">

                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Late Day of Work:</label>
                                <div class="col-sm-6">
                                  <input type="date"  class="form-control"  name="last_day" id="input4">
                                </div>
                              </div>
                            </div>

                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Vacation Start Day:</label>
                                <div class="col-sm-6">
                                  <input type="date" class="form-control" name="vacation_start">
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label for="input4" class="col-sm-6 col-form-label">No of Day Paid:</label>
                                  <div class="col-sm-6">
                                    <input type="date"  class="form-control"  name="paid_day" id="input4">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label for="input3" class="col-sm-6 col-form-label">Vacation End Date:</label>
                                  <div class="col-sm-6">
                                    <input type="date" class="form-control" name="vacation_end">
                                  </div>
                                </div>
                              </div>

                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">No of Days Unpaid:</label>
                                <div class="col-sm-6">
                                  <input type="number" class="form-control" name="unpaid_days">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Balance Vacation Days:</label>
                                <div class="col-sm-6">
                                  <input type="number"  class="form-control"  name="balance_days" id="input4">
                                </div>
                              </div>
                            </div>

                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Public Holidays :</label>
                                <div class="col-sm-6">
                                  <input type="number" class="form-control" name="public_holidays">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Total Consumed:</label>
                                <div class="col-sm-6">
                                  <input type="number"  class="form-control"  name="total_consumed" id="input4">
                                </div>
                              </div>
                            </div>

                          </div>



                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Total Leave Days:</label>
                                <div class="col-sm-6">
                                  <input type="number" class="form-control" name="total_leave_day">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Salary Upto(Due back fo duty):</label>
                                <div class="col-sm-6">
                                  <input type="date"  class="form-control"  name="back_duty" id="input4">
                                </div>
                              </div>
                            </div>

                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Total Regular Salary:</label>
                                <div class="col-sm-6">
                                  <input type="number" class="form-control" name="total_regular_salary">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Total Vacation Salary:</label>
                                <div class="col-sm-6">
                                  <input type="number"  class="form-control"  name="total_vacation_salary" id="input4">
                                </div>
                              </div>
                            </div>

                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Net Salary:</label>
                                <div class="col-sm-6">
                                  <input type="number" class="form-control" name="net_salary">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Payment Voucher No:</label>
                                <div class="col-sm-6">
                                  <input type="number"  class="form-control"  name="payment_vacation" id="input4">
                                </div>
                              </div>
                            </div>

                          </div>


                          


                          <div class="col-md-12">
                            <div class="form-group row">
                              {{-- <label for="input4" class="col-sm-6 col-form-label">Amount Due(Days):</label> --}}
                              <div class="col-sm-12">
                                <input type="submit"  class="btn btn-success" value="Submit" id="input4">
                              </div>
                            </div>
                          </div>

                        </div>

                    </form>
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
                <h2>All Vacation Salary</h2>
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
                                <tr>
                                  <th>Reference No</th>
                                  <th>Date</th>
                                  <th>Hijri</th>
                                  <th>Reference Vacation No</th>
                                  <th>Employee Code</th>
                                  <th>Name</th>
                                  <th>Reference Vacation Date</th>
                                  <th>Join Date</th>
                                  <th>Last Day</th>
                                  <th>Vacation Start</th>
                                  <th>Paid Day</th>
                                  <th>Vacation End</th>
                                  <th>Unpaid Days</th>
                                  <th>Balance Days</th>
                                  <th>Public Holidays</th>
                                  <th>Total Consumed</th>
                                  <th>Total Leave Day</th>
                                  <th>Back Duty</th>
                                  <th>Total Regular Salary</th>
                                  <th>Total Vacation Salary</th>
                                  <th>Net Salary</th>
                                  <th>Payment Vacation</th>
                                  <th>Action</th>
                              </tr>
                               
                                
                              
                           




                           
                        </thead>
                        <tfoot>
                            <tr>
                                <!--<th>Options</th>-->
                                <tr>
                                  <th>Reference No</th>
                                  <th>Date</th>
                                  <th>Hijri</th>
                                  <th>Reference Vacation No</th>
                                  <th>Employee Code</th>
                                  <th>Name</th>
                                  <th>Reference Vacation Date</th>
                                  <th>Join Date</th>
                                  <th>Last Day</th>
                                  <th>Vacation Start</th>
                                  <th>Paid Day</th>
                                  <th>Vacation End</th>
                                  <th>Unpaid Days</th>
                                  <th>Balance Days</th>
                                  <th>Public Holidays</th>
                                  <th>Total Consumed</th>
                                  <th>Total Leave Day</th>
                                  <th>Back Duty</th>
                                  <th>Total Regular Salary</th>
                                  <th>Total Vacation Salary</th>
                                  <th>Net Salary</th>
                                  <th>Payment Vacation</th>
                                  <th>Action</th>
                              </tr>
                            </tr>
                        </tfoot>
                        <tbody>

                          @foreach ($vacation_sal as $vacation)
                          <tr>
                              <td>{{ $vacation->ref_no }}</td>
                              <td>{{ $vacation->date }}</td>
                              <td>{{ $vacation->hijri }}</td>
                              <td>{{ $vacation->ref_vacation_no }}</td>
                              <td>{{ $vacation->emp_code }}</td>
                              <td>{{ $vacation->name }}</td>
                              <td>{{ $vacation->ref_vacation_date }}</td>
                              <td>{{ $vacation->join_date }}</td>
                              <td>{{ $vacation->last_day }}</td>
                              <td>{{ $vacation->vacation_start }}</td>
                              <td>{{ $vacation->paid_day }}</td>
                              <td>{{ $vacation->vacation_end }}</td>
                              <td>{{ $vacation->unpaid_days }}</td>
                              <td>{{ $vacation->balance_days }}</td>
                              <td>{{ $vacation->public_holidays }}</td>
                              <td>{{ $vacation->total_consumed }}</td>
                              <td>{{ $vacation->total_leave_day }}</td>
                              <td>{{ $vacation->back_duty }}</td>
                              <td>{{ $vacation->total_regular_salary }}</td>
                              <td>{{ $vacation->total_vacation_salary }}</td>
                              <td>{{ $vacation->net_salary }}</td>
                              <td>{{ $vacation->payment_vacation }}</td>
                              <td>
                                        
                                <a href="" class="ml-2"><i class="fa fa-edit"></i></a><br><br>
                               
          
                              
                                  <a href="{{ url('vacation_salary/delete',$vacation->id) }}" class="ml-2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                 
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


$(document).ready(function() {
  $('input[type="checkbox"], input[type="radio"]').change(function() {
    var selectedValues = $('input[name="filter[]"]:checked').map(function() {
      return $(this).val();
    }).get();
    var selectOptions = '';
    if (selectedValues.length > 0) {
      selectOptions += '<option value="">Select an option</option>';
      $.each(selectedValues, function(index, value) {
        selectOptions += '<option value="' + value + '">' + value + '</option>';
      });
    } else {
      selectOptions += '<option value="">No options selected</option>';
    }
    $('#filter_select').html(selectOptions);
  });
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


