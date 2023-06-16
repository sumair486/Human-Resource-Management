@extends('layouts.master')
@section('title', 'Profile')
@section('content')
<div class="row clearfix">
    <div class="col-xl-4 col-lg-12 col-md-12">
        <div class="card mcard_3">
            <div class="body">
                <a href="javascript:void(0);">
                    {{-- <img src="{{ asset('employee_contact/'.$employee->image)  }}"> --}}
                    <img src="{{$employee->image ? asset('employee_contact/'.$employee->image) : asset('img/no_image.png')}}" class="rounded-circle" alt="profile-image" width="200" height="200">
                </a>
                <h5 class="m-t-10 mt-4">{{$employee->first_name.' '.$employee->family_name}}</h5>

                <div class="row">
                    <div class="col-12">
                        {{-- <ul class="social-links list-unstyled">
                            <li><a title="facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                            <li><a title="twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                            <li><a title="instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                        </ul> --}}
                        <a href="{{url('employee/'.$employee->id.'/edit')}}"><small><i class="fas fa-pencil-alt"></i> Edit</small></a>
                        <p class="text-muted mt-3">{{$employee->employee_no}}</p>
                        {{-- <p class="text-muted">{{$employee->email}}</p>
                        <p class="text-muted">{{$employee->mobile_no}}</p> --}}
                    </div>
                    {{-- <div class="col-4">
                        <small>Following</small>
                        <h5>852</h5>
                    </div>
                    <div class="col-4">
                        <small>Followers</small>
                        <h5>13k</h5>
                    </div>
                    <div class="col-4">
                        <small>Post</small>
                        <h5>234</h5>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="card">
            <div class="body">
                {{-- <small class="text-muted">Reviews: </small>
                <p>
                    <i class="text-warning zmdi zmdi-star"></i>
                    <i class="text-warning zmdi zmdi-star"></i>
                    <i class="text-warning zmdi zmdi-star"></i>
                    <i class="text-warning zmdi zmdi-star"></i>
                    <i class="text-warning zmdi zmdi-star-half"></i>
                </p>
                <hr> --}}
                <p class="text-muted">Employee Info </p>
                <small class="text-muted">First Name: </small>
                <p>{{$employee->first_name}}</p>
               
                {{-- <p>{{$employee->date_of_birth ? date('j F, Y', strtotime($employee->date_of_birth)) : null}}</p> --}}
                <small class="text-muted">Middle Name: </small>
                <p>{{$employee->middle_name}}</p>
                <small class="text-muted">Family Name: </small>
                <p>{{$employee->family_name}}</p>
                <small class="text-muted">First Name(Arabic): </small>
                <p>{{$employee->first_name_arb}}</p>
                <small class="text-muted">Middle Name(Arabic): </small>
                <p>{{$employee->middle_name_arb}}</p>
                <small class="text-muted">Family Name(Arabic): </small>
                <p>{{$employee->family_name_arb}}</p>
                <small class="text-muted">Grand Name(Arabic): </small>
                <p>{{$employee->grand_name_arb}}</p>
                {{-- <span>React and many other platforms.</span> --}}
                {{-- <hr>
                <ul class="list-unstyled">
                    <li>
                        <div>Angular</div>
                        <div class="progress m-b-20">
                            <div class="progress-bar l-blush" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%"> <span class="sr-only">56% Complete</span> </div>
                        </div>
                    </li>
                    <li>
                        <div>Laravel</div>
                        <div class="progress m-b-20">
                            <div class="progress-bar l-purple " role="progressbar" aria-valuenow="91" aria-valuemin="0" aria-valuemax="100" style="width: 91%"> <span class="sr-only">87% Complete</span> </div>
                        </div>
                    </li>
                    <li>
                        <div>Photoshop</div>
                        <div class="progress m-b-20">
                            <div class="progress-bar l-blue " role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%"> <span class="sr-only">62% Complete</span> </div>
                        </div>
                    </li>
                    <li>
                        <div>Wordpress</div>
                        <div class="progress m-b-20">
                            <div class="progress-bar l-green " role="progressbar" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100" style="width: 63%"> <span class="sr-only">87% Complete</span> </div>
                        </div>
                    </li>
                    <li>
                        <div>FrontEnd</div>
                        <div class="progress m-b-20">
                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%"> <span class="sr-only">32% Complete</span> </div>
                        </div>
                    </li>
                </ul> --}}

            </div>
        </div>

        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    <p class="mt-3">Allowance</p>
                    <small class="text-muted">Basic Salary: </small>
                    <p>{{$employee->salary}}</p>
                    <small class="text-muted">Housing: </small>
                    <p>{{$employee->housing}}</p>
                    <small class="text-muted">Mobile Allowance: </small>
                    <p>{{$employee->mobile}}</p>
                    <small class="text-muted">Badal: </small>
                    <p>{{$employee->badal}}</p>
                    <small class="text-muted">Transport Allowance: </small>
                    <p>{{$employee->transport}}</p>
                    <small class="text-muted">Other Allowance: </small>
                    <p>{{$employee->other}}</p>

                    <small class="text-muted">Gosi: </small>
                    <p>{{$employee->gosi}}</p>
                    <small class="text-muted">Eos: </small>
                    <p>{{$employee->eos}}</p>
                    <small class="text-muted">Vacation: </small>
                    <p>{{$employee->vacation}}</p>
                    <small class="text-muted">Ticket: </small>
                    <p>{{$employee->ticket}}</p>

                    <small class="text-muted">Housing Allowance: </small>
                    <p>{{$employee->housing_allowance}}</p>
                    <small class="text-muted">Family Status: </small>
                    <p>{{$employee->family}}</p>
                   
                </div>
            </div>
        </div>


        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    <p class="mt-3">Dependent</p>
                    <small class="text-muted">Name: </small>
                    <p>{{$employee->name}}</p>
                    <small class="text-muted">Relation: </small>
                    <p>{{$employee->relation}}</p>
                    <small class="text-muted">Date of Birth: </small>
                    <p>{{$employee->dob}}</p>
                    <small class="text-muted">Passport No: </small>
                    <p>{{$employee->passport_no}}</p>
                    <small class="text-muted">Passport issue date: </small>
                    <p>{{$employee->pass_issue_date}}</p>
                    <small class="text-muted">Password Expiry date: </small>
                    <p>{{$employee->pass_expiry_date}}</p>

                   

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-12 col-md-12">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="body">
                        <p class="mt-3">General</p>
                        <small class="text-muted">DOB: </small>
                        <p>{{$employee->date_of_birth}}</p>

                        <small class="text-muted">Gender: </small>
                        <p>{{$employee->gender}}</p>

                        <small class="text-muted">Nationality</small>
                        <p>{{$employee->nationality}}</p>

                        <small class="text-muted">Religion: </small>
                        <p>{{$employee->religion}}</p>

                        <small class="text-muted">Basic Qualification: </small>
                        <p>{{$employee->qualification}}</p>

                        <small class="text-muted">Profession</small>
                        <p>{{$employee->professions}}</p>

                        <small class="text-muted">Martial Status: </small>
                        <p>{{$employee->martial_status}}</p>

                        <small class="text-muted">Additon Skills: </small>
                        <p>{{$employee->addition_skills}}</p>

                        <small class="text-muted">Telephone/Mobile</small>
                        <p>{{$employee->phone}}</p>

                        <small class="text-muted">Email: </small>
                        <p>{{$employee->email}}</p>

                        <small class="text-muted">Sponsor: </small>
                        <p>{{$employee->sponsor}}</p>

                        <small class="text-muted">Type of sponsor</small>
                        <p>{{$employee->type_of_sponsor}}</p>

                        <small class="text-muted">Address(Kingdom): </small>
                        <p>{{$employee->address_kingdom}}</p>

                        <small class="text-muted">Address(Abroad): </small>
                        <p>{{$employee->address_abroad}}</p>

                       
                        
                        
                    </div>
                </div>
                <div class="card">
                    <div class="body">
                        <p class="mt-3">Contract</p>
                        <small class="text-muted">Contract period: </small>
                        <p>{!!$employee->contract_period!!}</p>
                        <small class="text-muted">Join Date: </small>
                        <p>{!!$employee->join_date!!}</p>
                        <small class="text-muted">Expiry Date: </small>
                        <p>{!!$employee->expiry_date!!}</p>
                        <small class="text-muted">Active Form: </small>
                        <p>{!!$employee->active_form!!}</p>
                        <small class="text-muted">family Mamber: </small>
                        <p>{!!$employee->family_mamber!!}</p>
                        <small class="text-muted">No of Tickets: </small>
                        <p>{!!$employee->no_of_ticket!!}</p>
                        <small class="text-muted">Ticket Values: </small>
                        <p>{!!$employee->ticket_values!!}</p>
                        <small class="text-muted">Totals: </small>
                        <p>{!!$employee->total!!}</p>
                        <small class="text-muted">Notes: </small>
                        <p>{!!$employee->notes_contract!!}</p>
                        <small class="text-muted">Company: </small>
                        <p>{!!$employee->company_contract!!}</p>
                        <small class="text-muted">Division: </small>
                        <p>{!!$employee->division!!}</p>
                        
                        <small class="text-muted">Branch: </small>
                        <p>{!!$employee->branch!!}</p>
                        <small class="text-muted">Department: </small>
                        <p>{!!$employee->department!!}</p>
                        <small class="text-muted">Job Title: </small>
                        <p>{!!$employee->job_title!!}</p>
                        <small class="text-muted">Category: </small>
                        <p>{!!$employee->category!!}</p>
                        <small class="text-muted">Allocation: </small>
                        <p>{!!$employee->allocation!!}</p>
                        
                        <small class="text-muted">GL Code: </small>
                        <p>{!!$employee->gl_code!!}</p>
                        <small class="text-muted">For Index: </small>
                        <p>{!!$employee->for_index!!}</p>
                        <small class="text-muted">Hijri: </small>
                        <p>{!!$employee->hijri_1!!}</p>
                        <small class="text-muted">(Hijri: </small>
                        <p>{!!$employee->hijri_2!!}</p>
                        <small class="text-muted">Status: </small>
                        <p>{!!$employee->statuses!!}</p>
                        
                    


                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="body">
                        <p class="mt-3">Document</p>
                        <small class="text-muted">passport: </small>
                        <p>{{$employee->passport}}</p>
                        <small class="text-muted">Passport Issue date: </small>
                        <p>{{$employee->passport_issuedate}}</p>
                        <small class="text-muted">Passport Expiry date: </small>
                        <p>{{$employee->passport_expdate}}</p>
                        <small class="text-muted">Passport Issue at: </small>
                        <p>{{$employee->passport_issueat}}</p>
                        <small class="text-muted">Iqama/Id: </small>
                        <p>{{$employee->Iqama}}</p>
                        <small class="text-muted">Iqama Issue date: </small>
                        <p>{{$employee->Iqama_issuedate}}</p>
                        <small class="text-muted">Iqama Expiry date: </small>
                        <p>{{$employee->Iqama_expdate}}</p>
                        <small class="text-muted">Iqama Issue at: </small>
                        <p>{{$employee->Iqama_issueat}}</p>
                        <small class="text-muted">Work Permit: </small>
                        <p>{{$employee->work}}</p>
                        <small class="text-muted">Work Issue date: </small>
                        <p>{{$employee->work_issuedate}}</p>
                        <small class="text-muted">Work Expiry date:: </small>
                        <p>{{$employee->work_expdate}}</p>
                        <small class="text-muted">Work Issue at: </small>
                        <p>{{$employee->work_issueat}}</p>

                        <small class="text-muted">Driving Licence: </small>
                        <p>{{$employee->driving}}</p>
                        <small class="text-muted">Driving issue date: </small>
                        <p>{{$employee->driving_issuedate}}</p>
                        <small class="text-muted">Driving Expiry date: </small>
                        <p>{{$employee->driving_expdate}}</p>
                        <small class="text-muted">Driving Issue at: </small>
                        <p>{{$employee->driving_issueat}}</p>
                        <small class="text-muted">Vehicle Insurance: </small>
                        <p>{{$employee->vehicle}}</p>
                        <small class="text-muted">Vehicle Issue date: </small>
                        <p>{{$employee->vehicle_issuedate}}</p>
                        <small class="text-muted">Vehicle Expiry date:: </small>
                        <p>{{$employee->vehicle_expdate}}</p>
                        <small class="text-muted">Vehicle Issue at: </small>
                        <p>{{$employee->vehicle_issueat}}</p>

                        <small class="text-muted">Gosi Number: </small>
                        <p>{{$employee->gosi_allowance}}</p>
                        <small class="text-muted">Gosi Issue date: </small>
                        <p>{{$employee->gosi_issuedate}}</p>
                        <small class="text-muted">Gosi Issue at: </small>
                        <p>{{$employee->gosi_issueat}}</p>

                        <small class="text-muted">Profession at Iqama: </small>
                        <p>{{$employee->profession}}</p>
                    </div>
                </div>

                <div class="card">
                    <div class="body">
                        <p class="mt-3">Medical/Car</p>
                        <small class="text-muted">Medical Card No: </small>
                        <p>{{$employee->med_card}}</p>
                        <small class="text-muted">Issue date: </small>
                        <p>{{$employee->issue_date}}</p>
                        <small class="text-muted">Expiry date: </small>
                        <p>{{$employee->exp_date}}</p>
                        <small class="text-muted">Company: </small>
                        <p>{{$employee->company}}</p>
                        <small class="text-muted">Class: </small>
                        <p>{{$employee->class}}</p>
                        <small class="text-muted">Blood Group: </small>
                        <p>{{$employee->blood}}</p>

                        <small class="text-muted">Note: </small>
                        <p>{{$employee->notes}}</p>
                        <small class="text-muted">Plate No: </small>
                        <p>{{$employee->plate_no}}</p>
                        <small class="text-muted">Asset No: </small>
                        <p>{{$employee->asset_no}}</p>
                        <small class="text-muted">Vechile Descripton: </small>
                        <p>{{$employee->vechile}}</p>
                        <small class="text-muted">Isthimara Issue date: </small>
                        <p>{{$employee->isthimara_issue}}</p>

                        <small class="text-muted">Isthimara Expiry date: </small>
                        <p>{{$employee->isthimara_expiry}}</p>
                        <small class="text-muted">Note: </small>
                        <p>{{$employee->note}}</p>
                       

                    </div>
                </div>

            </div>

           

            <div class="col-md-6 col-sm-6">
                <div class="card">
                    <div class="header">
                        <h2></h2>
                    </div>
                    <div class="body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                <p class="mt-1">Bank</p>

                                <small class="text-muted">Bank Name: </small>
                                <p>{{$employee->bank_name}}</p>

                                <small class="text-muted">Account No: </small>
                                <p>{{$employee->account_no}}</p>

                                <small class="text-muted">Branch Name: </small>
                                <p>{{$employee->branch_name }}</p>

                                <small class="text-muted">Account Code: </small>
                                <p>{{$employee->account_code}}</p>

                                <small class="text-muted">Bank Code: </small>
                                <p>{{$employee->bank_code}}</p>

                                <small class="text-muted">Note: </small>
                                <p>{{$employee->notes_bank}}</p>

                                <small class="text-muted">IP Address(PC): </small>
                                <p>{{$employee->address }}</p>

                                <small class="text-muted">Summary: </small>
                                <p>{{$employee->summary }}</p>
                            </div>
                            {{-- <div class="col-md-6 col-sm-12">
                                <p class="mt-3">Employee Job Status</p>

                                <small class="text-muted">Job Status: </small>
                                <p>{{$employee->job_status}}</p>

                                @if ($employee->job_status == 'Full Time' || $employee->job_status == 'Part Time' || $employee->job_status == 'Remote')
                                <small class="text-muted">Probation Period Start: </small>
                                <p>{{$employee->probation_period_start ? date('j F, Y', strtotime($employee->probation_period_start)):null}}</p>
                                <small class="text-muted">Probation Period End: </small>
                                <p>{{$employee->probation_period_end ?  date('j F, Y', strtotime($employee->probation_period_end)):null}}</p>
                                @endif

                                @if ($employee->job_status == 'Internship')
                                <small class="text-muted">Internship Period Start: </small>
                                <p>{{$employee->internship_period_start ? date('j F, Y', strtotime($employee->internship_period_start)):null}}</p>
                                <small class="text-muted">Internship Period End: </small>
                                <p>{{$employee->probation_period_end ? date('j F, Y', strtotime($employee->internship_period_end)):null}}</p>
                                @endif
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
