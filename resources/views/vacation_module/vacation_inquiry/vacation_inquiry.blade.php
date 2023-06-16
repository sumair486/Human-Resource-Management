@extends('layouts.master')
@section('title', 'Vacation Inquiry')
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
                <h2>Add Vacation Inquiry</h2>
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
                    <form class="form" method="POST" action="{{ url('vacation_inquiry') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Employee:</label>
                                <div class="col-sm-6">
                                  <input type="number" class="form-control" name="employee">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Basic:</label>
                                <div class="col-sm-6">
                                  <input type="number"  class="form-control"  name="basic" id="input4">
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Name:</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="name">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Housing:</label>
                                <div class="col-sm-6">
                                  <input type="number"  class="form-control"  name="housing" id="input4">
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Division:</label>
                                <div class="col-sm-6">
                                  <select  class="form-control" name="division">
                                    <option value="hello">hello</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Car Allowance:</label>
                                <div class="col-sm-6">
                                  <input type="number"  class="form-control"  name="car_allowance" id="input4">
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Position:</label>
                                <div class="col-sm-6">
                                  <select  class="form-control" name="position">
                                    @foreach ($position as $positions)
                                    <option value="{{ $positions->name }}">{{ $positions->name }}</option>
                                        
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Food Allowance:</label>
                                <div class="col-sm-6">
                                  <input type="number"  class="form-control"  name="food_allowance" id="input4">
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Joining Date:</label>
                                <div class="col-sm-6">
                                  <input type="date" class="form-control" name="join_date">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Transport:</label>
                                <div class="col-sm-6">
                                  <input type="number"  class="form-control"  name="transport" id="input4">
                                </div>
                              </div>
                            </div>

                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Other Allowance:</label>
                                <div class="col-sm-6">
                                  <input type="number" class="form-control" name="other_allowance">
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label for="input4" class="col-sm-6 col-form-label">Last Leave Date:</label>
                                  <div class="col-sm-6">
                                    <input type="date"  class="form-control"  name="last_leave_date" id="input4">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label for="input3" class="col-sm-6 col-form-label">Current Leave Date:</label>
                                  <div class="col-sm-6">
                                    <input type="date" class="form-control" name="current_leave_date">
                                  </div>
                                </div>
                              </div>

                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Last Leave Return Date:</label>
                                <div class="col-sm-6">
                                  <input type="date" class="form-control" name="last_leave_return_date">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Balance Brought Forword(Days):</label>
                                <div class="col-sm-6">
                                  <input type="number"  class="form-control"  name="balance_brought" id="input4">
                                </div>
                              </div>
                            </div>

                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Balance After Last Leave to 08/02/2008(Days) :</label>
                                <div class="col-sm-6">
                                  <input type="number" class="form-control" name="balance_after_last">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Due From Last Leave(Days):</label>
                                <div class="col-sm-6">
                                  <input type="number"  class="form-control"  name="due_from_last" id="input4">
                                </div>
                              </div>
                            </div>

                          </div>



                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Total Due(Days):</label>
                                <div class="col-sm-6">
                                  <input type="number" class="form-control" name="total_due">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Amount Due(Days):</label>
                                <div class="col-sm-6">
                                  <input type="number"  class="form-control"  name="amount_due" id="input4">
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
                <h2>All Vacation Inquiry</h2>
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
                            <th>Employee</th>
                            <th>Basic</th>
                            <th>Name</th>
                            <th>Housing</th>
                            <th>Division</th>
                            <th>Car Allowance</th>
                            <th>Position</th>
                            <th>Food Allowance</th>
                            <th>Join Date</th>
                            <th>Transport</th>
                            <th>Other Allowance</th>
                            <th>Last Leave Date</th>
                            <th>Current Leave Date</th>
                            <th>Last Leave Return Date</th>
                            <th>Balance Brought</th>
                            <th>Balance After Last</th>
                            <th>Due From Last</th>
                            <th>Total Due</th>
                            <th>Amount Due</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Employee</th>
                            <th>Basic</th>
                            <th>Name</th>
                            <th>Housing</th>
                            <th>Division</th>
                            <th>Car Allowance</th>
                            <th>Position</th>
                            <th>Food Allowance</th>
                            <th>Join Date</th>
                            <th>Transport</th>
                            <th>Other Allowance</th>
                            <th>Last Leave Date</th>
                            <th>Current Leave Date</th>
                            <th>Last Leave Return Date</th>
                            <th>Balance Brought</th>
                            <th>Balance After Last</th>
                            <th>Due From Last</th>
                            <th>Total Due</th>
                            <th>Amount Due</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                          @foreach($vacation_inq as $vacation)
                          <tr>
                              <td>{{ $vacation->employee }}</td>
                              <td>{{ $vacation->basic }}</td>
                              <td>{{ $vacation->name }}</td>
                              <td>{{ $vacation->housing }}</td>
                              <td>{{ $vacation->division }}</td>
                              <td>{{ $vacation->car_allowance }}</td>
                              <td>{{ $vacation->position }}</td>
                              <td>{{ $vacation->food_allowance }}</td>
                              <td>{{ $vacation->join_date }}</td>
                              <td>{{ $vacation->transport }}</td>
                              <td>{{ $vacation->other_allowance }}</td>
                              <td>{{ $vacation->last_leave_date }}</td>
                              <td>{{ $vacation->current_leave_date }}</td>
                              <td>{{ $vacation->last_leave_return_date }}</td>
                              <td>{{ $vacation->balance_brought }}</td>
                              <td>{{ $vacation->balance_after_last }}</td>
                              <td>{{ $vacation->due_from_last }}</td>
                              <td>{{ $vacation->total_due }}</td>
                              <td>{{ $vacation->amount_due }}</td>
                              <td>
                                        
                                <a href="" class="ml-2"><i class="fa fa-edit"></i></a><br><br>
                               
          
                              
                                  <a href="{{ url('vacation_inquiry/delete',$vacation->id) }}" class="ml-2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                 
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


