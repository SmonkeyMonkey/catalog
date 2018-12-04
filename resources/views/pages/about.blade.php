@extends('layout')
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--// Meta tag Keywords -->

    <!-- css files -->
    <link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS -->
    <link rel="stylesheet" href="css/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->

    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
    <!-- //web-fonts -->


@section('content')
<!-- about -->
<section class="wthree-row py-5">
    <div class="container py-lg-5 py-sm-3">
        <h3 class="heading text-capitalize mb-sm-5 mb-4"> О нас </h3>
        <div class="row d-flex justify-content-center">
            <div class="card col-lg-3 col-md-6 border-0">
                <div class="card-body bg-light pl-0 pr-0 pt-0">
                    <h5 class=" card-title titleleft">Dining Chairs</h5>
                    <p class="card-text mb-3">Class aptent taciti sociosqu adis litora torquent per conubia nostra per inceptos himenaeos.</p>

                </div>
                <img class="card-img-top" src="images/a1.jpg" alt="Card image cap">
            </div>
            <div class="card col-lg-3 col-md-6 border-0 mt-md-0 mt-5">
                <img class="card-img-top" src="images/a2.jpg " alt="Card image cap ">
                <div class="card-body bg-light text-center">
                    <h5 class="card-title pt-3">Office Chairs</h5>
                    <p class="card-text mb-3 ">Class aptent taciti sociosqu per conubia nostra per inceptos ad himenaeos.</p>

                </div>
            </div>
            <div class="card col-lg-3 col-md-6 border-0 mt-lg-0 mt-5 ">
                <img class="card-img-top " src="images/a3.jpg " alt="Card image cap ">
                <div class="card-body bg-light text-center">
                    <h5 class="card-title pt-3">Home Chairs</h5>
                    <p class="card-text mb-3 ">Class aptent taciti sociosqu per conubia nostra per inceptos ad himenaeos.</p>

                </div>
            </div>
            <div class="card col-lg-3 col-md-6 border-0 mt-lg-0 mt-5 text-right">
                <div class="card-body bg-light pl-0 pr-0 pt-0">
                    <h5 class="card-title titleright">Architecture</h5>
                    <p class="card-text mb-3">Class aptent taciti sociosqu adis litora torquent per conubia nostra per inceptos himenaeos.</p>

                </div>
                <img class="card-img-top " src="images/a4.jpg " alt="Card image cap ">
            </div>
        </div>
    </div>
</section>
<!-- //about -->

<!-- counter -->
<div class="services-bottom stats">
    <div class="wthree-different-dot1 py-5">
        <div class="container py-lg-5 pb-3">
            <h3 class="heading text-capitalize mb-5"> Наши продукты </h3>
            <div class="row wthree-agile-counter">
                <div class="col-sm-3 col-6 w3_agile_stats_grid-top">
                    <div class="w3_agile_stats_grid">
                        <div class="agile_count_grid_left">
                            <span class="fas fa-bath" aria-hidden="true"></span>
                        </div>
                        <div class="agile_count_grid_right">
                            <p class="counter">324</p>
                        </div>
                        <div class="clearfix"> </div>
                        <h4>Outdoor Furniture</h4>
                    </div>
                </div>
                <div class="col-sm-3 col-6 w3_agile_stats_grid-top">
                    <div class="w3_agile_stats_grid">
                        <div class="agile_count_grid_left">
                            <span class="fab fa-asymmetrik"></span>
                        </div>
                        <div class="agile_count_grid_right">
                            <p class="counter">543</p>
                        </div>
                        <div class="clearfix"> </div>
                        <h4>Sofas and couches</h4>
                    </div>
                </div>
                <div class="col-sm-3 col-6 mt-sm-0 mt-5 w3_agile_stats_grid-top">
                    <div class="w3_agile_stats_grid">
                        <div class="agile_count_grid_left">
                            <span class="fas fa-bed" aria-hidden="true"></span>
                        </div>
                        <div class="agile_count_grid_right">
                            <p class="counter">434</p>
                        </div>
                        <div class="clearfix"> </div>
                        <h4>Chairs and tables</h4>
                    </div>
                </div>
                <div class="col-sm-3 col-6 mt-sm-0 mt-5 w3_agile_stats_grid-top">
                    <div class="w3_agile_stats_grid">
                        <div class="agile_count_grid_left">
                            <span class="fab fa-first-order" aria-hidden="true"></span>
                        </div>
                        <div class="agile_count_grid_right">
                            <p class="counter">234</p>
                        </div>
                        <div class="clearfix"> </div>
                        <h4>Furnitures</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //counter -->

<!-- about  bottom -->
<section class="wthree-row py-5">
    <div class="container py-3">
        <h3 class="heading text-capitalize mb-5"> Наша история</h3>
        <div class="row bottom-grids">
            <div class="col-lg-4 bottom-grid1">
                <h3 class="mb-2">Future Of Interior</h3>
                <h3> Architecture</h3>
                <p class=""> Phasellus iaculis sapien in tellus gravida, lorem placerat lacus elementum. Nulla vitae lacus nec elit mollis pretium. Sed sed nunc lectus. Integer vehicula elit eget dignissim congue. Aliquam sed ultricies tortor. Curabitur ut odio vestib ulum consectetur.</p>
            </div>
            <div class="col-lg-4 text-center bottom-grid2">
                <h4>INTREND</h4>
            </div>
            <div class="col-lg-4 bottom-grid1">
                <p class="mb-4"> Phasellus iaculis sapien in tellus gravida, lorem placerat lacus elementum. Nulla vitae lacus nec elit mollis pretium. Sed sed nunc lectus. Integer vehicula elit eget dignissim congue. Aliquam sed ultricies tortor. Curabitur ut odio vestib ulum consectetur.</p>

            </div>
        </div>
    </div>
</section>
<!-- //about  bottom -->
    @endsection

<!-- js -->
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
<!-- //js -->

<!-- stats -->
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.countup.js"></script>
<script>
    $('.counter').countUp();
</script>
<!-- //stats -->

<!-- start-smoth-scrolling -->
<script src="js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
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