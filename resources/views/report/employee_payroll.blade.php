@extends('layouts.master')
@section('title', 'All Payroll History')
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
                <h2>All Payroll History</h2>
                <ul class="header-dropdown">
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" id="search-input" class="form-control" placeholder="Search">
    
                        </div>
                    </div>
                    <table id="dtHorizontalExample" class="admin-datatable table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <!--<th>Options</th>-->
                                <th>ID</th>
                                <th>Employee Code</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Date</th>
                                <th>Basic Salary</th>
                                <th>Days Working</th>
                                <th>Over Time(Hour)</th>
                                <th>Housing</th>
                                <th>Transportation</th>
                                <th>Food</th>
                                <th>OverTime</th>
                                <th>Other</th>
                                <th>Total Gross</th>
                                <th>Absent</th>
                                <th>Gosi</th>
                                <th>Personal Loan</th>
                                <th>Late Penality</th>
                                <th>Other Ded</th>
                                <th>Car Loan</th>
                                <th>Total Deduction</th>
                                <th>Net Total</th>
                                


                                

                            
                              


                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <!--<th>Options</th>-->
                                <th>ID</th>
                                <th>Employee Code</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Date</th>
                                <th>Basic Salary</th>
                                <th>Days Working</th>
                                <th>Over Time(Hour)</th>
                                <th>Housing</th>
                                <th>Transportation</th>
                                <th>Food</th>
                                <th>OverTime</th>
                                <th>Other</th>
                                <th>Total Gross</th>
                                <th>Absent</th>
                                <th>Gosi</th>
                                <th>Personal Loan</th>
                                <th>Late Penality</th>
                                <th>Other Ded</th>
                                <th>Car Loan</th>
                                <th>Total Deduction</th>
                                <th>Net Total</th>
                              
                               
                                

                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($payroll as $key=>$payrolls)
                                <tr id="element-list">
                                    <td>{{ $key+1 }}</td>
                                    
                                    <td>{{ $payrolls->employee_no }}</td>
                                    <td>{{ $payrolls->emp_name }} </td>
                                    <td>{{ $payrolls->department }}</td>
                                    <td>{{ $payrolls->date }}</td>
                                    <td>{{ $payrolls->basic_monthly_pay }}</td>
                                    <td>{{ $payrolls->days_work }}</td>
                                    <td>{{ $payrolls->overtime }}</td>
                                    <td>{{ $payrolls->housing }}</td>
                                    <td>{{ $payrolls->transportation }}</td>
                                    <td>{{ $payrolls->food }}</td>
                                    <td>{{ $payrolls->overtime_hour }}</td>
                                    <td>{{ $payrolls->other }}</td>
                                    <td>{{ $payrolls->total }}</td>
                                    <td>{{ $payrolls->absent }}</td>
                                    <td>{{ $payrolls->gosi }}</td>
                                    <td>{{ $payrolls->personal_loan }}</td>
                                    <td>{{ $payrolls->late_penality }}</td>
                                    <td>{{ $payrolls->other_ded }}</td>
                                    <td>{{ $payrolls->car_loan }}</td>
                                    <td>{{ $payrolls->total_deduction }}</td>
                                    <td>{{ $payrolls->net_total }}</td>
                     



                                    
                                  



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
    $(document).ready(function() {
  // Search input keyup event
  $('#search-input').keyup(function() {
    filterElements();
  });
  
  // Function to filter elements based on search input
  function filterElements() {
    var searchQuery = $('#search-input').val().toLowerCase();
    
    $('#element-list').each(function() {
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
<script>

    window.onload = myOnload;

    function myOnload(evt){
      MakeTextBoxUrduEnabled(txtBox1);//enable arabic in html text box
      MakeTextBoxUrduEnabled(txtBox);//enable arabic in html text box

    //   MakeTextBoxUrduEnabled(txtBoxes);//enable arabic in html text box
    }
</script>

  
  
  {{-- <script>
    
    $('#companyEdit').on('shown.bs.modal', function (e) {
      // var id_of_element=$(e).attr('id');
        // console.log(id_of_element);
        // console.log('textkdn');
        MakeTextBoxUrduEnabled(txtBox);

  })
    
      </script> --}}

@stop


