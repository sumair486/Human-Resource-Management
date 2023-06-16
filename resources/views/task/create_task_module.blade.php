@extends('layouts.master')
@section('title', 'Task Module')
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
                <h2>Add Task Module</h2>
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
                <form action="{{url('task-module')}}" method="post">
                @csrf
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Module</label>
                            <input type="text" name="module" class="form-control form-control-sm" value="{{old('module')}}">
                            @error('module')
                                <label class="error">{{$errors->first('module')}}</label>
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
                <h2>All Task Modules</h2>
                <ul class="header-dropdown">
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="admin-datatable table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <!--<th>Options</th>-->
                                <th>Modules</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <!--<th>Options</th>-->
                                <th>Modules</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($taskModules as $taskModule)
                            <tr id="mid{{$taskModule->id}}" class="tableReload">
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
                                <td class="taskmodule">{{$taskModule->module}}</td>
                                <td>
                                    <div style="display: flex;">
                                        <a  href="javascript:void(0)" onclick="editModule({{$taskModule->id}})"  class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>

                                        <button type="button" class="btn btn-sm btn-default delete remove" data-id="{{url('task-module/'.$taskModule->id)}}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                        {{-- <form action="{{url('user/'.$user->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <form id="moduleFormEdit">
                                        @csrf
                                        <input type="hidden" id="id" name="id"/>
                                        <div class="form-group">
                                            <label>Module</label>
                                            <input type="text" class="form-control" id="module" name="module" />
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
    function editModule(id){
        $.get('/task-module/'+id, function(taskModule){
            $('#id').val(taskModule.id);
            $('#module').val(taskModule.module);
            $('#updateModal').modal('toggle');
        });
    }

    $('#moduleFormEdit').submit(function(e){
        e.preventDefault();

        let id = $('#id').val();
        let module = $('#module').val();
        let _token = $('input[name=_token]').val();

        $.ajax({
            url: "{{url('task-module')}}"+"/"+id,
            type: "PUT",
            data: {
                id:id,
                module:module,
                _token:_token,
            },
            success:function(response){
                $('#mid' + response.id +' td:nth-child(1)').text(response.module);
                $('.taskmodule').text(response.module);
                $('#updateModal').modal('toggle');
                alert('Record has been updated!');
                // $('#moduleFormEdit')[0].reset();
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
@stop


