@extends('layouts.master')
@section('title', 'Training')
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
                <h2>Add Training</h2>
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
                <form action="{{ url('training') }}" method="post">
                @csrf
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date(G)</label>
                            <input type="date" name="date" class="form-control form-control-sm" value="{{old('date')}}">
                            @error('employee')
                                <label class="error">{{$errors->first('date')}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Document</label>
                            <input  type="text"    name="document" class="form-control form-control-sm" value="{{old('document')}}">
                            @error('document')
                                <label class="error">{{$errors->first('document')}}</label>
                            @enderror
                        </div>
                    </div>
                </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control form-control-sm" value="{{old('description')}}">
                                @error('date_from')
                                    <label class="error">{{$errors->first('description')}}</label>
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
                <h2>All Training</h2>
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
                                <th>Date(G)</th>
                                <th>Document</th>
                                <th>Description</th>
                                <th>Remarks</th>
                                <th>Training Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <!--<th>Options</th>-->
                                <th>ID</th>
                                <th>Date(G)</th>
                                <th>Document</th>
                                <th>Description</th>
                                <th>Remarks</th>
                                <th>Training Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($training as $key=>$trainings)
                                <tr>
                                    <td>{{ $key+1 }}</td>

                                    <td>{{ $trainings->date }}</td>
                                    <td>{{ $trainings->document }}</td>
                                    <td>{{ $trainings->description }}</td>
                                    <td>{{ $trainings->remark }}</td>
                                    <td >@if($trainings->status == "Active") 
                                        <a href="{{url('training/Inactive',$trainings->id)}}"  style="border-radius: 25px 25px;font-size:10px;" class="btn btn-success btn-rounded" type="button">Active</a>
                                    @else
                                        <a href="{{url('training/active',$trainings->id)}}"  style="border-radius: 25px 25px;font-size:10px;" class="btn btn-danger btn-rounded" type="button">In-active</a>
                                    @endif
                                      </td>
    
                                   
                                    <td>
                                        
                                        <a href="" class="ml-2"><i class="fa fa-edit"></i></a>
                                       
                  
                                      
                                          <a href="{{ url('training',$trainings->id) }}" class="ml-2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                         
                                      </td>

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


