@extends('layout')
@section('content')
<body>



<section class="banner-bottom-w3ls-agileinfo py-5">
    <!--/blog-->
    <div class="container py-md-3">
        <h3 class="heading text-capitalize mb-sm-5 mb-3"> {{ $collection->title }} </h3>
        <div class="row inner-sec-wthree-agileits">
            <div class="col-lg-8 blog-sp">
                <article class="blog-x row">
                    <div class="blog-img">

                            <img src="{{ asset('images/1.jpg') }}" alt="" class="img-fluid" />

                    </div>
                    <div class="blog_info">
                        <p>
                            {{ $collection->description }}
                        </p>


                    </div>
                    <div class="clearfix"></div>
                </article>
                <div class="comment-top">
                    <h4>Продукты</h4>
                    <div class="media mb-3">
                        <img src="images/t1.jpg" alt="" class="img-fluid">
                        <div class="media-body">
                            <h5 class="mt-0">Joseph Goh</h5>
                            <p>Lorem Ipsum convallis diam consequat magna vulputate malesuada. id dignissim sapien velit id felis ac cursus eros.
                                Cras a ornare elit.</p>
                        </div>
                    </div>
                    <div class="media">
                        <img src="images/t2.jpg" alt="" class="img-fluid">
                        <div class="media-body">
                            <h5 class="mt-0">Richard Spark</h5>
                            <p>Lorem Ipsum convallis diam consequat magna vulputate malesuada. id dignissim sapien velit id felis ac cursus eros.
                                Cras a ornare elit.</p>
                        </div>
                    </div>
                </div>

            </div>
            <aside class="col-lg-4 single-left">
                <div class="single-gd tech-btm">
                    <h4>Последние новости </h4>
                    <div class="blog-grids">
                        <div class="blog-grid-left">
                            <a href="single.html">
                                <img src=" {{ asset('images/a1.jpg') }}" class="img-fluid mb-0" alt="">
                            </a>
                        </div>
                        <div class="blog-grid-right">

                            <h5>
                                <a href="single.html">Pellentesque dui, non felis. Maecenas male</a>
                            </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-grids">
                        <div class="blog-grid-left">
                            <a href="single.html">
                                <img src="{{ asset('images/a2.jpg') }}" class="img-fluid mb-0" alt="">
                            </a>
                        </div>
                        <div class="blog-grid-right">

                            <h5>
                                <a href="single.html">Pellentesque dui, non felis. Maecenas male</a>
                            </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-grids">
                        <div class="blog-grid-left">
                            <a href="single.html">
                                <img src="{{ asset('images/a3.jpg') }}" class="img-fluid mb-0" alt="">
                            </a>
                        </div>
                        <div class="blog-grid-right">

                            <h5>
                                <a href="single.html">Pellentesque dui, non felis. Maecenas male</a>
                            </h5>
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                </div>

            </aside>

        </div>


    </div>

</section>


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
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
<!-- //js -->

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

</body>
@endsection
