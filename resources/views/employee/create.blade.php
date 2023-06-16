@extends('layouts.master')
@section('title', 'Employee')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}"/>

<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.css')}}"/>

<link rel="stylesheet" href="{{asset('assets/plugins/fileuploader/font/font-fileuploader.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/fileuploader/jquery.fileuploader.min.css')}}">
@stop

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Add Employee</h2>
                <ul class="header-dropdown">
                    <button type="button" class="btn btn-primary" style="padding: inherit;margin: auto;">
                    <li><a style="font-weight:700; color:white; margin-left:20px; text-decoration:none;" href="{{url('employee')}}">All Employee</a></li>
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <!--<ul class="dropdown-menu dropdown-menu-right">-->
                        <!--    <li><a href="{{url('employee')}}">All Employee</a></li>-->
                        <!--</ul>-->
                    </li>
                    <!--<li class="remove">-->
                    <!--    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>-->
                    <!--</li>-->
                    </button>
                </ul>
            </div>
            <div class="body">
                <form action="{{url('employee')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row clearfix">
                    <div class="col-md-6">
                        <h6>Basic Info </h6>
                        <hr>
                        <label>Employee No</label>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" name="employee_no" value="{{$newEmployeeNo}}" readonly>
                             @error('employee_no')
                                <label class="error">{{$errors->first('employee_no')}}</label>
                            @enderror
                        </div>
                        </div>
                    <div class="col-md-6">
                        <h6  style="color: transparent">Contact</h6>
                        <hr>
                        <label>First Name</label>
                        <div class="form-group">
                            <input required placeholder="In English" type="text" name="first_name" class="form-control form-control-sm form-float" value="{{old('first_name')}}">
                            @error('first_name')
                                <label class="error">{{$errors->first('first_name')}}</label>
                            @enderror
                        </div>
                        
                        </div>
                        </div>
                        <div class="row">
                         <div class="col-md-6">
                        <label>Middle Name</label>
                        <div class="form-group">
                            <input placeholder="In English" type="text" name="middle_name" class="form-control form-control-sm form-float" value="{{old('middle_name')}}">
                            @error('middle_name')
                                <label class="error">{{$errors->first('middle_name')}}</label>
                            @enderror
                        </div>
                               <label>First Name Arb</label>
                        <div class="form-group">
                            <input placeholder="In Arabic" type="text" style="text-align: right" id="txtBox01" name="first_name_arb" class="form-control form-control-sm" value="{{old('first_name_arb')}}">
                            @error('first_name_arb')
                                <label class="error">{{$errors->first('first_name_arb')}}</label>
                            @enderror
                        </div>
                              <label>Grand Name Arb</label>
                        <div class="form-group">
                            <input placeholder="In Arabic" type="text" style="text-align: right" id="txtBox02" name="grand_name_arb" class="form-control form-control-sm" value="{{old('grand_name_arb')}}">
                            @error('grand_name_arb')
                                <label class="error">{{$errors->first('grand_name_arb')}}</label>
                            @enderror
                        </div>
                        </div>
                       <div class="col-md-6">
                        <label>Family Name</label>
                        <div class="form-group">
                            <input placeholder="In English"  type="text" name="family_name" class="form-control form-control-sm" value="{{old('family_name')}}">
                            @error('family_name')
                                <label class="error">{{$errors->first('family_name')}}</label>
                            @enderror
                        </div>
                        <label>Middle Name Arb</label>
                        <div class="form-group">
                            <input placeholder="In Arabic" style="text-align: right" id="txtBox03" type="text" name="middle_name_arb" class="form-control form-control-sm" value="{{old('middle_name_arb')}}">
                            @error('middle_name_arb')
                                <label class="error">{{$errors->first('middle_name_arb')}}</label>
                            @enderror
                        </div>


                        <label>Family Name Arb</label>
                        <div class="form-group">
                            <input placeholder="In Arabic" style="text-align: right" id="txtBox04" type="text" name="family_name_arb" class="form-control form-control-sm" value="{{old('family_name_arb')}}">
                            @error('family_name_arb')
                                <label class="error">{{$errors->first('family_name_arb')}}</label>
                            @enderror
                        </div>

                        </div>
                        {{-- <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="btn btn-success" type="submit" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </div>   --}}
                    {{-- </form> --}}
                        </div>
                        


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">


                       <!-- HTML code for the tab navigation -->
<ul style="justify-content: center;" class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">General</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#tab2" role="tab">Contract</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#tab3" role="tab">Documents</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#tab4" role="tab">Allowance</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab5" role="tab">Depandents</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab6" role="tab">Medical/Car</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab7" role="tab">Bank/Others</a>
      </li>
  </ul>
  
  <!-- HTML code for the tab content -->
  <div class="tab-content">
    <div class="tab-pane active" id="tab1" role="tabpanel">

        <div class="container-fluid">
            <div  class="row">
                <div class="col-md-8">
                    {{-- <form class="form" method="POST" action="{{ url('addgeneral') }}" enctype="multipart/form-data" > --}}
                        {{-- @csrf --}}


                        <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Date of Birth</label>
                            <div class="col-sm-8">
                                <input required type="date" name="date_of_birth" class="form-control form-control-md" value="{{old('date_of_birth')}}">
                              @error('date_of_birth')
                              <label class="error">{{$errors->first('date_of_birth')}}</label>
                          @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Gender</label>
                            <div class="col-sm-8">
                                {{-- <input type="date" > --}}
                              <select required name="gender" class="form-control form-control-md" value="{{old('gender')}}">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>

                              </select>
                                @error('gender')
                              <label class="error">{{$errors->first('gender')}}</label>
                          @enderror
                            </div>
                          </div>
        
        


                        <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Nationality:</label>
                            <div class="col-sm-8">
                                <select required name="nationality" class="form-control" value="{{old('nationality')}}">
                                   @foreach ($nationality as $nationalities)
                                    <option value="{{ $nationalities->name }}">{{ $nationalities->name }}</option>
                                       
                                   @endforeach
                                    @error('nationality')
                                    <label class="error">{{$errors->first('nationality')}}</label>
                                @enderror
                                </select>
                            </div>
                          </div>


                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Religion:</label>
                            <div class="col-sm-8">
                                <select required name="religion" class="form-control" value="{{old('religion')}}">
                                    @foreach ($religion as $religions)
                                    <option value="{{ $religions->name }}">{{ $religions->name }}</option>
                                       
                                   @endforeach
                                    @error('religion')
                                    <label class="error">{{$errors->first('religion')}}</label>
                                @enderror
                                </select>
                            </div>
                          </div>






                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Basic Qualification:</label>
                            <div class="col-sm-8">
                                <select required name="qualification" class="form-control" value="{{old('qualification')}}">
                                  @foreach ($qualification as $qualifications )
                                  <option value="{{ $qualifications->name }}">{{ $qualifications->name }}</option>
                                    
                                  @endforeach  
                                    @error('qualification')
                                    <label class="error">{{$errors->first('qualification')}}</label>
                                @enderror
                                </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Profession:</label>
                            <div class="col-sm-8">
                                <select required name="professions" class="form-control" value="{{old('professions')}}">
                                  @foreach ($profession as $professions )
                                  <option value="{{ $professions->name }}">{{ $professions->name }}</option>
                                    
                                  @endforeach  
                                    @error('professions')
                                    <label class="error">{{$errors->first('professions')}}</label>
                                @enderror
                                </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Martial Status:</label>
                            <div class="col-sm-8">
                                <select required name="martial_status" class="form-control" value="{{old('martial_status')}}">
                                    <option value="Single">Married</option>
                                    <option value="Unmarried">Unmarried</option>

                                    @error('martial_status')
                                    <label class="error">{{$errors->first('martial_status')}}</label>
                                @enderror
                                </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Additon Skills:</label>
                            <div class="col-sm-8">
                              <textarea required name="addition_skills" type="text" class="form-control" value="{{old('addition_skills')}}" id="inputName" placeholder="Enter Skills"></textarea>
                              @error('addition_skills')
                              <label class="error">{{$errors->first('addition_skills')}}</label>
                          @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Telephone/Mobile:</label>
                            <div class="col-sm-8">
                              <input required type="text" name="phone" value="{{old('phone')}}"  class="form-control" id="inputName" placeholder="Enter your phone">
                              @error('phone')
                              <label class="error">{{$errors->first('phone')}}</label>
                          @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Email:</label>
                            <div class="col-sm-8">
                              <input required type="email" class="form-control" value="{{old('email')}}"  name="email" id="inputName" placeholder="Enter your name">
                              @error('email')
                              <label class="error">{{$errors->first('email')}}</label>
                          @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Sponsor:</label>
                            <div class="col-sm-8">
                              <input required type="text" name="sponsor" class="form-control" value="{{old('sponsor')}}" id="inputName" placeholder="Enter your sponsor">
                              @error('sponsor')
                              <label class="error">{{$errors->first('sponsor')}}</label>
                          @enderror
                            </div>
                          </div>


                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Type of sponsor:</label>
                            <div class="col-sm-8">
                                <select required name="type_of_sponsor" class="form-control" value="{{old('type_of_sponsor')}}">
                                    <option value="Abdulallah">Abdulallah</option>
                                    <option value="Rahimullah">Rahimullah</option>

                                    @error('type_of_sponsor')
                                    <label class="error">{{$errors->first('type_of_sponsor')}}</label>
                                @enderror
                                </select>
                            </div>
                          </div>


                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Address(Kingdom):</label>
                            <div class="col-sm-8">
                              <textarea required type="text" name="address_kingdom" class="form-control" value="{{old('address_kingdom')}}" id="inputName" placeholder="Enter your address"></textarea>
                              @error('address_kingdom')
                              <label class="error">{{$errors->first('address_kingdom')}}</label>
                          @enderror
                            </div>
                          </div>


                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Address(Abroad):</label>
                            <div class="col-sm-8">
                              <textarea required type="text" name="address_abroad" class="form-control" value="{{old('address_abroad')}}" id="inputName" placeholder="Enter your abroad"></textarea>
                              @error('address_abroad')
                              <label class="error">{{$errors->first('address_abroad')}}</label>
                          @enderror
                            </div>
                          </div>



        
                    {{-- </form> --}}




                </div>


                {{-- file --}}
                <div class="col-md-4">
                <div class="form-group row">
                    {{-- <label for="inputName" class="col-sm-4 col-form-label">Image</label> --}}
                    <div class="col-sm-12">
                        <input required type="file" name="file" class="form-control form-control-md" value="{{old('file')}}">
                      @error('file')
                      <label class="error">{{$errors->first('file')}}</label>
                  @enderror
                    </div>
                  </div>




                  {{-- <input type="submit" value="Add"> --}}
                </div>
                {{-- <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="submit" class="btn btn-success" value="Submit general"  >

                  </div>
                </div> --}}
            {{-- </form> --}}

                {{-- end// --}}
                
            </div>
        </div>

    </div>
    <div class="tab-pane" id="tab2" role="tabpanel">

        {{-- tab2 start--}}

        <div class="container-fluid">
            <div  class="row">
                <div class="col-md-6">
                    {{-- <form class="form" method="POST" action="{{ url('addcontract') }}" enctype="multipart/form-data" > --}}
                        {{-- @csrf --}}


                        <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Contract period</label>
                            <div class="col-sm-8">
                                <input required type="number" placeholder="Months" name="contract_period" class="form-control form-control-md" value="{{old('contract_period')}}">
                              @error('contract_period')
                              <label class="error">{{$errors->first('contract_period')}}</label>
                          @enderror
                            </div>
                          </div>


                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Join Date</label>
                            <div class="col-sm-8">
                                <input required type="date" name="join_date" class="form-control form-control-md" value="{{old('join_date')}}">
                              @error('join_date')
                              <label class="error">{{$errors->first('join_date')}}</label>
                          @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Expiry Date</label>
                            <div class="col-sm-8">
                                <input required type="date" name="expiry_date" class="form-control form-control-md" value="{{old('expiry_date')}}">
                              @error('expiry_date')
                              <label class="error">{{$errors->first('expiry_date')}}</label>
                          @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Active Form</label>
                            <div class="col-sm-8">
                                <input required type="date" name="active_form" class="form-control form-control-md" value="{{old('active_form')}}">
                              @error('active_form')
                              <label class="error">{{$errors->first('active_form')}}</label>
                          @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">family Mamber</label>
                            <div class="col-sm-3">
                                <input placeholder="0.00%" required type="number" name="family_mamber" class="form-control form-control-md" value="{{old('family_mamber')}}">
                              @error('family_mamber')
                              <label class="error">{{$errors->first('family_mamber')}}</label>
                          @enderror
                            </div>
                            <label for="inputName" class="col-sm-3 col-form-label">No of Tickets</label>
                            <div class="col-sm-3">
                                <input required type="number" placeholder="0.00%" name="no_of_ticket" class="form-control form-control-md" value="{{old('no_of_ticket')}}">
                              @error('no_of_ticket')
                              <label class="error">{{$errors->first('no_of_ticket')}}</label>
                          @enderror
                            </div>
                            
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">Ticket Values</label>
                            <div class="col-sm-3">
                                <input required type="number" placeholder="0.00%" name="ticket_values" class="form-control form-control-md" value="{{old('ticket_values')}}">
                              @error('ticket_values')
                              <label class="error">{{$errors->first('ticket_values')}}</label>
                          @enderror
                            </div>
                            <label for="inputName" class="col-sm-3 col-form-label">Totals</label>
                            <div class="col-sm-3">
                                <input required type="number" name="total" placeholder="0.00" class="form-control form-control-md" value="{{old('total')}}">
                              @error('total')
                              <label class="error">{{$errors->first('total')}}</label>
                          @enderror
                            </div>
                            
                          </div>


                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Notes</label>
                            <div class="col-sm-8">
                                <textarea required type="text" name="notes_contract" class="form-control form-control-md" value="{{old('notes_contract')}}"></textarea>
                              @error('notes_contract')
                              <label class="error">{{$errors->first('notes_contract')}}</label>
                          @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Company</label>
                            <div class="col-sm-8">
                                {{-- <input type="date" > --}}
                              <select required name="company_contract" class="form-control form-control-md" value="{{old('company_contract')}}">
                                @foreach ($company as $companies)
                                <option value="{{ $companies->name }}">{{ $companies->name }}</option>
                               @endforeach
                              </select>
                                @error('company_contract')
                              <label class="error">{{$errors->first('company_contract')}}</label>
                          @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Division</label>
                            <div class="col-sm-8">
                                {{-- <input type="date" > --}}
                              <select  required name="division" class="form-control form-control-md" value="{{old('division')}}">
                                <option value="division">division</option>
                              </select>
                                @error('division')
                              <label class="error">{{$errors->first('division')}}</label>
                          @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Branch</label>
                            <div class="col-sm-8">
                                {{-- <input type="date" > --}}
                              <select name="branch" class="form-control form-control-md" value="{{old('branch')}}">
                                @foreach ($branch as $branches)
                                <option value="{{ $branches->name }}">{{ $branches->name }}</option>
                               @endforeach
                              </select>
                                @error('branch')
                              <label class="error">{{$errors->first('branch')}}</label>
                          @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Department</label>
                            <div class="col-sm-8">
                                {{-- <input type="date" > --}}
                              <select name="department" class="form-control form-control-md" value="{{old('department')}}">
                                @foreach ($department as $departments)
                                <option value="{{ $departments->name }}">{{ $departments->name }}</option>
                               @endforeach
                              </select>
                                @error('department')
                              <label class="error">{{$errors->first('department')}}</label>
                          @enderror
                            </div>
                          </div>
        

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Job Title</label>
                            <div class="col-sm-8">
                                {{-- <input type="date" > --}}
                              <select name="job_title" class="form-control form-control-md" value="{{old('job_title')}}">
                                @foreach ($job as $jobs)
                                <option value="{{ $jobs->name }}">{{ $jobs->name }}</option>
                               @endforeach
                              </select>
                                @error('job_title')
                              <label class="error">{{$errors->first('job_title')}}</label>
                          @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Category</label>
                            <div class="col-sm-8">
                                {{-- <input type="date" > --}}
                              <select name="category" class="form-control form-control-md" value="{{old('category')}}">
                                @foreach ($category as $categories)
                                <option value="{{ $categories->name }}">{{ $categories->name }}</option>
                               @endforeach
                              </select>
                                @error('category')
                              <label class="error">{{$errors->first('category')}}</label>
                          @enderror
                            </div>
                          </div>


                          <div class="form-group row">
                            <label for="inputName" class="col-sm-4 col-form-label">Allocation</label>
                            <div class="col-sm-8">
                                {{-- <input type="date" > --}}
                              <select name="allocation" class="form-control form-control-md" value="{{old('allocation')}}">
                                <option value="allocation">allocation</option>
                              </select>
                                @error('allocation')
                              <label class="error">{{$errors->first('allocation')}}</label>
                          @enderror
                            </div>
                          </div>


                          <div class="form-group row">
                            <label for="inputName" class="col-sm-3 col-form-label">GL Code</label>
                            <div class="col-sm-3">
                                <input type="number"  name="gl_code" class="form-control form-control-md" value="{{old('gl_code')}}">
                              @error('gl_code')
                              <label class="error">{{$errors->first('gl_code')}}</label>
                          @enderror
                            </div>
                            <label for="inputName" class="col-sm-3 col-form-label">For Index</label>
                            <div class="col-sm-3">
                                <input type="number" name="for_index" class="form-control form-control-md" value="{{old('for_index')}}">
                              @error('for_index')
                              <label class="error">{{$errors->first('for_index')}}</label>
                          @enderror
                            </div>
                            
                          </div>

        


                        



        
                    {{-- </form> --}}




                </div>


                {{-- file --}}
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-4 col-form-label">(Hijri)</label>
                        <div class="col-sm-8">
                            <input type="date" name="hijri_1" class="form-control form-control-md" value="{{old('hijri_1')}}">
                          @error('hijri_1')
                          <label class="error">{{$errors->first('hijri_1')}}</label>
                      @enderror
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="inputName" class="col-sm-4 col-form-label">(Hijri)</label>
                        <div class="col-sm-8">
                            <input type="date" name="hijri_2" class="form-control form-control-md" value="{{old('hijri_2')}}">
                          @error('hijri_2')
                          <label class="error">{{$errors->first('hijri_2')}}</label>
                      @enderror
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="inputName" class="col-sm-4 col-form-label">Active</label>
                        <div  class="col-sm-2">
                            <input  id="myCheckbox" onclick="checkstate()" name="mycheck"  type="checkbox" >

                        </div>
                        <label for="inputName" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-md-3">
                            {{-- <input type="number" name="for_index" class="form-control form-control-md" value="{{old('for_index')}}"> --}}
                            <select id="mySelect" name="statuses" class="form-control form-control-md" value="{{old('statuses')}}">
                                <option>select</option>
                                <option value="Individual">Individual</option>
                                <option value="Partner">Partner</option>


                              </select>
                          @error('statuses')
                          <label class="error">{{$errors->first('statuses')}}</label>
                      @enderror
                        </div>
                        
                      </div>

                     

                      
                      <script>
const checkbox = document.getElementById('myCheckbox');
const select = document.getElementById('mySelect');

checkbox.addEventListener('click', function() {
  if (checkbox.checked) {
    select.disabled = true;
    // Disable all options
    const options = select.options;
    for (let i = 0; i < options.length; i++) {
      options[i].disabled = true;
    }
  } else {
    select.disabled = false;
    // Enable all options
    const options = select.options;
    for (let i = 0; i < options.length; i++) {
      options[i].disabled = false;
    }
  }
});

                      </script>
  
                </div>

                {{-- <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="submit" class="btn btn-success" value="Submit Contract"  >

                  </div>
                </div> --}}

            {{-- </form> --}}

                {{-- end// --}}
                
            </div>
        </div>

        {{-- tab2 end --}}

    </div>
    <div class="tab-pane" id="tab3" role="tabpanel">

      {{-- tab 3 --}}

      <div class="container-fluid">
        <div  class="row">
            <div class="col-md-12">
                {{-- <form class="form" method="POST" action="{{ url('adddocument') }}" enctype="multipart/form-data" > --}}
                    {{-- @csrf --}}


                    <div class="form-group row">
                      <label for="input1" class="col-sm-2 col-form-label">Document</label>
                      <div class="col-sm-10">
                        <div class="row">
                          <div class="col-sm-3">
                            {{-- <input type="text" class="form-control" id="input1" placeholder="Input 1"> --}}
                            <label>#</label>
                          </div>
                          <div class="col-sm-3">
                            {{-- <input type="text" class="form-control" id="input2" placeholder="Input 2"> --}}
                            <label>Issue date</label>

                          </div>
                          <div class="col-sm-3">
                            {{-- <input type="text" class="form-control" id="input3" placeholder="Input 3"> --}}
                            <label>Expiry date</label>

                          </div>
                          <div class="col-sm-3">
                            {{-- <input type="text" class="form-control" id="input4" placeholder="Input 4"> --}}
                            <label>Issue At</label>

                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="input1" class="col-sm-2 col-form-label">Passport</label>
                      <div class="col-sm-10">
                        <div class="row">
                          <div class="col-sm-3">
                            <input type="number" placeholder="number" class="form-control"  name="passport" class="form-control form-control-md" value="{{old('passport')}}" >
                            @error('passport')
                            <label class="error">{{$errors->first('passport')}}</label>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            <input type="date" class="form-control"  name="passport_issuedate" class="form-control form-control-md" value="{{old('passport_issuedate')}}" >
                            @error('passport_issuedate')
                            <label class="error">{{$errors->first('passport_issuedate')}}</label>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            <input type="date" class="form-control"  name="passport_expdate" class="form-control form-control-md" value="{{old('passport_expdate')}}" >
                            @error('passport_expdate')
                            <label class="error">{{$errors->first('passport_expdate')}}</label>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Enter"  name="passport_issueat" class="form-control form-control-md" value="{{old('passport_issueat')}}">
                            @error('passport_issueat')
                            <label class="error">{{$errors->first('passport_issueat')}}</label>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>


                    
                    <div class="form-group row">
                      <label for="input1" class="col-sm-2 col-form-label">Iqama/Id</label>
                      <div class="col-sm-10">
                        <div class="row">
                          <div class="col-sm-3">
                            <input type="number" placeholder="number" class="form-control"  name="Iqama" class="form-control form-control-md" value="{{old('Iqama')}}" >
                            @error('Iqama')
                            <label class="error">{{$errors->first('Iqama')}}</label>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            <input type="date" class="form-control"  name="Iqama_issuedate" class="form-control form-control-md" value="{{old('Iqama_issuedate')}}" >
                            @error('Iqama_issuedate')
                            <label class="error">{{$errors->first('Iqama_issuedate')}}</label>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            <input type="date" class="form-control"  name="Iqama_expdate" class="form-control form-control-md" value="{{old('Iqama_expdate')}}" >
                            @error('Iqama_expdate')
                            <label class="error">{{$errors->first('Iqama_expdate')}}</label>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Enter"  name="Iqama_issueat" class="form-control form-control-md" value="{{old('Iqama_issueat')}}">
                            @error('Iqama_issueat')
                            <label class="error">{{$errors->first('Iqama_issueat')}}</label>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>



                    
                    <div class="form-group row">
                      <label for="input1" class="col-sm-2 col-form-label">Work Permit</label>
                      <div class="col-sm-10">
                        <div class="row">
                          <div class="col-sm-3">
                            <input type="number" placeholder="number" class="form-control"  name="work" class="form-control form-control-md" value="{{old('work')}}" >
                            @error('work')
                            <label class="error">{{$errors->first('work')}}</label>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            <input type="date" class="form-control"  name="work_issuedate" class="form-control form-control-md" value="{{old('work_issuedate')}}" >
                            @error('work_issuedate')
                            <label class="error">{{$errors->first('work_issuedate')}}</label>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            <input type="date" class="form-control"  name="work_expdate" class="form-control form-control-md" value="{{old('work_expdate')}}" >
                            @error('work_expdate')
                            <label class="error">{{$errors->first('work_expdate')}}</label>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Enter"  name="work_issueat" class="form-control form-control-md" value="{{old('work_issueat')}}">
                            @error('work_issueat')
                            <label class="error">{{$errors->first('work_issueat')}}</label>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>


                    
                    <div class="form-group row">
                      <label for="input1" class="col-sm-2 col-form-label">Driving Licence</label>
                      <div class="col-sm-10">
                        <div class="row">
                          <div class="col-sm-3">
                            <input type="number" placeholder="number" class="form-control"  name="driving" class="form-control form-control-md" value="{{old('driving')}}" >
                            @error('driving')
                            <label class="error">{{$errors->first('driving')}}</label>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            <input type="date" class="form-control"  name="driving_issuedate" class="form-control form-control-md" value="{{old('driving_issuedate')}}" >
                            @error('driving_issuedate')
                            <label class="error">{{$errors->first('driving_issuedate')}}</label>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            <input type="date" class="form-control"  name="driving_expdate" class="form-control form-control-md" value="{{old('driving_expdate')}}" >
                            @error('driving_expdate')
                            <label class="error">{{$errors->first('driving_expdate')}}</label>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Enter"  name="driving_issueat" class="form-control form-control-md" value="{{old('driving_issueat')}}">
                            @error('driving_issueat')
                            <label class="error">{{$errors->first('driving_issueat')}}</label>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>


                    
                    <div class="form-group row">
                      <label for="input1" class="col-sm-2 col-form-label">Vehicle Insurance</label>
                      <div class="col-sm-10">
                        <div class="row">
                          <div class="col-sm-3">
                            <input type="number" placeholder="number" class="form-control"  name="vehicle" class="form-control form-control-md" value="{{old('vehicle')}}" >
                            @error('vehicle')
                            <label class="error">{{$errors->first('vehicle')}}</label>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            <input type="date" class="form-control"  name="vehicle_issuedate" class="form-control form-control-md" value="{{old('vehicle_issuedate')}}" >
                            @error('vehicle_issuedate')
                            <label class="error">{{$errors->first('vehicle_issuedate')}}</label>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            <input type="date" class="form-control"  name="vehicle_expdate" class="form-control form-control-md" value="{{old('vehicle_expdate')}}" >
                            @error('vehicle_expdate')
                            <label class="error">{{$errors->first('vehicle_expdate')}}</label>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Enter"  name="vehicle_issueat" class="form-control form-control-md" value="{{old('vehicle_issueat')}}">
                            @error('vehicle_issueat')
                            <label class="error">{{$errors->first('vehicle_issueat')}}</label>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>


                    
                    <div class="form-group row">
                      <label for="input1" class="col-sm-2 col-form-label">Gosi Number</label>
                      <div class="col-sm-10">
                        <div class="row">
                          <div class="col-sm-3">
                            <input type="number" placeholder="number" class="form-control"  name="gosi_allowance" class="form-control form-control-md" value="{{old('gosi_allowance')}}" >
                            @error('gosi_allowance')
                            <label class="error">{{$errors->first('gosi_allowance')}}</label>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            <input type="date" class="form-control"  name="gosi_issuedate" class="form-control form-control-md" value="{{old('gosi_issuedate')}}" >
                            @error('gosi_issuedate')
                            <label class="error">{{$errors->first('gosi_issuedate')}}</label>
                            @enderror
                          </div>
                          <div class="col-sm-3">
                            {{-- <input type="date" class="form-control"  name="gosi_expdate" class="form-control form-control-md" value="{{old('gosi_expdate')}}" >
                            @error('gosi_expdate')
                            <label class="error">{{$errors->first('gosi_expdate')}}</label>
                            @enderror --}}
                          </div>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Enter"  name="gosi_issueat" class="form-control form-control-md" value="{{old('gosi_issueat')}}">
                            @error('gosi_issueat')
                            <label class="error">{{$errors->first('gosi_issueat')}}</label>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>



                    <div class="form-group row">
                      <label for="input1" class="col-sm-2 col-form-label">Profession at Iqama</label>
                      <div class="col-sm-10">

                          {{-- <div class="col-sm-2"> --}}
                            <input type="text" placeholder="Enter" class="form-control"  name="profession" class="form-control form-control-md" value="{{old('profession')}}" >
                            @error('profession')
                            <label class="error">{{$errors->first('profession')}}</label>
                            @enderror
                          {{-- </div> --}}

                       
                      </div>
                    </div>

{{-- 
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="submit" class="btn btn-success" value="Submit Document"  >

                      </div>
                    </div> --}}


        {{-- </form> --}}
            </div>
      </div>

          
            
      </div>

      {{-- end tab 3 --}}

    </div>
    <div class="tab-pane" id="tab4" role="tabpanel">

      {{-- start --}}

      <div class="container">
        <div class="row">
          <div class="col-md-12">
          {{-- <form  method="POST" action="{{ url('addallowance') }}"> --}}
            {{-- @csrf --}}

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Basic Salary</label>
              <div class="col-sm-9">
                <input placeholder="Enter..."  type="number" class="form-control" name="salary">
                @error('salary')
                <label class="error">{{$errors->first('salary')}}</label>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Housing</label>
              <div class="col-sm-9">
                <input placeholder="Enter..."  type="number" class="form-control" name="housing">
                @error('housing')
                <label class="error">{{$errors->first('housing')}}</label>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Mobile Allowance</label>
              <div class="col-sm-9">
                <input placeholder="Enter..." type="number" class="form-control" name="mobile">
                @error('mobile')
                <label class="error">{{$errors->first('mobile')}}</label>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Badal</label>
              <div class="col-sm-9">
                <input placeholder="Enter..."  type="number" class="form-control" name="badal">
                @error('badal')
                <label  class="error">{{$errors->first('badal')}}</label>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Transport Allowance</label>
              <div class="col-sm-9">
                <input placeholder="Enter..." type="number" class="form-control" name="transport">
                @error('transport')
                <label class="error">{{$errors->first('transport')}}</label>
                @enderror
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Other Allowance</label>
              <div class="col-sm-9">
                <input placeholder="Enter..." type="number" class="form-control" name="other">
                @error('other')
                <label class="error">{{$errors->first('other')}}</label>
                @enderror
              </div>
            </div>
          {{-- </div> --}}
          {{-- <div class="col-md-12"> --}}

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Gosi:</label>
              <div class="col-sm-9">
                <select name="gosi" class="form-control" id="gosi" value="{{old('gosi')}}">
                  @foreach ($insurance as $insurances)
                  <option value="{{ $insurances->name }}">{{ $insurances->name }}</option>
                 @endforeach
                @error('gosi')
                <label class="error">{{$errors->first('gosi')}}</label>
                @enderror
              </select>

              </div>
            </div> 
            
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Eos:</label>
              <div class="col-sm-9">
                <select name="eos" class="form-control" >
                  @foreach ($service as $services)
                  <option value="{{ $services->name }}">{{ $services->name }}</option>
                 @endforeach
                </select>
                @error('eos')
                <label class="error">{{$errors->first('eos')}}</label>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Vacation:</label>
              <div class="col-sm-9">
                <select class="form-control" name="vacation">
                  @foreach ($vacation as $vacations)
                  <option value="{{ $vacations->name }}">{{ $vacations->name }}</option>
                 @endforeach

                  @error('vacation')
                  <label class="error">{{$errors->first('vacation')}}</label>
                  @enderror
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Ticket:</label>
              <div class="col-sm-9">
                <select class="form-control" name="ticket">
                  @foreach ($ticket as $tickets)
                  <option value="{{ $tickets->name }}">{{ $tickets->name }}</option>
                 @endforeach
                </select>
                @error('ticket')
                <label class="error">{{$errors->first('ticket')}}</label>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Housing Allowance:</label>
              <div class="col-sm-9">
                <select class="form-control" name="housing_allowance">
                  <option value="Allowance">Allowance</option>
                </select>
                @error('housing_allowance')
                <label class="error">{{$errors->first('housing_allowance')}}</label>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Family Status:</label>
              <div class="col-sm-9">
                <input class="form-control" name="family"  type="checkbox" value="Family">
 
                @error('family')
                <label class="error">{{$errors->first('family')}}</label>
                @enderror
              </div>
            </div>
            {{-- <div class="form-group row">
              <div class="col-sm-12">
                <input type="submit" class="btn btn-success" value="Submit Allowance"  >

              </div>
            </div>
          </form> --}}

          </div>

        </div>
      </div>
      

      {{-- end --}}
    </div>

    <div class="tab-pane" id="tab5" role="tabpanel">
{{-- start --}}


<div class="container">
  <div class="row">
    <div class="col-md-12">
{{-- <form class="form" action="{{ url('adddependent') }}" method="post"> --}}
  {{-- @csrf --}}
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="name">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Relation</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="relation">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Date of Birth</label>
        <div class="col-sm-9">
          <input type="date" class="form-control" name="dob">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Passport No</label>
        <div class="col-sm-9">
          <input type="number" class="form-control" name="passport_no">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Passport issue date</label>
        <div class="col-sm-9">
          <input type="date" class="form-control" name="pass_issue_date">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Password Expiry date</label>
        <div class="col-sm-9">
          <input type="date" class="form-control" name="pass_expiry_date">
        </div>
      </div>

      {{-- <div class="form-group row">
        <div class="col-sm-12">
          <input type="submit" class="btn btn-success" value="Submit Dependent"  >

        </div>
      </div> --}}
    {{-- </form> --}}

    </div>
  </div>
</div>

{{-- end --}}
    </div>
    <div class="tab-pane" id="tab6" role="tabpanel">
{{-- start --}}


<div class="container">
  <div class="row">
    <div class="col-md-6">
      {{-- <form method="POST" action="{{ url('addmedical') }}"> --}}
      {{-- @csrf --}}
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Medical Card No</label>
        <div class="col-sm-9">
          <input type="number" class="form-control" name="med_card">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Issue date</label>
        <div class="col-sm-9">
          <input type="date" class="form-control" name="issue_date">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Expiry date</label>
        <div class="col-sm-9">
          <input type="date" class="form-control" name="exp_date">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Company</label>
        <div class="col-sm-9">
          <input type="text" style="text-align: right" placeholder="Arabic"  class="form-control" name="company">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Class</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="class">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Blood Group</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="blood">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Note</label>
        <div class="col-sm-9">
          <textarea style="text-align: right" placeholder="Arabic"  type="text" class="form-control" name="notes"></textarea>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Plate No</label>
        <div class="col-sm-9">
          <input type="number" class="form-control" name="plate_no">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Asset No</label>
        <div class="col-sm-9">
          <input type="number" class="form-control" name="asset_no">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Vechile Descripton</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="vechile">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Isthimara Issue date</label>
        <div class="col-sm-9">
          <input type="date" class="form-control" name="isthimara_issue">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Isthimara Expiry date</label>
        <div class="col-sm-9">
          <input type="date" class="form-control" name="isthimara_expiry">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Note</label>
        <div class="col-sm-9">
          <textarea type="text" class="form-control" name="note"></textarea>
        </div>
      </div>

    </div>
    {{-- <div class="form-group row">
      <div class="col-sm-12">
        <input type="submit" class="btn btn-success" value="Submit Medical"  >

      </div>
    </div>
  </form> --}}

  </div>
</div>


{{-- end --}}
    </div>
    <div class="tab-pane" id="tab7" role="tabpanel">

      {{-- start --}}

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            {{-- <form method="post" action="{{ url('addbank') }}" > --}}
            {{-- @csrf --}}
            <div class="form-group row">
              <label  class="col-sm-3 col-form-label">Bank Name</label>
              <div class="col-sm-9">
                <select  class="form-control" name="bank_name">
                  @foreach ($bank as $banks)
                  <option value="{{ $banks->arabic_name }}">{{ $banks->arabic_name }}</option>
                    
                  @endforeach
                </select>
                {{-- <input placeholder="In Arabic" style="text-align: right"  type="text"> --}}
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Account No</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" name="account_no">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Branch Name</label>
              <div class="col-sm-9">
                <input placeholder="In Arabic" style="text-align: right"   type="text" class="form-control" name="branch_name">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Account Code</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" name="account_code">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Bank Code</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="bank_code">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Note</label>
              <div class="col-sm-9">
                <textarea type="text" class="form-control" name="notes_bank"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">IP Address(PC)</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="address">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Summary</label>
              <div class="col-sm-9">
                <textarea type="text" class="form-control" name="summary"></textarea>
              </div>
            </div> 

            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Reason For Edit</label>
              <div class="col-sm-9">
                <textarea type="text" class="form-control" name="reason"></textarea>
              </div>
            </div> 

            <div class="form-group row">
              {{-- <label for="inputName" class="col-sm-4 col-form-label">Submit:</label> --}}
              <div class="col-sm-12">
                <input type="submit" class="btn btn-success" value="Submit"  >
      
              </div>
            </div>

</form>
          </div>

        </div>
      </div>
      
      {{-- end --}}

    </div>



  </div>

</div>
</div>
</div>
  
  <!-- HTML code for the submit button -->
  {{-- <button type="button" class="btn btn-primary" id="submit-all">Submit All</button> --}}
  

  
                        

                   
                    {{-- <div class="row">
                        <div class="col-md-6">
                        <label>Date of Birth</label>
                        <div class="form-group">
                            <input type="date" name="date_of_birth" class="form-control date" placeholder="dd/mm/yyyy" value="{{old('date_of_birth')}}">
                        </div>

                        <label>Gender</label>
                        <div class="form-group">
                            <div class="radio inlineblock m-r-20">
                                <input type="radio" name="gender" id="Male" class="with-gap" value="male" {{old('gender') == 'male' ? 'checked':null}}>
                                <label for="Male">Male</label>
                            </div>
                            <div class="radio inlineblock">
                                <input type="radio" name="gender" id="Female" class="with-gap" value="female" {{old('gender') == 'female' ? 'checked':null}}>
                                <label for="Female">Female</label>
                            </div>
                            <br>
                            @error('gender')
                                <label class="error">{{$errors->first('gender')}}</label>
                            @enderror
                        </div>
                       </div>
                            <div class="col-md-6">
                        <label>Nationality</label>
                        <div class="form-group">
                            <input type="text" name="nationality" class="form-control form-control-sm" value="{{old('nationality')}}">
                        </div>
                        <label>Province/State</label>
                        <div class="form-group">
                            <input type="text" name="province_state" class="form-control form-control-sm" value="{{old('province_state')}}">
                        </div>
                        </div>
             
                       </div>
                       <div class="row">
                           <div class="col-md-6">
                        <label>Qualification</label>
                        <div class="form-group">
                            <input type="text" name="qualification" class="form-control form-control-sm" value="{{old('qualification')}}">
                        </div>
                         <label>Designations</label>
                        
                        <div class="form-group">
                            
                             <select name="designation_id" class="form-control">
                                  @foreach($designations as $rows)
                                <option value="{{$rows->id}}" >{{$rows->title}}</option>
                                   @endforeach
                            </select>
                            <!--<input type="text" name="qualification" class="form-control form-control-sm" value="{{old('designations')}}">-->
                           
                        </div>
                           
                         
                                                    <label>Salary</label>
                        <div class="form-group">
                            <input type="number" name="salary" class="form-control form-control-sm" value="{{old('salary')}}">
                            @error('salary')
                                <label class="error">{{$errors->first('salary')}}</label>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <label>Marital Status</label>
                        <div class="form-group">
                            <select name="marital_status" class="form-control form-control-sm show-tick">
                                <option value="unmarried" {{old('marital_status') == 'unmarried' ? 'selected':null}}>Unmarried</option>
                                <option value="married" {{old('marital_status') == 'married' ? 'selected':null}}>Married</option>
                            </select>
                        </div>
                           <label>Postal/Zip Code</label>
                        <div class="form-group">
                            <input type="number" name="postal_code" class="form-control form-control-sm" value="{{old('postal_code')}}">
                        </div>
                        </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-6">
                        <label>CNIC <small>(without dash)</small></label>
                        <div class="form-group">
                            <input type="number" name="cnic" minlength="14" class="form-control form-control-sm" placeholder="Ex:42101542517561" value="{{old('cnic')}}">
                            @error('cnic')
                                <label class="error">{{$errors->first('cnic')}}</label>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                              <label>Home Phone</label>
                        <div class="form-group">
                            <input type="text" name="home_phone" class="form-control form-control-sm" value="{{old('home_phone')}}">
                        </div>
                        </div>
                        </div>
                        
                        <div class="row">
                       <div class="col-md-6">
                               <h6>Remarks</h6>
                        <hr>
                        <textarea class="summernote" name="notes">{{old('notes')}}</textarea>
                        <br>
                         <h6>Document Attachment</h6>
                        <hr>
                        <div class="form-group">
                            <label>File Attachment</label>
                            <input type="file" name="file" multiple id="fileuploader" accept=".docx, .doc, .pdf, .csv, .png, .jpeg, .jpg, .pptx, .xls, .xlsx"/>
                        </div>
                        <h6>Profile Image</h6>
                        <hr>
                                <div class="form-group">
                                    <input type="file" name="profile_image" class="dropify" data-allowed-file-extensions="png jpg jpeg" accept=".png, .jpg, .jpeg">
                                </div>
                            </div>
                      <div class="col-md-6">
                        <label>Emergency Contact</label>
                        <div class="form-group">
                            <input type="number" name="emergency_contact" class="form-control form-control-sm" value="{{old('emergency_contact')}}">
                           </div>
                           <label>Other Email</label>
                        <div class="form-group">
                            <input type="email" name="other_email" class="form-control form-control-sm" value="{{old('other_email')}}">
                        </div>
                          <h6>Job info</h6>
                            <h6>Job Status</h6>
                        <hr>
                        <label>Job Status</label>
                        <div class="form-group">
                            <select name="job_status" id="job-status" class="form-control form-control-sm show-tick">
                                <option value="Full Time" {{old('job_status') == 'Full Time' ? 'selected':null}}>Full Time</option>
                                <option value="Part Time" {{old('job_status') == 'Part Time' ? 'selected':null}}>Part Time</option>
                                <option value="Remote" {{old('job_status') == 'Remote' ? 'selected':null}}>Remote</option>
                                <option value="Internship" {{old('job_status') == 'Internship' ? 'selected':null}}>Internship</option>
                            </select>
                            @error('job_status')
                                <label class="error">{{$errors->first('job_status')}}</label>
                            @enderror
                        </div>
                       
                       <label>Supervisor</label>
                        <div class="form-group">
                            <select name="employee_id" class="form-control show-tick ms select2" data-placeholder="Select">
                                <option></option>
                                @foreach ($employees as $employee)
                                    <option value="{{$employee->id}}" {{old('employee_id') == $employee->id ? 'selected':null}}>{{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}}</option>
                                @endforeach
                            </select>
                            @error('employee_id')
                                <label class="error">{{$errors->first('employee_id')}}</label>
                            @enderror
                        </div>
                       
                          <label>Joining Date</label>
                        <div class="form-group">
                            <input type="date" name="joining_date" 
                            id="selectedDate" class="form-control" placeholder="dd/mm/yyyy" value="" onchange="something()">
                        </div>
                        
                            <div id="pp">
                            <label>Probation Period Start</label>
                            <div class="form-group ">
                                <input type="date" name="probation_period_start" id="probation_period_start" class="form-control"  placeholder="dd/mm/yyyy" value="{{old('probation_period_start')}}">
                            </div>
                                 <label>Probation Period End</label>
                            <div class="form-group ">
                                <input type="date" name="probation_period_end" id="probation_period_end" class="form-control" placeholder="dd/mm/yyyy" value="{{old('probation_period_end')}}">
                            </div>
                        </div>
                          <div id="ip" style="display:none;">
                        <label>Internship Period Start</label>
                        <div class="form-group input-group masked-input">
                            <input type="date" name="internship_period_start" id="internship_period_start" class="form-control" placeholder="dd/mm/yyyy" value="{{old('joining_date')}}">
                        </div>

                        <label>Internship Period End</label>
                        <div class="form-group">
                            <input type="date" name="internship_period_end" id="internship_period_end"  class="form-control" placeholder="dd/mm/yyyy" value="{{old('internship_period_end')}}">
                        </div>
                        </div>
                    
                        <label>Working Time Start</label>
                        <div class="form-group">
                            <input type="time" name="working_time_start" class="form-control" placeholder="Ex: 11:59 pm" value="{{old('working_time_start')}}">
                        </div>
                       <label>Working Time End</label>
                            <div class="form-group">
                                <input type="time" name="working_time_end" class="form-control" placeholder="Ex: 11:59 pm" value="{{old('working_time_end')}}">
                            </div>
                        
                        <label>Address</label>
                        <div class="form-group">
                            <textarea type="text" name="address" class="form-control form-control-sm">{{old('address')}}</textarea>
                        </div>
                            </div>

                        
                        
                        

                          <div id="ip" style="display:none;">
                        <label>Internship Period Start</label>
                        <div class="form-group input-group masked-input">
                            <input type="date" name="internship_period_start" class="form-control" placeholder="dd/mm/yyyy" value="{{old('internship_period_start')}}">
                        </div>

                        <label>Internship Period End</label>
                        <div class="form-group">
                            <input type="date" name="internship_period_end" class="form-control" placeholder="dd/mm/yyyy" value="{{old('internship_period_end')}}">
                        </div>
                        </div>
                        
                        
                     <div class="container">
                                 <div class="col-md-12 text-center">
                                          <button type="submit" class="btn btn-primary" id="save-btn">Save</button>
        </div>
    </div>
                          
                            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif    
                               <style>
                               #save-btn{
                                width:180px;
                               height: 40px;
                               font-size: 15px;;
                            }
                             </style>

                       

                      


                        <!--<label style="color:red;">Termination Date</label>-->
                        <!--<div class="form-group">-->
                        <!--    <input type="date" name="termination_date" class="form-control" placeholder="dd/mm/yyyy" value="{{old('termination_date')}}">-->
                        <!--</div>-->

                    <!--</div>-->
                    <!--<div class="col-md-6">-->
                    <!--    <h6>Address</h6>-->
                    <!--    <hr>-->
                    <!--    <label>Country</label>-->
                    <!--    <div class="form-group">-->
                    <!--        <input type="text" name="country" class="form-control form-control-sm" value="{{old('country')}}">-->
                    <!--    </div>-->

                    <!--    <label>Province/State</label>-->
                    <!--    <div class="form-group">-->
                    <!--        <input type="text" name="province_state" class="form-control form-control-sm" value="{{old('province_state')}}">-->
                    <!--    </div>-->

                    <!--    <label>City</label>-->
                    <!--    <div class="form-group">-->
                    <!--        <input type="text" name="city" class="form-control form-control-sm" value="{{old('city')}}">-->
                    <!--    </div>-->

                    <!--    <label>Nationality</label>-->
                    <!--    <div class="form-group">-->
                    <!--        <input type="text" name="nationality" class="form-control form-control-sm" value="{{old('nationality')}}">-->
                    <!--    </div>-->

                    <!--    <label>Postal/Zip Code</label>-->
                    <!--    <div class="form-group">-->
                    <!--        <input type="number" name="postal_code" class="form-control form-control-sm" value="{{old('postal_code')}}">-->
                    <!--    </div>-->

                    <!--    <label>Address</label>-->
                    <!--    <div class="form-group">-->
                    <!--        <textarea type="text" name="address" class="form-control form-control-sm">{{old('address')}}</textarea>-->
                    <!--    </div>-->

                    <!--    <h6>Notes</h6>-->
                    <!--    <hr>-->
                    <!--    <textarea class="summernote" name="notes">{{old('notes')}}</textarea>-->
                    <!--    <br>-->

                    <!--    <h6>Document Attachment</h6>-->
                    <!--    <hr>-->
                    <!--    <div class="form-group">-->
                    <!--        <label>File Attachment</label>-->
                    <!--        <input type="file" name="file" multiple id="fileuploader" accept=".docx, .doc, .pdf, .csv, .png, .jpeg, .jpg, .pptx, .xls, .xlsx"/>-->
                    <!--    </div>-->



                        <!--<h6>Job Status</h6>-->
                        <!--<hr>-->
                        <!--<label>Job Status</label>-->
                        <!--<div class="form-group">-->
                        <!--    <select name="job_status" id="job-status" class="form-control form-control-sm show-tick">-->
                        <!--        <option value="Full Time" {{old('job_status') == 'Full Time' ? 'selected':null}}>Full Time</option>-->
                        <!--        <option value="Part Time" {{old('job_status') == 'Part Time' ? 'selected':null}}>Part Time</option>-->
                        <!--        <option value="Remote" {{old('job_status') == 'Remote' ? 'selected':null}}>Remote</option>-->
                        <!--        <option value="Internship" {{old('job_status') == 'Internship' ? 'selected':null}}>Internship</option>-->
                        <!--    </select>-->
                        <!--    @error('job_status')-->
                        <!--        <label class="error">{{$errors->first('job_status')}}</label>-->
                        <!--    @enderror-->
                        <!--</div>-->

                        <!--<div id="ip" style="display:none;">-->
                        <!--<label>Internship Period Start</label>-->
                        <!--<div class="form-group input-group masked-input">-->
                        <!--    <input type="date" name="internship_period_start" class="form-control" placeholder="dd/mm/yyyy" value="{{old('internship_period_start')}}">-->
                        <!--</div>-->

                        <!--<label>Internship Period End</label>-->
                        <!--<div class="form-group">-->
                        <!--    <input type="date" name="internship_period_end" class="form-control" placeholder="dd/mm/yyyy" value="{{old('internship_period_end')}}">-->
                        <!--</div>-->
                        <!--</div>-->

                        <!--<div id="pp">-->
                        <!--<label>Probation Period Start</label>-->
                        <!--<div class="form-group">-->
                        <!--    <input type="date" name="probation_period_start" class="form-control" placeholder="dd/mm/yyyy" value="{{old('probation_period_start')}}">-->
                        <!--</div>-->

                        <!--<label>Probation Period End</label>-->
                        <!--<div class="form-group">-->
                        <!--    <input type="date" name="probation_period_end" class="form-control" placeholder="dd/mm/yyyy" value="{{old('probation_period_end')}}">-->
                        <!--</div>-->
                        <!--</div>-->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div> --}}
@stop


@section('page-script')
<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>

<script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
<script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/dropify.js')}}"></script>
<script src="{{asset('assets/plugins/fileuploader/jquery.fileuploader.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

<script src="{{asset('assets/urdutextbox.js')}}"></script>
<script>

    window.onload = myOnload;

    function myOnload(evt){
      MakeTextBoxUrduEnabled(txtBox01);//enable arabic in html text box
      MakeTextBoxUrduEnabled(txtBox02);//enable arabic in html text box
      MakeTextBoxUrduEnabled(txtBox03);//enable arabic in html text box
      MakeTextBoxUrduEnabled(txtBox04);//enable arabic in html text box
      MakeTextBoxUrduEnabled(txtBox06);//enable arabic in html text box
      MakeTextBoxUrduEnabled(txtBox07);//enable arabic in html text box
      MakeTextBoxUrduEnabled(txtBox08);//enable arabic in html text box
      MakeTextBoxUrduEnabled(txtBox09);//enable arabic in html text box





    //   MakeTextBoxUrduEnabled(txtBoxes);//enable arabic in html text box
    }
</script>

<script type="text/javascript">

 function something() {
     
     
            var joining_date = document.getElementById('selectedDate').value;
            $("#probation_period_start").val(joining_date);
            $("#internship_period_start").val(joining_date);
            // format date first
            var format_date = moment(joining_date).format('DD.MM.YYYY');
            var new_date = moment(format_date, "DD.MM.YYYY");
            new_date.add(90, 'days');
            var formated_newDate = moment(new_date).format('YYYY-MM-DD');
            $("#probation_period_end").val(formated_newDate);
            $("#internship_period_end").val(formated_newDate);
           
        
    }
</script>
@stop

@push('after-scripts')
<script>
    $("#job-status").change( function() {
    var selectedValue = $(this).val();

    if (selectedValue == "Internship") {
        $('#ip').show();
        $('#pp').hide();
    }
    else if(selectedValue == "Full Time"){
        $('#pp').show();
        $('#ip').hide();
    }
    else{
        $('#pp').show();
        $('#ip').hide();
    }

});
</script>




<script>
    // enable fileuploader plugin
    $('#fileuploader').fileuploader({
            addMore: true
    });
</script>



@endpush

