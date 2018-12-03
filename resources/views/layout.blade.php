<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="ru">
<head>
    <title> Intrend Interior Category Flat Bootstrap Responsive Website Template | Index : W3layouts</title>

    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Intrend Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--// Meta tag Keywords -->

    <link href="{{ asset('css/slider.css') }}" type="text/css" rel="stylesheet" media="all">

    <!-- css files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all" /> <!-- Style-CSS -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.css') }}"> <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->

    <!-- testimonials css -->
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}" type="text/css" media="screen" property="" /><!-- flexslider css -->
    <!-- //testimonials css -->

    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
    <!-- //web-fonts -->

</head>

<body>

@include('_sidebar');
@yield('content')

<!-- footer -->
<footer class="py-5">
    <div class="container py-md-5">
        <div class="footer-logo mb-5 text-center">
            <a class="navbar-brand" href="index.html">In <span class="display"> Trend</span></a>
        </div>
        <div class="footer-grid">
            <div class="social mb-4 text-center">
                <ul class="d-flex justify-content-center">
                    <li class="mx-2"><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                    <li class="mx-2"><a href="#"><span class="fab fa-twitter"></span></a></li>
                    <li class="mx-2"><a href="#"><span class="fas fa-rss"></span></a></li>
                    <li class="mx-2"><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                    <li class="mx-2"><a href="#"><span class="fab fa-google-plus"></span></a></li>
                </ul>
            </div>
            <div class="list-footer">
                <ul class="footer-nav text-center">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="services.html">Services</a>
                    </li>
                    <li>
                        <a href="projects.html">Gallery</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="agileits_w3layouts-copyright mt-4 text-center">
                <p>© 2018 Intrend. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="=_blank"> W3layouts </a></p>
            </div>
        </div>
    </div>
</footer>
<!-- footer -->

<!-- js-scripts -->

<!-- js -->
<script type="text/javascript" src="{{ asset('js/jquery-2.2.3.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
<!-- //js -->

<!-- banner js -->
<script src="{{ asset('js/snap.svg-min.js') }}"></script>
<script src="{{ asset('js/main.js') }} "></script> <!-- Resource jQuery -->
<!-- //banner js -->

<!-- flexSlider --><!-- for testimonials -->

<script defer src="{{ asset('js/jquery.flexslider.js') }}"></script>
<script type="text/javascript">
    $(window).load(function(){
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
</script>
<!-- //flexSlider --><!-- for testimonials -->

<!-- start-smoth-scrolling -->
<script src="{{ asset('js/SmoothScroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -->
<!-- start-smoth-scrolling -->

<!-- //js-scripts -->

</body>
</html>