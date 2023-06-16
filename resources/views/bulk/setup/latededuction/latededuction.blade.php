@extends('layouts.master')
@section('title', 'Late Deduction')
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
                <h2>Add Late Deduction</h2>
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
                <form action="{{ url('latededuction') }}" method="post">
                @csrf
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" placeholder="In English" name="name" class="form-control form-control-sm" value="{{old('name')}}">
                            @error('name')
                                <label class="error">{{$errors->first('name')}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Name</label>
                            <input style="text-align:right;" type="text" id="txtBox1"  placeholder="In Arabic" name="arabic_name" class="form-control form-control-sm" value="{{old('arabic_name')}}">
                            @error('arabic_name')
                                <label class="error">{{$errors->first('arabic_name')}}</label>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row clearfix">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Consider</label>
                            <input type="number" class="form-control form-control-sm"  name="consider"  value="{{old('consider')}}">
                            @error('consider')
                                <label class="error">{{$errors->first('consider')}}</label>
                            @enderror
                        </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Rate 1</label>
                            <input type="number"   placeholder="00.00%" name="rate_1" class="form-control form-control-sm" value="{{old('rate_1')}}">
                            @error('rate_1')
                                <label class="error">{{$errors->first('rate_1')}}</label>
                            @enderror
                        </div>
                    </div>


                </div>

                <div class="row clearfix">

                <div class="col-md-4">
                    <div class="form-group">
                        
                        <label >Hour Rate</label> 
                        <input type="checkbox"  value="Hour Rate"  name="hour_rate"  value="{{old('hour_rate')}}">
                        @error('hour_rate')
                            <label class="error">{{$errors->first('hour_rate')}}</label>
                        @enderror
                    </div>
                </div>
                </div>
{{-- 15 --}}
<h4>Late upto 15min</h4>

                <div class="row clearfix">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First day</label>
                            <input type="number" placeholder="00.00%"  name="first_day_1" class="form-control form-control-sm"  value="{{old('first_day_1')}}">
                            @error('first_day_1')
                                <label class="error">{{$errors->first('first_day_1')}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Second Day</label>
                            <input type="number"   placeholder="00.00%" name="second_day_1" class="form-control form-control-sm" value="{{old('second_day_1')}}">
                            @error('second_day_1')
                                <label class="error">{{$errors->first('second_day_1')}}</label>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Third day</label>
                            <input type="number" placeholder="00.00%"  name="third_day_1" class="form-control form-control-sm"  value="{{old('third_day_1')}}">
                            @error('third_day_1')
                                <label class="error">{{$errors->first('third_day_1')}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Fourth Day</label>
                            <input type="number"   placeholder="00.00%" name="fourth_day_1" class="form-control form-control-sm" value="{{old('fourth_day_1')}}">
                            @error('fourth_day_1')
                                <label class="error">{{$errors->first('fourth_day_1')}}</label>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- 15 30 --}}
<h4>Late upto 15-30 min</h4>


                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            
                            <label>First day</label>
                            <input type="number" placeholder="00.00%"  name="first_day_2" class="form-control form-control-sm"  value="{{old('first_day_2')}}">
                            @error('first_day_2')
                                <label class="error">{{$errors->first('first_day_2')}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Second Day</label>
                            <input type="number"   placeholder="00.00%" name="second_day_2" class="form-control form-control-sm" value="{{old('second_day_2')}}">
                            @error('second_day_2')
                                <label class="error">{{$errors->first('second_day_2')}}</label>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Third day</label>
                            <input type="number" placeholder="00.00%"  name="third_day_2" class="form-control form-control-sm"  value="{{old('third_day_2')}}">
                            @error('third_day_2')
                                <label class="error">{{$errors->first('third_day_2')}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Fourth Day</label>
                            <input type="number"   placeholder="00.00%" name="fourth_day_2" class="form-control form-control-sm" value="{{old('fourth_day_2')}}">
                            @error('fourth_day_2')
                                <label class="error">{{$errors->first('fourth_day_2')}}</label>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- 30 60 --}}

<h4>Late upto 30-60 min</h4>


                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First day</label>
                            <input type="number" placeholder="00.00%"  name="first_day_3" class="form-control form-control-sm"  value="{{old('first_day_3')}}">
                            @error('first_day_3')
                                <label class="error">{{$errors->first('first_day_3')}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Second Day</label>
                            <input type="number"   placeholder="00.00%" name="second_day_3" class="form-control form-control-sm" value="{{old('second_day_3')}}">
                            @error('second_day_3')
                                <label class="error">{{$errors->first('second_day_3')}}</label>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Third day</label>
                            <input type="number" placeholder="00.00%"  name="third_day_3" class="form-control form-control-sm"  value="{{old('third_day_3')}}">
                            @error('third_day_3')
                                <label class="error">{{$errors->first('third_day_3')}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Fourth Day</label>
                            <input type="number"   placeholder="00.00%" name="fourth_day_3" class="form-control form-control-sm" value="{{old('fourth_day_3')}}">
                            @error('fourth_day_3')
                                <label class="error">{{$errors->first('fourth_day_3')}}</label>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- 60> --}}

<h4>Late > 60 min</h4>


                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First day</label>
                            <input type="number" placeholder="00.00%"  name="first_day_4" class="form-control form-control-sm"  value="{{old('first_day_4')}}">
                            @error('first_day_4')
                                <label class="error">{{$errors->first('first_day_4')}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Second Day</label>
                            <input type="number"   placeholder="00.00%" name="second_day_4" class="form-control form-control-sm" value="{{old('second_day_4')}}">
                            @error('second_day_4')
                                <label class="error">{{$errors->first('second_day_4')}}</label>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Third day</label>
                            <input type="number" placeholder="00.00%"  name="third_day_4" class="form-control form-control-sm"  value="{{old('third_day_4')}}">
                            @error('third_day_4')
                                <label class="error">{{$errors->first('third_day_4')}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Fourth Day</label>
                            <input type="number"   placeholder="00.00%" name="fourth_day_4" class="form-control form-control-sm" value="{{old('fourth_day_4')}}">
                            @error('fourth_day_4')
                                <label class="error">{{$errors->first('fourth_day_4')}}</label>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{------------------- All Task Modules ----------------}}
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>All Late Deduction</h2>
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

                                <th style="border: 1px solid rgb(212, 204, 204)" colspan="6"></th>

                                <th class="text-center" style="border: 1px solid rgb(212, 204, 204)" colspan="4">Late upto 15min</th>
                                <th  class="text-center"style="border: 1px solid rgb(212, 204, 204)" colspan="4">Late upto 15-30min</th>
                                <th class="text-center" style="border: 1px solid rgb(212, 204, 204)" colspan="4">Late upto 30-60min</th>
                                <th class="text-center" style="border: 1px solid rgb(212, 204, 204)" colspan="4">Late upto > 60min</th>
                                <th style="border: 1px solid rgb(212, 204, 204)" colspan="2"></th>

                            </tr>
                            <tr>
                                <!--<th>Options</th>-->
                                <th>ID</th>
                                <th>Name</th>
                                <th>Name(In Arabic)</th>
                                <th>Consider(min)</th>
                                <th>Hour Rate</th>
                                <th>Rate 1</th>
                                {{-- 15 --}}
                                <th>First Day</th>
                                <th>Second Day</th>
                                <th>Third Day</th>
                                <th>Fourth Day</th>
                                {{-- 30 60 --}}
                                <th>First Day</th>
                                <th>Second Day</th>
                                <th>Third Day</th>
                                <th>Fourth Day</th>
                                {{-- 60 --}}
                                <th>First Day</th>
                                <th>Second Day</th>
                                <th>Third Day</th>
                                <th>Fourth Day</th>
                                {{-- 60 > --}}
                                <th>First Day</th>
                                <th>Second Day</th>
                                <th>Third Day</th>
                                <th>Fourth Day</th>

                                <th>Late Deduction Status</th>

                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <!--<th>Options</th>-->
                                <th>ID</th>
                                <th>Name</th>
                                <th>Name(In Arabic)</th>
                                <th>Consider(min)</th>
                                <th>Hour Rate</th>
                                <th>Rate 1</th>
                                {{-- 15 --}}
                                <th>First Day</th>
                                <th>Second Day</th>
                                <th>Third Day</th>
                                <th>Fourth Day</th>
                                {{-- 30 60 --}}
                                <th>First Day</th>
                                <th>Second Day</th>
                                <th>Third Day</th>
                                <th>Fourth Day</th>
                                {{-- 60 --}}
                                <th>First Day</th>
                                <th>Second Day</th>
                                <th>Third Day</th>
                                <th>Fourth Day</th>
                                {{-- 60 > --}}
                                <th>First Day</th>
                                <th>Second Day</th>
                                <th>Third Day</th>
                                <th>Fourth Day</th>

                                <th>Late Deduction Status</th>

                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($latededuction as $key=>$latedeductions)
                            <tr id="mid1{{$latedeductions->id}}" class="tableReload">
                                <!--<td>-->
                                <!--    <x-options-buttons>-->
                                <!--        <x-slot name="buttons">-->
                                <!--            <li><a href="">Edit</a></li>-->
                                <!--            <li>-->
                                <!--                <a href="" onclick="event.preventDefault();-->
                                <!--                    document.getElementById('delete').submit();">Delete</a>-->
                                <!--                <form id="delete" action="" method="post">-->
                                <!--                    @method('delete')-->
                                <!--                    @csrf-->
                                <!--                </form>-->
                                <!--            </li>-->
                                <!--        </x-slot>-->
                                <!--    </x-options-buttons>-->
                                <!--</td>-->
                                <td>{{$key+1}}</td>


                                <td class="name">{{$latedeductions->name}}</td>
                                <td style="font-size:18px;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif" class="arabic_name">{{$latedeductions->arabic_name}}</td>
                                <td>{{$latedeductions->consider}}</td>
                                <td>{{$latedeductions->hour_rate}}</td>
                                <td >{{$latedeductions->rate_1}}</td>
                                <td>{{$latedeductions->first_day_1}}</td>
                                <td >{{$latedeductions->second_day_1}}</td>
                                <td>{{$latedeductions->third_day_1}}</td>
                                <td >{{$latedeductions->fourth_day_1}}</td>
                                <td>{{$latedeductions->first_day_2}}</td>
                                <td >{{$latedeductions->second_day_2}}</td>
                                <td>{{$latedeductions->third_day_2}}</td>
                                <td >{{$latedeductions->fourth_day_2}}</td>
                                <td>{{$latedeductions->first_day_3}}</td>
                                <td >{{$latedeductions->second_day_3}}</td>
                                <td>{{$latedeductions->third_day_3}}</td>
                                <td >{{$latedeductions->fourth_day_3}}</td>
                                <td>{{$latedeductions->first_day_4}}</td>
                                <td >{{$latedeductions->second_day_4}}</td>
                                <td>{{$latedeductions->third_day_4}}</td>
                                <td >{{$latedeductions->fourth_day_4}}</td>
                                <td >@if($latedeductions->status == "Active") 
                                    <a href="{{url('latededuction/Inactive',$latedeductions->id)}}"  style="border-radius: 25px 25px;font-size:10px;" class="btn btn-success btn-rounded" type="button">Active</a>
                                @else
                                    <a href="{{url('latedeductions/active',$latedeductions->id)}}"  style="border-radius: 25px 25px;font-size:10px;" class="btn btn-danger btn-rounded" type="button">In-active</a>
                                @endif
                                  </td>

                                <td>
                                    <div style="display: flex;">
                                        <a  href="javascript:void(0)"  onclick="editlatededuction({{$latedeductions->id}})"  class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>

                                        <button type="button" class="btn btn-sm btn-default delete remove" data-id="{{url('latededuction/'.$latedeductions->id)}}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                        {{-- <form action="{{url('user/'.$user->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="updatelatededuction" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <form id="latedeductionEdit">
                                        @csrf
                                        <input type="hidden" id="id" name="id"/>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input placeholder="In English" type="text" class="form-control" id="name" name="name" />
                                        </div>
                                        <div class="form-group">
                                            <label>Name(In Arabic)</label>
                                            <input placeholder="In Arabic"  type="text"  id="txtBox" class="form-control arabic_name"  name="arabic_name" />
                                        </div>
                                        <div class="form-group">
                                            <label>Consider(min)</label>
                                            <input placeholder="00.00%" type="number" class="form-control" id="consider" name="consider" />
                                        </div>
                                        <div class="form-group">
                                            <label>Hour Rate</label>
                                            <input placeholder="00.00%"   type="checkboc" id="hour_rate"   class="form-control"  name="hour_rate" />
                                        </div>
                                        <div class="form-group">
                                            <label>Rate 1</label>
                                            <input placeholder="00.00%"   type="number" id="rate_1"   class="form-control"  name="rate_1" />
                                        </div>
                                        <h1>Late upto 15min</h1>
                                        <div class="form-group">
                                            <label>First day</label>
                                            <input placeholder="00.00%"   type="number" id="first_day_1"   class="form-control"  name="first_day_1" />
                                        </div>
                                        <div class="form-group">
                                            <label>Second day</label>
                                            <input placeholder="00.00%"   type="number" id="second_day_1"   class="form-control"  name="second_day_1" />
                                        </div>
                                        <div class="form-group">
                                            <label>Third day</label>
                                            <input placeholder="00.00%"   type="number" id="third_day_1"   class="form-control"  name="third_day_1" />
                                        </div>
                                        <div class="form-group">
                                            <label>Fourth day</label>
                                            <input placeholder="00.00%"   type="number" id="fourth_day_1"   class="form-control"  name="fourth_day_1" />
                                        </div>

                                        <h1>Late upto 15-30 min</h1>
                                        <div class="form-group">
                                            <label>First day</label>
                                            <input placeholder="00.00%"   type="number" id="first_day_2"   class="form-control"  name="first_day_2" />
                                        </div>
                                        <div class="form-group">
                                            <label>Second day</label>
                                            <input placeholder="00.00%"   type="number" id="second_day_2"   class="form-control"  name="second_day_2" />
                                        </div>
                                        <div class="form-group">
                                            <label>Third day</label>
                                            <input placeholder="00.00%"   type="number" id="third_day_2"   class="form-control"  name="third_day_2" />
                                        </div>
                                        <div class="form-group">
                                            <label>Fourth day</label>
                                            <input placeholder="00.00%"   type="number" id="fourth_day_2"   class="form-control"  name="fourth_day_2" />
                                        </div>

                                        <h1>Late upto 30-60 min</h1>
                                        <div class="form-group">
                                            <label>First day</label>
                                            <input placeholder="00.00%"   type="number" id="first_day_3"   class="form-control"  name="first_day_3" />
                                        </div>
                                        <div class="form-group">
                                            <label>Second day</label>
                                            <input placeholder="00.00%"   type="number" id="second_day_3"   class="form-control"  name="second_day_3" />
                                        </div>
                                        <div class="form-group">
                                            <label>Third day</label>
                                            <input placeholder="00.00%"   type="number" id="third_day_3"   class="form-control"  name="third_day_3" />
                                        </div>
                                        <div class="form-group">
                                            <label>Fourth day</label>
                                            <input placeholder="00.00%"   type="number" id="fourth_day_3"   class="form-control"  name="fourth_day_3" />
                                        </div>


                                        <h1>Late upto > 60 min</h1>
                                        <div class="form-group">
                                            <label>First day</label>
                                            <input placeholder="00.00%"   type="number" id="first_day_4"   class="form-control"  name="first_day_4" />
                                        </div>
                                        <div class="form-group">
                                            <label>Second day</label>
                                            <input placeholder="00.00%"   type="number" id="second_day_4"   class="form-control"  name="second_day_4" />
                                        </div>
                                        <div class="form-group">
                                            <label>Third day</label>
                                            <input placeholder="00.00%"   type="number" id="third_day_4"   class="form-control"  name="third_day_4" />
                                        </div>
                                        <div class="form-group">
                                            <label>Fourth day</label>
                                            <input placeholder="00.00%"   type="number" id="fourth_day_4"   class="form-control"  name="fourth_day_4" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>
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
    function editlatededuction(id){
        $.get('/latededuction/'+id, function(latededuction){
            $('#id').val(latededuction.id);
            $('#name').val(latededuction.name);
            $('.arabic_name').val(latededuction.arabic_name);
            $('#hour_rate').val(latededuction.hour_rate);
            $('#consider').val(latededuction.consider);
            $('#rate_1').val(latededuction.rate_1);
            $('#first_day_1').val(latededuction.first_day_1);
            $('#second_day_1').val(latededuction.second_day_1);
            $('#third_day_1').val(latededuction.third_day_1);
            $('#fourth_day_1').val(latededuction.fourth_day_1);

            $('#first_day_2').val(latededuction.first_day_2);
            $('#second_day_2').val(latededuction.second_day_2);
            $('#third_day_2').val(latededuction.third_day_2);
            $('#fourth_day_2').val(latededuction.fourth_day_2);

            $('#first_day_3').val(latededuction.first_day_3);
            $('#second_day_3').val(latededuction.second_day_3);
            $('#third_day_3').val(latededuction.third_day_3);
            $('#fourth_day_3').val(latededuction.fourth_day_3);

            $('#first_day_4').val(latededuction.first_day_4);
            $('#second_day_4').val(latededuction.second_day_4);
            $('#third_day_4').val(latededuction.third_day_4);
            $('#fourth_day_4').val(latededuction.fourth_day_4);

            $('#updatelatededuction').modal('toggle');
        });
    }

    $('#latedeductionEdit').submit(function(e){
        e.preventDefault();

        let id = $('#id').val();
        let name = $('#name').val();
        let arabic_name = $('.arabic_name').val();
        let hour_rate = $('#hour_rate').val();
        let consider = $('#consider').val();
        let rate_1 = $('#rate_1').val();
        let first_day_1 = $('#first_day_1').val();
        let second_day_1 = $('#second_day_1').val();
        let third_day_1 = $('#third_day_1').val();
        let fourth_day_1 = $('#fourth_day_1').val();

        let first_day_2 = $('#first_day_2').val();
        let second_day_2 = $('#second_day_2').val();
        let third_day_2 = $('#third_day_2').val();
        let fourth_day_2 = $('#fourth_day_2').val();

        let first_day_3 = $('#first_day_3').val();
        let second_day_3 = $('#second_day_3').val();
        let third_day_3 = $('#third_day_3').val();
        let fourth_day_3 = $('#fourth_day_3').val();

        let first_day_4 = $('#first_day_4').val();
        let second_day_4 = $('#second_day_4').val();
        let third_day_4 = $('#third_day_4').val();
        let fourth_day_4 = $('#fourth_day_4').val();

        let _token = $('input[name=_token]').val();

        $.ajax({
            url: "{{url('latededuction')}}"+"/"+id,
            type: "PUT",
            data: {
                id:id,
                name:name,
                arabic_name:arabic_name,
                hour_rate:hour_rate,
                consider:consider,
                rate_1:rate_1,
                first_day_1:first_day_1,
                second_day_1:second_day_1,
                third_day_1:third_day_1,
                fourth_day_1:fourth_day_1,

                first_day_2:first_day_2,
                second_day_2:second_day_2,
                third_day_2:third_day_2,
                fourth_day_2:fourth_day_2,

                first_day_3:first_day_3,
                second_day_3:second_day_3,
                third_day_3:third_day_3,
                fourth_day_3:fourth_day_3,

                first_day_4:first_day_4,
                second_day_4:second_day_4,
                third_day_4:third_day_4,
                fourth_day_4:fourth_day_4,
                _token:_token,
            },
            success:function(response){
                $('#mid1' + response.id +' td:nth-child(1)').text(response.name).text(response.arabic_name).text(response.company).text(response.staff);
                $('.name').text(response.name);
                $('.arabic_name').text(response.arabic_name);
                $('.hour_rate').text(response.hour_rate);
                $('.consider').text(response.consider);
                $('.rate_1').text(response.rate_1);
                $('.first_day_1').text(response.first_day_1);
                $('.second_day_1').text(response.second_day_1);
                $('.third_day_1').text(response.third_day_1);
                $('.fourth_day_1').text(response.fourth_day_1);

                $('.first_day_2').text(response.first_day_2);
                $('.second_day_2').text(response.second_day_2);
                $('.third_day_2').text(response.third_day_2);
                $('.fourth_day_2').text(response.fourth_day_2);

                $('.first_day_3').text(response.first_day_3);
                $('.second_day_3').text(response.second_day_3);
                $('.third_day_3').text(response.third_day_3);
                $('.fourth_day_3').text(response.fourth_day_3);

                $('.first_day_4').text(response.first_day_4);
                $('.second_day_4').text(response.second_day_4);
                $('.third_day_4').text(response.third_day_4);
                $('.fourth_day_4').text(response.fourth_day_4);

                $('#updatelatededuction').modal('toggle');
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
<script>

    window.onload = myOnload;

    function myOnload(evt){
      MakeTextBoxUrduEnabled(txtBox1);//enable arabic in html text box
      MakeTextBoxUrduEnabled(txtBox);//enable arabic in html text box

    //   MakeTextBoxUrduEnabled(txtBoxes);//enable arabic in html text box
    }
</script>

  
  


@stop


