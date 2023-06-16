@extends('layouts.master')
@section('title', 'Payslip')
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
                <h2>Add Payslip</h2>
                
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{url('payslip')}}">All Payslips</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <form action="{{url('payslip')}}" method="post">
                @csrf
                <div class="row clearfix">
                    <div class="col-md-6">
                        <h3>Gross Pay</h3>

                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control form-control-sm" value="{{old('date')}}">
                            @error('date')
                                <label class="error">{{$errors->first('date')}}</label>
                            @enderror
                        </div>

                        <label>Select Department</label>
                        <div class="form-group">
                            <select name="department" class="form-control" data-placeholder="Select">
                                
                                @foreach ($department as $departments)
                                    <option value="{{$departments->name}}">{{$departments->name}}</option>
                                    {{-- {{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}} --}}
                                @endforeach
                            </select>
                            @error('department')
                                <label class="error">{{$errors->first('department')}}</label>
                            @enderror
                        </div>


                        <label>Employee No</label>
                        <div class="form-group">
                            <select name="employee_no" class="form-control" data-placeholder="Select">
                                
                                @foreach ($employee as $employees)
                                    <option value="{{$employees->employee_no}}">{{$employees->employee_no}}</option>
                                    {{-- {{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}} --}}
                                @endforeach
                            </select>
                            @error('employee_no')
                                <label class="error">{{$errors->first('employee_no')}}</label>
                            @enderror
                        </div>


                        <label>Employee Name</label>
                        <div class="form-group">
                            <select name="emp_name" class="form-control" data-placeholder="Select">
                                
                                @foreach ($emp as $employee)
                                    <option value="{{$employee->first_name}} {{$employee->middle_name}} {{$employee->family_name}}">{{$employee->first_name}} {{$employee->middle_name}} {{$employee->family_name}}</option>
                                    {{-- {{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}} --}}
                                @endforeach
                            </select>
                            @error('emp_name')
                                <label class="error">{{$errors->first('emp_name')}}</label>
                            @enderror
                        </div>





                        <label>Days Worked</label>
                        <div class="form-group">
                            <input type="number" name="days_work"  class="form-control form-control-sm">
                            @error('days_work')
                                <label class="error">{{$errors->first('days_work')}}</label>
                            @enderror
                        </div>

                        <label>Overtime (Hour)</label>
                        <div class="form-group">
                            <input type="number" name="overtime"  class="form-control form-control-sm">
                            @error('overtime')
                                <label class="error">{{$errors->first('overtime')}}</label>
                            @enderror
                        </div>

                        

                        <label>Basic Monthly Pay</label>
                        <div class="form-group">
                            <input type="number" name="basic_monthly_pay"  id="input1" class="form-control form-control-sm">
                            @error('basic_monthly_pay')
                                <label class="error">{{$errors->first('basic_monthly_pay')}}</label>
                            @enderror
                        </div>

                        <label>Housing</label>
                        <div class="form-group">
                            <input type="number"  name="housing"  id="input2" class="form-control form-control-sm">
                            @error('housing')
                                <label class="error">{{$errors->first('housing')}}</label>
                            @enderror
                        </div>

                        <label>Transportation</label>
                        <div class="form-group">
                            <input type="number"   id="input3" name="transportation"  class="form-control form-control-sm">
                            @error('transportation')
                                <label class="error">{{$errors->first('transportation')}}</label>
                            @enderror
                        </div>

                        <label>Food All</label>
                        <div class="form-group">
                            <input type="number"  name="food"  id="input4"  class="form-control form-control-sm">
                            @error('food')
                                <label class="error">{{$errors->first('food')}}</label>
                            @enderror
                        </div>



                        {{-- <div class="form-group">
                            <label>Bonus</label>
                            <input type="number" name="bonus" id="bonus" class="form-control">
                            @error('bonus')
                                <label class="error">{{$errors->first('bonus')}}</label>
                            @enderror
                        </div> --}}

                        <label>Overtime</label>
                        <div class="form-group">
                            <input type="number"  id="input5" name="overtime_hour"  class="form-control form-control-sm">
                            @error('overtime_hour')
                                <label class="error">{{$errors->first('overtime_hour')}}</label>
                            @enderror
                        </div>

                        <label>Other</label>
                        <div class="form-group">
                            <input type="number"  id="input6"  name="other"  class="form-control form-control-sm">
                            @error('other')
                                <label class="error">{{$errors->first('other')}}</label>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label>Payable Amount</label>
                            <input type="number" name="payable_amount" id="pay-amount" class="form-control">
                            @error('payable_amount')
                                <label class="error">{{$errors->first('payable_amount')}}</label>
                            @enderror
                        </div> --}}

                        {{-- <div class="form-group">
                            <label>Hours Deduction</label>
                            <input type="number" name="hours_deduction" class="form-control" value="{{old('hours_deduction')}}">
                            @error('hours_deduction')
                                <label class="error">{{$errors->first('hours_deduction')}}</label>
                            @enderror
                        </div> --}}

                        <div class="form-group">
                            <label>Total</label>
                            <input type="number" value="0" name="total" id="total" readonly class="form-control">
                            @error('total')
                                <label class="error">{{$errors->first('total')}}</label>
                            @enderror
                        </div>

                    </div>


                    
                    <div class="col-md-6">

                        <h3>Deduction</h3>

                        <label>Absent</label>
                        <div class="form-group">
                            <input type="number" name="absent" id="input7"  class="form-control form-control-sm">
                            @error('absent')
                                <label class="error">{{$errors->first('absent')}}</label>
                            @enderror
                        </div>


                        <label>Gosi</label>
                        <div class="form-group">
                            <input type="number" name="gosi" id="input8"  class="form-control form-control-sm">
                            @error('gosi')
                                <label class="error">{{$errors->first('gosi')}}</label>
                            @enderror
                        </div>


                        <label>Personal Loans</label>
                        <div class="form-group">
                            <input type="number" name="personal_loan" id="input9"  class="form-control form-control-sm">
                            @error('personal_loan')
                                <label class="error">{{$errors->first('personal_loan')}}</label>
                            @enderror
                        </div>


                        <label>Late Penality</label>
                        <div class="form-group">
                            <input type="number" name="late_penality" id="input10"  class="form-control form-control-sm">
                            @error('late_penality')
                                <label class="error">{{$errors->first('late_penality')}}</label>
                            @enderror
                        </div>


                        <label>Others</label>
                        <div class="form-group">
                            <input type="number" name="other_ded" id="input11"  class="form-control form-control-sm">
                            @error('other_ded')
                                <label class="error">{{$errors->first('other_ded')}}</label>
                            @enderror
                        </div>

                        <label>Car Loan</label>
                        <div class="form-group">
                            <input type="number" name="car_loan" id="input12" class="form-control form-control-sm">
                            @error('car_loan')
                                <label class="car_loan">{{$errors->first('car_loan')}}</label>
                            @enderror
                        </div>


                        <label>Total Deduction</label>
                        <div class="form-group">
                            <input type="number" value="0" name="total_deduction" id="total_deduction" readonly  class="form-control form-control-sm">
                            @error('total_deduction')
                                <label class="car_loan">{{$errors->first('total_deduction')}}</label>
                            @enderror
                        </div>
                        <h3>Net Total</h3>

                        <label>Net Total</label>
                        <div class="form-group">
                            <input type="number" value="0" name="net_total" id="net_total" readonly  class="form-control form-control-sm">
                            @error('net_total')
                                <label class="car_loan">{{$errors->first('net_total')}}</label>
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




<script>
    // Get the input fields and the total fields
    const input1 = document.getElementById('input1');
    const input2 = document.getElementById('input2');
    const input3 = document.getElementById('input3');
    const input4 = document.getElementById('input4');
    const input5 = document.getElementById('input5');
    const input6 = document.getElementById('input6');

    const total = document.getElementById('total');

    const input7 = document.getElementById('input7');
    const input8 = document.getElementById('input8');
    const input9 = document.getElementById('input9');
    const input10 = document.getElementById('input10');
    const input11 = document.getElementById('input11');
    const input12 = document.getElementById('input12');

    const total_deduction = document.getElementById('total_deduction');

    const net_total = document.getElementById('net_total');

    // Add event listeners to the input fields
    input1.addEventListener('input', updateNetTotal);
    input2.addEventListener('input', updateNetTotal);
    input3.addEventListener('input', updateNetTotal);
    input4.addEventListener('input', updateNetTotal);
    input5.addEventListener('input', updateNetTotal);
    input6.addEventListener('input', updateNetTotal);

    input7.addEventListener('input', updateNetTotal);
    input8.addEventListener('input', updateNetTotal);
    input9.addEventListener('input', updateNetTotal);
    input10.addEventListener('input', updateNetTotal);
    input11.addEventListener('input', updateNetTotal);
    input12.addEventListener('input', updateNetTotal);


    // Define the updateTotal function
    function updateNetTotal() {
      // Calculate the total by adding the values of the input fields
      const sum = parseFloat(input1.value || 0) +
      parseFloat(input2.value || 0) +
      parseFloat(input3.value || 0) +
      parseFloat(input4.value || 0) +
      parseFloat(input5.value || 0) +
      parseFloat(input6.value || 0);

      // Calculate the total deduction by adding the values of the input fields
      const deduction = parseFloat(input7.value || 0) +
      parseFloat(input8.value || 0) +
      parseFloat(input9.value || 0) +
      parseFloat(input10.value || 0) +
      parseFloat(input11.value || 0) +
      parseFloat(input12.value || 0);

      // Calculate the net total by subtracting the total deduction from the total
      const netSum = parseFloat(sum) - parseFloat(deduction);

      // Update the value of the total field
      total.value = parseFloat(sum);

      // Update the value of the total_deduction field
      total_deduction.value = parseFloat(deduction);

      // Update the value of the net_total field
      net_total.value = parseFloat(netSum);
    }

</script>






@stop

@push('after-scripts')
<script>

    // var basic_pay = $('#basic-pay');
    // var $housing = $('#housing');
    // var $transport = $('#transport');
    // var $food = $('#food');
    // var $overtime = $('#overtime');
    // var $other = $('#other');
    // var total = $('#total');

    // function calcVal() {
    //     var num1 = basic_pay.val();
    //     var num2 = $housing.val();
    //     var num3 = $transport.val();
    //     var num4 = $food.val();
    //     var num5 = $overtime.val();
    //     var num6 = $other.val();

    //     var result = parseInt(num1, 10) + parseInt(num2, 10)+parseInt(num3, 10) + parseInt(num4, 10)+parseInt(num5, 10) + parseInt(num6, 10);

    //     if (!isNaN(result)) {
    //         pay_amount.val(result);
    //         total.val(result);
    //       }
    //   }

    //   calcVal();
    //   basic_pay.on("keydown keyup", function() {
    //       calcVal();
    //   });
    //   $bonus.on("keydown keyup", function() {
    //       calcVal();
    //   });
      
    //    $(document).ready(function(){
    //       $("#employee_id").on('change', function(){
    //            var val = $(this).val();
               
               

    //            $.ajax({
    //                 type: "post",
    //                 url:  "{{ url('payslip/salary') }}",
    //                 data : {
    //                     "_token" : "{{ csrf_token() }}",
    //                     "employee_id" : val,
    //                 },
    //                 success:function(data) {
    //                     var employee = JSON.parse(data);
    //                 $("#basic-pay").val(employee.salary);
    //             }
    //         });
    //       });
    //   });


      // 


</script>
@endpush

@section('page-script')
<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>
@stop


