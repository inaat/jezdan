<!doctype html>
<html  lang="{{ app()->getLocale() }}" dir="{{in_array(session()->get('user.language', config('app.locale')), config('constants.langs_rtl')) ? 'rtl' : 'ltr'}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ url('/tenant/uploads/business_logos/'.session()->get('system_details.org_favicon', ''))}}" type="image/png" />
    <link rel="stylesheet" href="{{url('tenant/css/fontawesome-free-6.0.0-web/css/all.min.css')}}">

    <!--plugins-->
    @yield("style")
    <link href="{{ url('tenant/css/vendor.css')}}" rel="stylesheet" />
    <link href="{{ url('tenant/css/icon.css')}}" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="{{ url('tenant/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('tenant/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="{{ url('tenant/assets/css/app.css')}}" rel="stylesheet">
    <link href="{{ url('tenant/assets/css/icons.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{ url('tenant/js/instascan.min.js')}}"></script>

<script type="text/javascript">
    base_path = "{{url('/')}}";
    //used for push notification
</script>

    <title>{{ session()->get('system_details.org_name')}}</title>
</head>

<body>

    <!--wrapper-->
    <div class="wrapper" style="padding-left:10px; padding-right:10px ;">
     
        <!-- Add currency related field-->
        <input type="hidden" id="__code" value="{{session('currency')['code']}}">
        <input type="hidden" id="__symbol" value="{{session('currency')['symbol']}}">
        <input type="hidden" id="__thousand" value="{{session('currency')['thousand_separator']}}">
        <input type="hidden" id="__decimal" value="{{session('currency')['decimal_separator']}}">
        <input type="hidden" id="__symbol_placement" value="{{session('business.currency_symbol_placement')}}">
        <input type="hidden" id="__precision" value="{{config('constants.currency_precision', 2)}}">
        <input type="hidden" id="__quantity_precision" value="{{config('constants.quantity_precision', 2)}}">
        <!-- End of currency related field-->

        @if (session('status'))
        <input type="hidden" id="status_span" data-status="{{ session('status.success') }}" data-msg="{{ session('status.msg') }}">
        @endif
        

        <!--start page wrapper -->
        @yield("wrapper")
        <!--end page wrapper -->

     
    </div>
    <audio id="success-audio">
        <source src="{{ url('tenant/audio/success.ogg') }}" type="audio/ogg">
        <source src="{{ url('tenant/audio/success.mp3') }}" type="audio/mpeg">
    </audio>
    <audio id="error-audio">
        <source src="{{ url('tenant/audio/error.ogg') }}" type="audio/ogg">
        <source src="{{ url('tenant/audio/error.mp3') }}" type="audio/mpeg">
    </audio>
    <audio id="warning-audio">
        <source src="{{ url('tenant/audio/warning.ogg') }}" type="audio/ogg">
        <source src="{{ url('tenant/audio/warning.mp3') }}" type="audio/mpeg">
    </audio>
    <!--end wrapper-->
 
    <div class="modal fade view_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel"></div>
         <!-- This will be printed -->
    <section class="invoice print_section" id="receipt_section">
    </section>
   
                <script src="{{ url('tenant/js/socket.io.js') }}"></script>

 @include("common.javascripts")
</body>

</html>
