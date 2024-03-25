<!DOCTYPE html>
<html lang="{{ $currentLanguageInfo->code }}" @if ($currentLanguageInfo->direction == 1) dir="rtl" @endif>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

       {{-- csrf-token for ajax request --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- title --}}
    <title>@yield('pageHeading') {{ '| ' . config('app.name') }}</title>

    <meta name="keywords" content="@yield('metaKeywords')">
    <meta name="description" content="@yield('metaDescription')">

    <link rel="shortcut icon" type="image/png" href="{{url('tenant/assets/saas/admin/img/' . $websiteInfo->favicon) }}">
    <!-- Google Font CSS -->
    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="http://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&amp;family=Rubik:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"  href="{{ asset('assets/front/css/bootstrap.min.css')}}">
    <!-- Fontawesome Icon CSS -->
    <link rel="stylesheet"  href="{{ asset('assets/front/css/all.min.css')}}">
    <!-- Kreativ Icon -->
    <link rel="stylesheet"  href="{{ asset('assets/front/css/font-gigo.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet"  href="{{ asset('assets/front/css/magnific-popup.min.css')}}">
    <!-- Swiper Slider -->
    <link rel="stylesheet"  href="{{ asset('assets/front/css/swiper-bundle.min.css')}}">
    <!-- AOS Animation CSS -->
    <link rel="stylesheet"  href="{{ asset('assets/front/css/aos.min.css')}}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet"  href="{{ asset('assets/front/css/meanmenu.min.css')}}">
    <!-- Nice Select -->
    <link rel="stylesheet"  href="{{ asset('assets/front/css/nice-select.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet"  href="{{ asset('assets/front/css/toastr.min.css')}}">
    <!-- Whatsapp -->
    <link rel="stylesheet"  href="{{ asset('assets/front/css/whatsapp.min.css')}}">
    <!-- Main Style CSS -->
    <link rel="stylesheet"  href="{{ asset('assets/front/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet"  href="{{ asset('assets/front/css/responsive.css')}}">
    <link rel="stylesheet"  href="{{ asset('assets/front/css/cookie-alert.css')}}">


        <!-- base color change -->

    
            <style>
            .go-top {
                right: auto;
                left: 30px;
            }
        </style>
    
    <style>
        :root {
            --color-primary: #197A83;
            --color-primary-shade: #5CC2AD;
            --bg-light: #5CC2AD14;
        }
    </style>
    <script>
        if (top.location != location) {
            top.location.replace(location);
        }
    </script>
    <!-- ===/External Code=== -->   
</head>
<body class="" >
  <!--====== Start Preloader ======-->
    <div id="preLoader">
        <div class="loader">
            <img src="{{ asset('assets/front/img/62e000f7a79e2.png')}}" alt="">
        </div>
    </div><!--====== End Preloader ======-->

     @include("saas.front.layout.header")

     <!--start page content -->
        @yield("content")
        <!--end page content -->

     @include("saas.front.layout.footer")


<!-- Magic Cursor -->
<div class="cursor"></div>
<!-- Magic Cursor -->


<div id="WAButton"></div>

<!-- Jquery JS -->
<script src="{{ asset('assets/front/js/jquery.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{ asset('assets/front/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets/front/js/bootstrap.min.js')}}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('assets/front/js/jquery.nice-select.min.js')}}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('assets/front/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Swiper Slider JS -->
<script src="{{ asset('assets/front/js/swiper-bundle.min.js')}}"></script>
<!-- Lazysizes -->
<script src="{{ asset('assets/front/js/lazysizes.min.js')}}"></script>
<!-- AOS JS -->
<script src="{{ asset('assets/front/js/aos.min.js')}}"></script>
<!-- Toastr JS -->
<script src="{{ asset('assets/front/js/toastr.min.js')}}"></script>
<!-- whatsapp JS -->
<script src="{{ asset('assets/front/js/whatsapp.min.js')}}"></script>
<!-- Main script JS -->
<script src="{{ asset('assets/front/js/script.js')}}"></script>

@if (session()->has('success'))
  <script>
    "use strict";
    toastr['success']("{{ __(session('success')) }}");
  </script>
@endif

@if (session()->has('error'))
  <script>
    "use strict";
    toastr['error']("{{ __(session('error')) }}");
  </script>
@endif

@if (session()->has('warning'))
  <script>
    "use strict";
    toastr['warning']("{{ __(session('warning')) }}");
  </script>
@endif
<script>
    "use strict";
    var rtl = 0;
</script>

<script type="text/javascript">
    base_path = "{{url('/')}}";
    //used for push notification
</script>

        <script>
            "use strict";
            $(document).ready(function() {
                $("input[name='username']").on('input', function() {
                    let username = $(this).val();
                    if (username.length > 0) {
                        $("#username").text(username);
                    } else {
                        $("#username").text("{username}");
                    }
                });
            });
        </script>
        <script>
		"use strict";
        $(document).ready(function() {
            $("input[name='username']").on('change', function() {
                let username = $(this).val();
                if (username.length > 0) {
                    $.get(base_path+"/check/" + username + '/username', function(data) {
                       
                        if (data == true) {
                            $("#usernameAvailable").text('This username is already taken.');
                        } else {
                            $("#usernameAvailable").text('');
                        }
                    });
                } else {
                    $("#usernameAvailable").text('');
                }
            });
        });
    </script>



<script>
    "use strict";
    function handleSelect(elm) {
        window.location.href = "/changelanguage" + "/" + elm.value;
    }
</script>


    <script type="text/javascript">
        "use strict";
        var whatsapp_popup = 1;
        var whatsappImg = "{{ asset('assets/front/img/whatsapp.svg')}}";
        $(function () {
            $('#WAButton').floatingWhatsApp({
                phone: "2367327069", //WhatsApp Business phone number
                headerTitle: "Hi, There!", //Popup Title
                popupMessage: `Hello,<br />
Welcome to ZYZEE!<br />
How may I help you ?`, //Popup Message
                showPopup: whatsapp_popup == 1 ? true : false, //Enables popup display
                buttonImage: '<img src="' + whatsappImg + '" />', //Button Image
                position: "right" //Position: left | right

            });
        });
    </script>


</body>

<!-- Mirrored from coursemat.xyz/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Feb 2024 20:39:12 GMT -->
</html>
