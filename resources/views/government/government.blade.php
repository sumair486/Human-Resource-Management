@extends('layouts.master')
@section('title', 'Government Form')
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
                <h2>Add Government - Work Permit</h2>
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
                    <form class="form" method="POST" action="{{ url('government') }}">
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
                                <label for="input4" class="col-sm-6 col-form-label">Date:</label>
                                <div class="col-sm-6">
                                  <input type="date"  class="form-control"  name="date" id="input4">
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Employee Name:</label>
                                <div class="col-sm-6">
                                    <select class="form-control"  name="employee">
                                        @foreach ($employee as $employees)
                                            <option value="{{ $employees->first_name }}">{{ $employees->first_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Nationality:</label>
                                <div class="col-sm-6">
                                    <select class="form-control"  name="nationality">
                                        @foreach ($nationality as $nationalities)
                                            <option value="{{ $nationalities->name }}">{{ $nationalities->name }}</option>
                                        @endforeach
                                    </select>
                                 
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Sex:</label>
                                <div class="col-sm-6">
                                  <select  class="form-control" name="sex">
                                    <option value="Male">Male</option>
                                    <option value="FeMale">FeMale</option>
                                    <option value="Male">Male</option>

                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Birth Date:</label>
                                <div class="col-sm-6">
                                  <input type="date"  class="form-control"  name="birth_date" id="">
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label for="input4" class="col-sm-6 col-form-label">Kingdom Entry Date:</label>
                                  <div class="col-sm-6">
                                    <input type="date"  class="form-control"  name="kingdom_entry" id="input4">
                                  </div>
                                </div>
                              </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Martial Status:</label>
                                <div class="col-sm-6">
                                    <select class="form-control"  name="marital">
                                        @foreach ($marital_status as $marital)
                                            <option value="{{ $marital->name }}">{{ $marital->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                              </div>
                            </div>
                          </div>





                          <div class="form-group row">

                            <label for="input1" class="col-sm-2 col-form-label">Passport</label>
                           
                            <div class="col-sm-10">
                              <div class="row">
                                <div class="col-sm-3">
                                    <span style="font-weight: bold">No</span>


                                  <input type="number" placeholder="" class="form-control"  name="passport_no" class="form-control form-control-md" value="{{old('passport_no')}}" >
                                  @error('passport_no')
                                  <label class="error">{{$errors->first('passport_no')}}</label>
                                  @enderror
                                </div>
                                <div class="col-sm-3">
                            <span style="font-weight: bold">Issue Date</span>
                                    
                                  <input type="date" class="form-control"  name="passport_issue" class="form-control form-control-md" value="{{old('passport_issue')}}" >
                                  @error('passport_issue')
                                  <label class="error">{{$errors->first('passport_issue')}}</label>
                                  @enderror
                                </div>
                                <div class="col-sm-3">
                            <span style="font-weight: bold">Expiry Date</span>
                                  
                                    <input type="date" class="form-control"  name="passport_expiry" class="form-control form-control-md" value="{{old('passport_expiry')}}" >
                                  @error('passport_expiry')
                                  <label class="error">{{$errors->first('passport_expiry')}}</label>
                                  @enderror
                                </div>
                                <div class="col-sm-3">
                            <span style="font-weight: bold">Issue Place</span>
                                  
                                    <input type="text" class="form-control" placeholder="Enter"  name="passport_place" class="form-control form-control-md" value="{{old('passport_place')}}">
                                  @error('passport_place')
                                  <label class="error">{{$errors->first('passport_place')}}</label>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="form-group row">
                            <label for="input1" class="col-sm-2 col-form-label">Iqama</label>
                            <div class="col-sm-10">
                              <div class="row">
                                <div class="col-sm-3">
                                    <span style="font-weight: bold">No</span>

                                  <input type="number" placeholder="" class="form-control"  name="iqama_no" class="form-control form-control-md" value="{{old('iqama_no')}}" >
                                  @error('iqama_no')
                                  <label class="error">{{$errors->first('iqama_no')}}</label>
                                  @enderror
                                </div>
                                <div class="col-sm-3">
                            <span style="font-weight: bold">Issue Date</span>

                                  <input type="date" class="form-control"  name="iqama_issue" class="form-control form-control-md" value="{{old('iqama_issue')}}" >
                                  @error('iqama_issue')
                                  <label class="error">{{$errors->first('iqama_issue')}}</label>
                                  @enderror
                                </div>
                                <div class="col-sm-3">
                            <span style="font-weight: bold">Expiry Date</span>

                                  <input type="date" class="form-control"  name="iqama_expiry" class="form-control form-control-md" value="{{old('iqama_expiry')}}" >
                                  @error('iqama_expiry')
                                  <label class="error">{{$errors->first('driving_expdate')}}</label>
                                  @enderror
                                </div>
                                <div class="col-sm-3">
                            <span style="font-weight: bold">Issue Place</span>

                                  <input type="text" class="form-control" placeholder="Enter"  name="iqama_place" class="form-control form-control-md" value="{{old('iqama_place')}}">
                                  @error('iqama_place')
                                  <label class="error">{{$errors->first('iqama_place')}}</label>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>



                         


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Qualification:</label>
                                <div class="col-sm-6">
                                    <select  class="form-control" name="qualification">
                                        @foreach ($qualification as $qualifications)
                                            <option value="{{ $qualifications->name }}">{{ $qualifications->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                              </div>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label for="input4" class="col-sm-6 col-form-label">Major:</label>
                                  <div class="col-sm-6">
                                    <input type="text"  class="form-control"  name="major" id="input4">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label for="input3" class="col-sm-6 col-form-label">Certificate</label>
                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" name="certificate">
                                  </div>
                                </div>
                              </div>

                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Current Profession:</label>
                                <div class="col-sm-6">
                                    <select  class="form-control" name="profession">
                                        @foreach ($profession as $professions)
                                            <option value="{{ $professions->name }}">{{ $professions->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div style="justify-content: space-between" class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">As in:</label>
                                <div>
                                    <input type="radio" id="Iqama" name="gover_as" value="Iqama"
                                           checked>
                                    <label for="huey">Iqama</label>
                                  </div>

                                  <div>
                                    <input type="radio" id="Passport" name="gover_as" value="Passport"
                                           checked>
                                    <label for="huey">Passport</label>
                                  </div>

                                  <div>
                                    <input type="radio" id="Visa" name="gover_as" value="Visa"
                                           checked>
                                    <label for="huey">Visa</label>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Experience :</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="experience">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Sponsor Name:</label>
                                <div class="col-sm-6">
                                  <input type="text"  class="form-control"  name="sponsor" id="input4">
                                </div>
                              </div>
                            </div>

                          </div>




                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Labour Employer Number :</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="labour_employee">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Business Type:</label>
                                <div class="col-sm-6">
                                  <input type="text"  class="form-control"  name="business" id="input4">
                                </div>
                              </div>
                            </div>

                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Commercial Register :</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="commercial">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Issue Date:</label>
                                <div class="col-sm-6">
                                  <input type="date"  class="form-control"  name="issue_date" id="input4">
                                </div>
                              </div>
                            </div>

                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Issue :</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="issue">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Salary:</label>
                                <div class="col-sm-6">
                                  <input type="number"  class="form-control"  name="salary" id="input4">
                                </div>
                              </div>
                            </div>

                          </div>



                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Other:</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="other">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Permit:</label>
                                <div class="col-sm-6">
                                  <input type="text"  class="form-control"  name="permit" id="input4">
                                </div>
                              </div>
                            </div>

                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">City:</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="city">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">District:</label>
                                <div class="col-sm-6">
                                  <input type="text"  class="form-control"  name="district" id="input4">
                                </div>
                              </div>
                            </div>

                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">Street:</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="street">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Tel:</label>
                                <div class="col-sm-6">
                                  <input type="text"  class="form-control"  name="tel" id="input4">
                                </div>
                              </div>
                            </div>

                          </div>


                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input3" class="col-sm-6 col-form-label">P.O.Box:</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="box">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="input4" class="col-sm-6 col-form-label">Zip Code:</label>
                                <div class="col-sm-6">
                                  <input type="text"  class="form-control"  name="zip_code" id="input4">
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
                <h2>All Government</h2>
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
                                  <th>Ref No</th>
                                  <th>Date</th>
                                  <th>Employee</th>
                                  <th>Nationality</th>
                                  <th>Sex</th>
                                  <th>Birth Date</th>
                                  <th>Kingdom Entry</th>
                                  <th>Marital</th>
                                  <th>Passport No</th>
                                  <th>Passport Issue</th>
                                  <th>Passport Expiry</th>
                                  <th>Passport Place</th>
                                  <th>Iqama No</th>
                                  <th>Iqama Issue</th>
                                  <th>Iqama Expiry</th>
                                  <th>Iqama Place</th>
                                  <th>Qualification</th>
                                  <th>Certificate</th>
                                  <th>Profession</th>
                                  <th>Gover As</th>
                                  <th>Experience</th>
                                  <th>Sponsor</th>
                                  <th>Labour Employee</th>
                                  <th>Business</th>
                                  <th>Commercial</th>
                                  <th>Issue Date</th>
                                  <th>Issue</th>
                                  <th>Salary</th>
                                  <th>Other</th>
                                  <th>Permit</th>
                                  <th>City</th>
                                  <th>District</th>
                                  <th>Street</th>
                                  <th>Tel</th>
                                  <th>Box</th>
                                  <th>Zip Code</th>
                                  <th>Action</th>

                              </tr>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <!--<th>Options</th>-->
                                <tr>
                                  <th>Ref No</th>
                                  <th>Date</th>
                                  <th>Employee</th>
                                  <th>Nationality</th>
                                  <th>Sex</th>
                                  <th>Birth Date</th>
                                  <th>Kingdom Entry</th>
                                  <th>Marital</th>
                                  <th>Passport No</th>
                                  <th>Passport Issue</th>
                                  <th>Passport Expiry</th>
                                  <th>Passport Place</th>
                                  <th>Iqama No</th>
                                  <th>Iqama Issue</th>
                                  <th>Iqama Expiry</th>
                                  <th>Iqama Place</th>
                                  <th>Qualification</th>
                                  <th>Certificate</th>
                                  <th>Profession</th>
                                  <th>Gover As</th>
                                  <th>Experience</th>
                                  <th>Sponsor</th>
                                  <th>Labour Employee</th>
                                  <th>Business</th>
                                  <th>Commercial</th>
                                  <th>Issue Date</th>
                                  <th>Issue</th>
                                  <th>Salary</th>
                                  <th>Other</th>
                                  <th>Permit</th>
                                  <th>City</th>
                                  <th>District</th>
                                  <th>Street</th>
                                  <th>Tel</th>
                                  <th>Box</th>
                                  <th>Zip Code</th>
                                  <th>Action</th>

                              </tr>
                            </tr>
                        </tfoot>
                        <tbody>
                          @foreach($government as $gov)
                          <tr>
                              <td>{{ $gov->ref_no }}</td>
                              <td>{{ $gov->date }}</td>
                              <td>{{ $gov->employee }}</td>
                              <td>{{ $gov->nationality }}</td>
                              <td>{{ $gov->sex }}</td>
                              <td>{{ $gov->birth_date }}</td>
                              <td>{{ $gov->kingdom_entry }}</td>
                              <td>{{ $gov->marital }}</td>
                              <td>{{ $gov->passport_no }}</td>
                              <td>{{ $gov->passport_issue }}</td>
                              <td>{{ $gov->passport_expiry }}</td>
                              <td>{{ $gov->passport_place }}</td>
                              <td>{{ $gov->iqama_no }}</td>
                              <td>{{ $gov->iqama_issue }}</td>
                              <td>{{ $gov->iqama_expiry }}</td>
                              <td>{{ $gov->iqama_place }}</td>
                              <td>{{ $gov->qualification }}</td>
                              <td>{{ $gov->certificate }}</td>
                              <td>{{ $gov->profession }}</td>
                              <td>{{ $gov->gover_as }}</td>
                              <td>{{ $gov->experience }}</td>
                              <td>{{ $gov->sponsor }}</td>
                              <td>{{ $gov->labour_employee }}</td>
                              <td>{{ $gov->business }}</td>
                              <td>{{ $gov->commercial }}</td>
                <td>{{ $gov->issue_date }}</td>
                <td>{{ $gov->issue }}</td>
                <td>{{ $gov->salary }}</td>
                <td>{{ $gov->other }}</td>
                <td>{{ $gov->permit }}</td>
                <td>{{ $gov->city }}</td>
                <td>{{ $gov->district }}</td>
                <td>{{ $gov->street }}</td>
                <td>{{ $gov->tel }}</td>
                <td>{{ $gov->box }}</td>
                <td>{{ $gov->zip_code }}</td>

                <td>
                                        
                  <a href="" class="ml-2"><i class="fa fa-edit"></i></a><br><br>
                 

                
                    <a href="{{ url('government/delete',$gov->id) }}" class="ml-2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                   
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


