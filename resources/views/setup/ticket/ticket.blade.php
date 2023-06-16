@extends('layouts.master')
@section('title', 'Ticket')
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
                <h2>Add Ticket</h2>
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
                <form action="{{ url('ticket') }}" method="post">
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
                            <input style="text-align:right;" type="text"  placeholder="In Arabic" name="arabic_name" class="form-control form-control-sm" value="{{old('arabic_name')}}">
                            @error('arabic_name')
                                <label class="error">{{$errors->first('arabic_name')}}</label>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No of ticket</label>
                            <input type="number" placeholder="Days in 1 year" name="no_of_ticket" class="form-control form-control-sm" value="{{old('no_of_ticket')}}">
                            @error('no_of_ticket')
                                <label class="error">{{$errors->first('no_of_ticket')}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fixed amount</label>
                            <input type="number" placeholder="Amount"  name="fixed_amount" class="form-control form-control-sm" value="{{old('fixed_amount')}}">
                            @error('fixed_amount')
                                <label class="error">{{$errors->first('fixed_amount')}}</label>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Distribute with salary</label>
                            <input type="checkbox" value="Distributed Salary" name="distribute_salary"  value="{{old('distribute_salary')}}">
                            @error('distribute_salary')
                                <label class="error">{{$errors->first('distribute_salary')}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Remarks</label>
                            <input type="number" placeholder="remark" class="form-control form-control-sm"  name="remark" value="{{old('remark')}}">
                            @error('remark')
                                <label class="error">{{$errors->first('remark')}}</label>
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
                <h2>All Remarks</h2>
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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Name(In Arabic)</th>
                                <th>No. of ticket</th>
                                <th>Fixed amount</th>
                                <th>Distribute with salary</th>
                                <th>Remarks</th>
                                <th>Ticket Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <!--<th>Options</th>-->
                                <th>ID</th>
                                <th>Name</th>
                                <th>Name(In Arabic)</th>
                                <th>No. of ticket</th>
                                <th>Fixed amount</th>
                                <th>Distribute with salary</th>
                                <th>Remarks</th>
                                <th>Ticket Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($ticket as $key=>$tickets)
                            <tr id="mid1{{$tickets->id}}" class="tableReload">
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


                                <td class="name">{{$tickets->name}}</td>
                                <td style="font-size:18px;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif" class="arabic_name">{{$tickets->arabic_name}}</td>
                                <td class="company">{{$tickets->no_of_ticket}}</td>
                                <td class="staff">{{$tickets->fixed_amount}}</td>
                                <td class="company">{{$tickets->distribute_salary}}</td>
                                <td class="staff">{{$tickets->remark}}</td>
                                <td >@if($tickets->status == "Active") 
                                    <a href="{{url('ticket/Inactive',$tickets->id)}}"  style="border-radius: 25px 25px;font-size:10px;" class="btn btn-success btn-rounded" type="button">Active</a>
                                @else
                                    <a href="{{url('ticket/active',$tickets->id)}}"  style="border-radius: 25px 25px;font-size:10px;" class="btn btn-danger btn-rounded" type="button">In-active</a>
                                @endif
                                  </td>

                                <td>
                                    <div style="display: flex;">
                                        <a  href="javascript:void(0)"  onclick="editticket({{$tickets->id}})"  class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>

                                        <button type="button" class="btn btn-sm btn-default delete remove" data-id="{{url('ticket/'.$tickets->id)}}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                        {{-- <form action="{{url('user/'.$user->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="updateticket" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <form id="ticketEdit">
                                        @csrf
                                        <input type="hidden" id="id" name="id"/>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input placeholder="In English" type="text" class="form-control" id="name" name="name" />
                                        </div>
                                        <div class="form-group">
                                            <label>Name(In Arabic)</label>
                                            <input placeholder="In Arabic"  type="text"   class="form-control arabic_name"  name="arabic_name" />
                                        </div>
                                        <div class="form-group">
                                            <label>No. of ticket</label>
                                            <input  type="number" class="form-control" id="no_of_ticket" name="no_of_ticket" />
                                        </div>
                                        <div class="form-group">
                                            <label>Fixed amount</label>
                                            <input    type="number" id="fixed_amount"  class="form-control"  name="fixed_amount" />
                                        </div>
                                        <div class="form-group">
                                            <label>Distribute with salary</label>
                                            <input  type="checkbox" value="Distributed Salary" class="form-control" id="distribute_salary" name="distribute_salary" />
                                        </div>
                                        <div class="form-group">
                                            <label>Remarks</label>
                                            <input    type="number" id="remark"  class="form-control"  name="remark" />
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
    function editticket(id){
        $.get('/ticket/'+id, function(ticket){
            $('#id').val(ticket.id);
            $('#name').val(ticket.name);
            $('.arabic_name').val(ticket.arabic_name);
            $('#no_of_ticket').val(ticket.no_of_ticket);
            $('#fixed_amount').val(ticket.fixed_amount);
            $('#distribute_salary').val(ticket.distribute_salary);
            $('#remark').val(ticket.remark);

            $('#updateticket').modal('toggle');
        });
    }

    $('#ticketEdit').submit(function(e){
        e.preventDefault();

        let id = $('#id').val();
        let name = $('#name').val();
        let arabic_name = $('.arabic_name').val();
        let no_of_ticket = $('#no_of_ticket').val();
        let fixed_amount = $('#fixed_amount').val();
        let distribute_salary = $('#distribute_salary').val();
        let remark = $('#remark').val();

        let _token = $('input[name=_token]').val();

        $.ajax({
            url: "{{url('ticket')}}"+"/"+id,
            type: "PUT",
            data: {
                id:id,
                name:name,
                arabic_name:arabic_name,
                no_of_ticket:no_of_ticket,
                fixed_amount:fixed_amount,
                distribute_salary:distribute_salary,
                remark:remark,
                _token:_token,
            },
            success:function(response){
                $('#mid1' + response.id +' td:nth-child(1)').text(response.name).text(response.arabic_name).text(response.company).text(response.staff);
                $('.name').text(response.name);
                $('.arabic_name').text(response.arabic_name);
                $('.no_of_ticket').text(response.no_of_ticket);
                $('.fixed_amount').text(response.fixed_amount);
                $('.distribute_salary').text(response.distribute_salary);
                $('.remark').text(response.remark);
                $('#updateticket').modal('toggle');
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


