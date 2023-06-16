@extends('layouts.master')
@section('title', 'payable')
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
                <h2>Add Payable Expense </h2>
                <ul class="header-dropdown">
                     <button type="button" class="btn btn-primary" style="padding: inherit;margin: auto;">
                          <li><a style="font-weight:700; color:white; margin-left:20px; text-decoration:none;" href="{{route('all.payable')}}">All Payable Expense</a></li>
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                         <!--<i class="zmdi zmdi-more"></i>-->
                        <!--<ul class="dropdown-menu dropdown-menu-right">-->
                        <!--    <li><a href="{{route('all.payable')}}">All Payable Expense</a></li>-->
                        <!--</ul>-->
                    </li>
                    <!--<li class="remove">-->
                    <!--    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>-->
                    <!--</li>-->
                    </button>
                </ul>
            </div>
            <div class="body">
                <form action="{{route('post.payable')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label>List of Things</label>
                        <div class="form-group">
                            <input type="text" name="things" id="" class="form-control form-control-sm">
                        </div>
                        </div>
                         <div class="col-md-6">
                          <div class="form-group">
                            <label>Payment Mode</label>
                            <input type="text" name="paid" id="" class="form-control">
                         </div>
                        </div>
                        </div>
    
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Pricing</label>
                            <input type="text" name="price" id="" class="form-control">
                        </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                                <label>Document Attachment</label>
                                <input class="form-control" type="file" name="file" multiple id="fileuploader" >

                          </div>
                        </div>
                        {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label>Plan Pricing in PKR</label>
                            <input type="text" name="plan" class="form-control" value="">
                          </div>
                        </div> --}}
                       </div>
           
                            <div class="col-md-6">
                    </div>
                 
                             <div class="container">
                                 <div class="col-md-12 text-center">
                                          <button type="submit" class="btn btn-primary" id="save-btn">Save</button>
                        </div>
                       </div>
                       </div>
                
                </div>
                     <style>
                            #save-btn{
                                width:180px;
                               height: 40px;
                               font-size: 15px;
                            }
                        </style>
              
        </div>
    </div>
</div>

@stop

@push('after-scripts')
<script>

    var basic_pay = $('#basic-pay');
    var $bonus = $('#bonus');
    var pay_amount = $('#pay-amount');
    var total = $('#total');

    function calcVal() {
        var num1 = basic_pay.val();
        var num2 = $bonus.val();
        var result = parseInt(num1, 10) + parseInt(num2, 10);

        if (!isNaN(result)) {
            pay_amount.val(result);
            total.val(result);
          }
      }

      calcVal();
      basic_pay.on("keydown keyup", function() {
          calcVal();
      });
      $bonus.on("keydown keyup", function() {
          calcVal();
      });

</script>
@endpush

@section('page-script')
<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>
<script src="{{asset('assets/plugins/fileuploader/jquery.fileuploader.min.js')}}"></script>
@stop


<script>
    // enable fileuploader plugin
    $('#fileuploader').fileuploader({
            addMore: true
    });
</script>
