@extends('layouts.master')
@section('title', 'Services')
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
                <h2>Add Services</h2>
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
                <form action="{{ url('service') }}" method="post">
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
                            <input style="text-align:right;" type="text"   placeholder="In Arabic" name="arabic_name" class="form-control form-control-sm" value="{{old('arabic_name')}}">
                            @error('arabic_name')
                                <label class="error">{{$errors->first('arabic_name')}}</label>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>service less than 5</label>
                            <input type="number" placeholder="Month per annum" name="service_less_than_5" class="form-control form-control-sm" value="{{old('service_less_than_5')}}">
                            @error('service_less_than_5')
                                <label class="error">{{$errors->first('service_less_than_5')}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >service more than 5 and less than 10 years</label>
                            <input type="number"   placeholder="Month per annum" name="service_more_than_5" class="form-control form-control-sm" value="{{old('service_more_than_5')}}">
                            @error('service_more_than_5')
                                <label class="error">{{$errors->first('service_more_than_5')}}</label>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>service more than 10 years</label>
                            <input type="number" placeholder="Month per annum" name="service_more_than_10" class="form-control form-control-sm" value="{{old('service_more_than_10')}}">
                            @error('service_more_than_10')
                                <label class="error">{{$errors->first('service_more_than_10')}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Days in year</label>
                            <input type="number"   placeholder="days in year" name="days_in_year" class="form-control form-control-sm" value="{{old('days_in_year')}}">
                            @error('days_in_year')
                                <label class="error">{{$errors->first('days_in_year')}}</label>
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
                <h2>All Services</h2>
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
                                <th>service less than 5</th>
                                <th>service more than 5 and less than 10 years</th>
                                <th>service more than 10 years</th>
                                <th>Days in year</th>
                                <th>Services Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <!--<th>Options</th>-->
                                <th>ID</th>
                                <th>Name</th>
                                <th>Name(In Arabic)</th>
                                <th>service less than 5</th>
                                <th>service more than 5 and less than 10 years</th>
                                <th>service more than 10 years</th>
                                <th>Days in year</th>
                                <th>Services Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($service as $key=>$services)
                            <tr id="mid1{{$services->id}}" class="tableReload">
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


                                <td class="name">{{$services->name}}</td>
                                <td style="font-size:18px;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif" class="arabic_name">{{$services->arabic_name}}</td>
                                <td class="company">{{$services->service_less_than_5}}</td>
                                <td class="staff">{{$services->service_more_than_5}}</td>
                                <td class="company">{{$services->service_more_than_10}}</td>
                                <td class="staff">{{$services->days_in_year}}</td>
                                <td >@if($services->status == "Active") 
                                    <a href="{{url('service/Inactive',$services->id)}}"  style="border-radius: 25px 25px;font-size:10px;" class="btn btn-success btn-rounded" type="button">Active</a>
                                @else
                                    <a href="{{url('service/active',$services->id)}}"  style="border-radius: 25px 25px;font-size:10px;" class="btn btn-danger btn-rounded" type="button">In-active</a>
                                @endif
                                  </td>

                                <td>
                                    <div style="display: flex;">
                                        <a  href="javascript:void(0)"  onclick="editService({{$services->id}})"  class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>

                                        <button type="button" class="btn btn-sm btn-default delete remove" data-id="{{url('service/'.$services->id)}}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                        {{-- <form action="{{url('user/'.$user->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="updateService" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <form id="serviceEdit">
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
                                            <label>service less than 5</label>
                                            <input placeholder="00.00%" type="number" class="form-control" id="service_less_than_5" name="service_less_than_5" />
                                        </div>
                                        <div class="form-group">
                                            <label>service more than 5 and less than 10 years</label>
                                            <input placeholder="00.00%"   type="number" id="service_more_than_5"   class="form-control"  name="service_more_than_5" />
                                        </div>
                                        <div class="form-group">
                                            <label>service more than 10</label>
                                            <input placeholder="00.00%" type="number" class="form-control" id="service_more_than_10" name="service_more_than_10" />
                                        </div>
                                        <div class="form-group">
                                            <label>Days in year</label>
                                            <input placeholder="00.00%"   type="number" id="days_in_year"   class="form-control"  name="days_in_year" />
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
    function editService(id){
        $.get('/service/'+id, function(service){
            $('#id').val(service.id);
            $('#name').val(service.name);
            $('.arabic_name').val(service.arabic_name);
            $('#service_less_than_5').val(service.service_less_than_5);
            $('#service_more_than_5').val(service.service_more_than_5);
            $('#service_more_than_10').val(service.service_more_than_10);
            $('#days_in_year').val(service.days_in_year);

            $('#updateService').modal('toggle');
        });
    }

    $('#serviceEdit').submit(function(e){
        e.preventDefault();

        let id = $('#id').val();
        let name = $('#name').val();
        let arabic_name = $('.arabic_name').val();
        let service_less_than_5 = $('#service_less_than_5').val();
        let service_more_than_5 = $('#service_more_than_5').val();
        let service_more_than_10 = $('#service_more_than_10').val();
        let days_in_year = $('#days_in_year').val();

        let _token = $('input[name=_token]').val();

        $.ajax({
            url: "{{url('service')}}"+"/"+id,
            type: "PUT",
            data: {
                id:id,
                name:name,
                arabic_name:arabic_name,
                service_less_than_5:service_less_than_5,
                service_more_than_5:service_more_than_5,
                service_more_than_10:service_more_than_10,
                days_in_year:days_in_year,
                _token:_token,
            },
            success:function(response){
                $('#mid1' + response.id +' td:nth-child(1)').text(response.name).text(response.arabic_name).text(response.company).text(response.staff);
                $('.name').text(response.name);
                $('.arabic_name').text(response.arabic_name);
                $('.service_less_than_5').text(response.service_less_than_5);
                $('.service_more_than_5').text(response.service_more_than_5);
                $('.service_more_than_10').text(response.service_more_than_10);
                $('.days_in_year').text(response.days_in_year);
                $('#updateService').modal('toggle');
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


