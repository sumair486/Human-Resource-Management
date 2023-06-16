@extends('layouts.master')
@section('title', 'Position')
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
                <h2>Add Position</h2>
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
                <form action="{{ url('position') }}" method="post">
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
                            <input  style="text-align:right;" type="text" onkeyup="arabicValue(text1)" dir="rtl"  id="text1" placeholder="In Arabic" name="arabic_name" class="form-control form-control-sm" value="{{old('arabic_name')}}">
                            @error('arabic_name')
                                <label class="error">{{$errors->first('arabic_name')}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
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
                <h2>All Position</h2>
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
                                <td>ID</td>
                                <th>Name</th>
                                <th>Name(In Arabic)</th>
                                <th>Position Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <!--<th>Options</th>-->
                                <td>ID</td>
                                <th>Name</th>
                                <th>Name(In Arabic)</th>
                                <th>Position Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($position as $key=>$positions)
                            <tr id="mid1{{$positions->id}}" class="tableReload">
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
                                <td>{{ $key+1 }}</td>
                                <td class="name">{{$positions->name}}</td>
                                <td style="font-size:18px;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif" class="arabic_name">{{$positions->arabic_name}}</td>
                                <td >@if($positions->status == "Active") 
                                    <a href="{{url('position/Inactive',$positions->id)}}"  style="border-radius: 25px 25px;font-size:10px;" class="btn btn-success btn-rounded" type="button">Active</a>
                                @else
                                    <a href="{{url('position/active',$positions->id)}}"  style="border-radius: 25px 25px;font-size:10px;" class="btn btn-danger btn-rounded" type="button">In-active</a>
                                @endif
                                  </td>

                                <td>
                                    <div style="display: flex;">
                                        <a  href="javascript:void(0)"  onclick="editposition({{$positions->id}})"  class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>

                                        <button type="button" class="btn btn-sm btn-default delete remove" data-id="{{url('position/'.$positions->id)}}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                        {{-- <form action="{{url('user/'.$user->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="updateposition" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <form id="positionEdit">
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
    function editposition(id){
        $.get('/position/'+id, function(position){
            $('#id').val(position.id);
            $('#name').val(position.name);
            $('.arabic_name').val(position.arabic_name);

            $('#updateposition').modal('toggle');
        });
    }

    $('#positionEdit').submit(function(e){
        e.preventDefault();

        let id = $('#id').val();
        let name = $('#name').val();
        let arabic_name = $('.arabic_name').val();

        let _token = $('input[name=_token]').val();

        $.ajax({
            url: "{{url('position')}}"+"/"+id,
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
                $('#updateposition').modal('toggle');
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


