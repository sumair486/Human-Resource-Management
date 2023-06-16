@extends('layouts.master')
@section('title', 'All Loans')
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
                <h2>All Loans</h2>
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
                                <th>Ref No</th>
                                <th>Date (G)</th>
                                {{-- <th>Hijri</th> --}}
                                
                                <th>Type of Loan</th>
                                <th>Loan Amount</th>
                                {{-- <th>Installment Period(Monthly)</th>
                                <th>Monthly Ded</th>
                                <th>Total Ded</th>
                                <th>No. of Inst. Unpaid</th>
                                <th>Balance Amount</th>
                                <th>Request By</th>
                                <th>Approved By</th>
                                <th>Requested Date</th>
                                <th>Date (H)</th>
                                <th>Date</th>
                                <th>Date(H)</th>
                                <th>Remark</th>
                                <th>Remark</th>
                                <th>Action</th> --}}


                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <!--<th>Options</th>-->
                                <th>ID</th>
                                <th>Employee Code</th>
                                <th>Name</th>
                                <th>Ref No</th>
                                <th>Date</th>
                                {{-- <th>Hijri</th> --}}
                               
                                <th>Type of Loan</th>
                                <th>Loan Amount</th>
                                {{-- <th>Installment Period(Monthly)</th>
                                <th>Monthly Ded</th>
                                <th>Total Ded</th>
                                <th>No. of Inst. Unpaid</th>
                                <th>Balance Amount</th>
                                <th>Request By</th>
                                <th>Approved By</th>
                                <th>Requested Date</th>
                                <th>Date (H)</th>
                                <th>Date</th>
                                <th>Date(H)</th>
                                <th>Remark</th>
                                <th>Remark</th>
                                <th>Action</th> --}}

                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($loan as $key=>$loans)
                                <tr id="element-list">
                                    <td>{{ $key+1 }}</td>
                                    
                                    <td>{{ $loans->ref }}</td>
                                    <td>{{ $loans->emp_code }}</td>
                                    <td>{{ $loans->name }}</td>
                                    <td>{{ $loans->date }}</td>
                                    {{-- <td>{{ $loans->hijri }}</td> --}}
                                    
                                    <td>{{ $loans->type_loan }}</td>
                                    <td>{{ $loans->amount }}</td>
                                    {{-- <td>{{ $loans->installment }}</td>
                                    <td>{{ $loans->monthly }}</td>
                                    <td>{{ $loans->ded_starting }}</td>
                                    <td>{{ $loans->unpaid }}</td>
                                    <td>{{ $loans->balance_amount }}</td>
                                    <td>{{ $loans->req_by }}</td>
                                    <td>{{ $loans->approved }}</td>
                                    <td>{{ $loans->req_date }}</td>
                                    <td>{{ $loans->date_h }}</td>
                                    <td>{{ $loans->date_req }}</td>
                                    <td>{{ $loans->date_h1 }}</td>
                                    <td>{{ $loans->remark }}</td>
                                    <td>{{ $loans->remark_2 }}</td> --}}
                                  



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


