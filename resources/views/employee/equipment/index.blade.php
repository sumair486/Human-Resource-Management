@extends('layouts.master')
@section('title', 'Equipment')
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
                <h2>Add Equipment</h2>
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
                <form action="{{ url('equipment') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date(G)</label>
                            <input type="date" name="date" class="form-control form-control-sm" value="{{old('date')}}">
                            @error('date')
                                <label class="error">{{$errors->first('date')}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Document</label>
                            <input  type="file"    name="file" class="form-control form-control-sm" value="{{old('file')}}">
                            @error('file')
                                <label class="error">{{$errors->first('file')}}</label>
                            @enderror
                        </div>
                    </div>
                </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Equipment Name</label>
                                <input type="text" name="equipment_name" class="form-control form-control-sm" value="{{old('equipment_name')}}">
                                @error('equipment_name')
                                    <label class="error">{{$errors->first('equipment_name')}}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Issued</label>
                                <input  type="number"    name="issue" class="form-control form-control-sm" value="{{old('issue')}}">
                                @error('issue')
                                    <label class="error">{{$errors->first('issue')}}</label>
                                @enderror
                            </div>
                        </div>

                    </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Returned</label>
                                    <input type="number" name="return" class="form-control form-control-sm" value="{{old('return')}}">
                                    @error('return')
                                        <label class="error">{{$errors->first('return')}}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Dal Value</label>
                                    <input  type="number"    name="dal_value" class="form-control form-control-sm" value="{{old('dal_value')}}">
                                    @error('dal_value')
                                        <label class="error">{{$errors->first('dal_value')}}</label>
                                    @enderror
                                </div>
                            </div>
                        </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Value</label>
                                        <input type="number" name="value" class="form-control form-control-sm" value="{{old('value')}}">
                                        @error('value')
                                            <label class="error">{{$errors->first('value')}}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Remark</label>
                                        <input  type="text"    name="remark" class="form-control form-control-sm" value="{{old('remark')}}">
                                        @error('remark')
                                            <label class="error">{{$errors->first('remark')}}</label>
                                        @enderror
                                    </div>
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
{{-- <div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>All Equipment</h2>
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
                                <th>Employee Code</th>
                                <th>Name</th>
                                <th>Date From</th>
                                <th>Date To</th>

                                <th>Training Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <!--<th>Options</th>-->
                                <th>ID</th>
                                <th>Employee Code</th>
                                <th>Name</th>
                                <th>Date From</th>
                                <th>Date To</th>

                                <th>Training Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@stop

@push('after-scripts')
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


