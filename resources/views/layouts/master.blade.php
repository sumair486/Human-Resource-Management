<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{asset('/img/favicon.png')}}" type="image/x-icon"> <!-- Favicon-->


        <title>{{ config('app.name') }} - @yield('title')</title>
        <meta name="description" content="@yield('meta_description', config('app.name'))">
        <meta name="author" content="@yield('meta_author', config('app.name'))">
        @yield('meta')
        @stack('before-styles')
        <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
        @if (trim($__env->yieldContent('page-style')))
            @yield('page-style')
        @endif
        <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
        <!-- Custom Css -->
        <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

        @stack('after-styles')
        

    </head>
    <?php
        $setting = !empty($_GET['theme']) ? $_GET['theme'] : '';
        $theme = "theme-blush";
        $menu = "";
        if ($setting == 'p') {
            $theme = "theme-purple";
        } else if ($setting == 'b') {
            $theme = "theme-blue";
        } else if ($setting == 'g') {
            $theme = "theme-green";
        } else if ($setting == 'o') {
            $theme = "theme-orange";
        } else if ($setting == 'bl') {
            $theme = "theme-cyan";
        } else {
            $theme = "theme-blush";
        }

        if (Request::segment(2) === 'rtl' ){
            $theme .= " rtl";
        }
    ?>
    <body class="theme-orange" style="font-family: 'Inter', sans-serif;">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="{{asset('img/loader.png')}}" width="20%" height="70" alt="HRM"></div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        @include('layouts.navbarright')
        @include('layouts.sidebar')
        @include('layouts.rightsidebar')
        <section class="content">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h5>@yield('title')</h5>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                @if (Auth::user()->role_id == 1)
                                <a href="{{url('admin/dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a>
                                @elseif (Auth::user()->role_id == 2)
                                <a href="{{url('emp/dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a>
                                @elseif (Auth::user()->role_id == 3)
                                <a href="{{url('manager/dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a>
                                @elseif (Auth::user()->role_id == 4)
                                <a href="{{url('hr/dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a>
                                @endif
                            </li>
                            @if (trim($__env->yieldContent('parentPageTitle')))
                                <li class="breadcrumb-item">@yield('parentPageTitle')</li>
                            @endif
                            @if (trim($__env->yieldContent('title')))
                                <li class="breadcrumb-item active">@yield('title')</li>
                            @endif
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                @include('layouts.alert_message')
                @yield('content')
            </div>
        </section>

        @yield('modal')

        <!-- Scripts -->
        @stack('before-scripts')
        <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
        <script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>
        <script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>

        
{{-- <script>
		
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
        </script> --}}

        <script src="{{ asset('assets/js/custom.js') }}"></script>

        @if (trim($__env->yieldContent('page-script')))
            @yield('page-script')
		@endif

        @stack('after-scripts')
        

    </body>
</html>
