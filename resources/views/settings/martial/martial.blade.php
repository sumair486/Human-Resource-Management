@extends('layouts.master')
@section('title', 'Marital Status')
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
                <h2>Add Marital Status</h2>
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
                <form action="{{ url('martial') }}" method="post">
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
                            <input  onkeyup="arabicValue(text1)" dir="rtl"  id="text1" style="text-align:right;" type="text"  placeholder="In Arabic" name="arabic_name" class="form-control form-control-sm" value="{{old('arabic_name')}}">
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
                <h2>All Marital Status</h2>
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
                                <th>Marital Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <!--<th>Options</th>-->
                                <th>ID</th>
                                <th>Name</th>
                                <th>Name(In Arabic)</th>
                                <th>Marital Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($martial as $key=>$martials)
                            <tr id="mid1{{$martials->id}}" class="tableReload">
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


                                <td class="name">{{$martials->name}}</td>
                                <td style="font-size:18px;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif" class="arabic_name">{{$martials->arabic_name}}</td>
                                <td >@if($martials->status == "Active") 
                                    <a href="{{url('martial/Inactive',$martials->id)}}"  style="border-radius: 25px 25px;font-size:10px;" class="btn btn-success btn-rounded" type="button">Active</a>
                                @else
                                    <a href="{{url('martial/active',$martials->id)}}"  style="border-radius: 25px 25px;font-size:10px;" class="btn btn-danger btn-rounded" type="button">In-active</a>
                                @endif
                                  </td>

                                <td>
                                    <div style="display: flex;">
                                        <a  href="javascript:void(0)"  onclick="editmartialtype({{$martials->id}})"  class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>

                                        <button type="button" class="btn btn-sm btn-default delete remove" data-id="{{url('martial/'.$martials->id)}}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                        {{-- <form action="{{url('user/'.$user->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Delete"><i class="far fa-trash-alt"></i></button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="updatemartialtype" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <form id="martialtypeEdit">
                                        @csrf
                                        <input type="hidden" id="id" name="id"/>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input  placeholder="In English" type="text" class="form-control" id="name" name="name" />
                                        </div>
                                        <div class="form-group">
                                            <label>Name(In Arabic)</label>
                                            <input style="text-align: right" onkeyup="arabicValue(text2)" id="text2" placeholder="In Arabic"  type="text"   class="form-control arabic_name"  name="arabic_name" />
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
    function editmartialtype(id){
        $.get('/martial/'+id, function(martial){
            $('#id').val(martial.id);
            $('#name').val(martial.name);
            $('.arabic_name').val(martial.arabic_name);

            $('#updatemartialtype').modal('toggle');
        });
    }

    $('#martialtypeEdit').submit(function(e){
        e.preventDefault();

        let id = $('#id').val();
        let name = $('#name').val();
        let arabic_name = $('.arabic_name').val();

        let _token = $('input[name=_token]').val();

        $.ajax({
            url: "{{url('martial')}}"+"/"+id,
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
                $('#updatemartialtype').modal('toggle');
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

<script>
		
    var yas;
    function arabicValue(txt) {
        yas = txt.value;
    yas = yas.replace(/`/g, "ذ");
    yas = yas.replace(/0/g, "۰");
    yas = yas.replace(/1/g, "۱");
    yas = yas.replace(/2/g, "۲");
    yas = yas.replace(/3/g, "۳");
    yas = yas.replace(/4/g, "٤");
    yas = yas.replace(/5/g, "۵");
    yas = yas.replace(/6/g, "٦");
    yas = yas.replace(/7/g, "۷");
    yas = yas.replace(/8/g, "۸");
    yas = yas.replace(/9/g, "۹");
    yas = yas.replace(/0/g, "۰");
    yas  = yas.replace(/q/g, "ض");
    yas  = yas.replace(/w/g, "ص");
    yas  = yas.replace(/e/g, "ث");
    yas  = yas.replace(/r/g, "ق");
    yas  = yas.replace(/t/g, "ف"); 
    yas  = yas.replace(/y/g, "غ");
    yas  = yas.replace(/u/g, "ع");
    yas  = yas.replace(/i/g, "ه");
    yas  = yas.replace(/o/g, "خ");
    yas  = yas.replace(/p/g, "ح");
    yas  = yas.replace(/\[/g, "ج");
    yas  = yas.replace(/\]/g, "د");
    yas  = yas.replace(/a/g, "ش");
    yas  = yas.replace(/s/g, "س");
    yas  = yas.replace(/d/g, "ي");
    yas  = yas.replace(/f/g, "ب");
    yas  = yas.replace(/g/g, "ل");
    yas  = yas.replace(/h/g, "ا");
    yas  = yas.replace(/j/g, "ت");
    yas  = yas.replace(/k/g, "ن");
    yas  = yas.replace(/l/g, "م");
    yas = yas.replace(/\;/g, "ك");
    yas  = yas.replace(/\'/g, "ط");
    yas  = yas.replace(/z/g, "ئ");
    yas  = yas.replace(/x/g, "ء");
    yas  = yas.replace(/c/g, "ؤ");
    yas  = yas.replace(/v/g, "ر");
    yas  = yas.replace(/b/g, "لا");
    yas  = yas.replace(/n/g, "ى");
    yas  = yas.replace(/m/g, "ة");
    yas  = yas.replace(/\,/g, "و");
    yas  = yas.replace(/\./g, "ز");
    yas  = yas.replace(/\//g, "ظ");
    yas  = yas.replace(/~/g, " ّ");
    yas  = yas.replace(/Q/g, "َ");
    yas  = yas.replace(/W/g, "ً");
    yas  = yas.replace(/E/g, "ُ");
    yas  = yas.replace(/R/g, "ٌ");
    yas  = yas.replace(/T/g, "لإ");
    yas  = yas.replace(/Y/g, "إ");
    yas  = yas.replace(/U/g, "‘");
    yas  = yas.replace(/I/g, "÷");
    yas  = yas.replace(/O/g, "×");
    yas  = yas.replace(/P/g, "؛");
    yas  = yas.replace(/A/g, "ِ");
    yas  = yas.replace(/S/g, "ٍ");
    yas  = yas.replace(/G/g, "لأ");
    yas  = yas.replace(/H/g, "أ");
    yas  = yas.replace(/J/g, "ـ");
    yas  = yas.replace(/K/g, "،");
    yas  = yas.replace(/L/g, "/");
    yas  = yas.replace(/Z/g, "~");
    yas  = yas.replace(/X/g, "ْ");
    yas  = yas.replace(/B/g, "لآ");
    yas  = yas.replace(/N/g, "آ");
    yas  = yas.replace(/M/g, "’");
    yas  = yas.replace(/\?/g, "؟");
    txt.value = yas;
    }
        </script>
  
  


@stop


