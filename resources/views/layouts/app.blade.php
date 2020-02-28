
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"       content="width=device-width, initial-scale=1.0">
    <meta name="description"    content="Melayani dengan Integritas,Kami siap melayani, perawatan dan pengobatan kesehatan anda">
    <meta name="keywords"       content="kesehatan, klinik tangeb">
    <meta name="author"         content="gentamasbali.com">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Site title -->
    <title>@yield('title') - klinikpantiswasti.com</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo.png')}}">

    <!-- Bootstrap css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--Font Awesome css -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Normalizer css -->
    <link href="{{ asset('assets/css/normalize.css') }}" rel="stylesheet">

    <!-- Animate Css -->
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet">

    <!-- Owl Carousel css -->
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.transitions.css') }}" rel="stylesheet">

    <!-- Magnific popup css -->
    <link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet">

    <!-- Site css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Responsive css -->
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

 
<body>

    @yield('content')


    <!-- Footer area starts -->
    <footer class="footer-area">
        <div class="container">
            <p>&copy; 2019 Copyright klinikpantiswasti.com</p>
        </div>
    </footer>
    <!-- Footer area ends -->



    <!-- Latest jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- Owl Carousel js -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    <!-- Mixitup js -->
    <script src="{{ asset('assets/js/jquery.mixitup.js') }}"></script>

    <!-- Magnific popup js -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

    <!-- Waypoint js -->
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>

    <!-- Ajax Mailchimp js -->
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>


    <!-- Main js-->
    <script src="{{ asset('assets/js/main_script.js') }}"></script>


</body>

</html>
