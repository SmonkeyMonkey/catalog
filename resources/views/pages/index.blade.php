
<!DOCTYPE html>
<html lang="ru">
<head>
    <title> Intrend Interior Category Flat Bootstrap Responsive Website Template | Index : W3layouts</title>

    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--// Meta tag Keywords -->

    <link href="{{ asset('css/front.css') }}" type="text/css" rel="stylesheet" media="all">

    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
    <!-- //web-fonts -->

</head>

<body>

<!-- banner -->
<div class="banner" id="home">
    <div class="cd-radial-slider-wrapper">

        <!--Header-->
        <header>
            <div class="container agile-banner_nav">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <h6><a class="navbar-brand" href="{{ route('index') }}">In <span class="display">Trend</span></a></h6>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item ">
                                <a class="{{ request()->is('/') ? 'nav-link disabled' : 'nav-link' }}" href="{{ route('index') }} ">Главная страница</a>
                                {{--<a class="btn btn-primary disabled" href="{{ route('index') }}">Главная страница <span class="sr-only">(current)</span></a>--}}
                            </li>
                            <li class="nav-item">
                                <a class="{{ request()->is('about') ? 'nav-link disabled' : 'nav-link' }}" href="{{ route('about') }} ">О нас</a>
                                {{--<a class="nav-link" href="{{ route('about') }}">О Нас</a>--}}
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('services') }}">Услуги</a>
                            </li>

                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Каталог
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu agile_short_dropdown">
                                    @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('category.brand',$category->slug) }}">{{ $category->title }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('objects') }}">Проекты</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contacts') }}">Контакты</a>
                            </li>
                            @auth()
                                <li class="nav-item nav-fill">
                                    <a class="nav-link" href="{{ route('admin.index') }}">админ</a>
                                </li>
                            @endauth
                        </ul>
                    </div>

                </nav>
            </div>
        </header>
        <!--Header-->

        <ul class="cd-radial-slider" data-radius1="60" data-radius2="1364" data-centerx1="110" data-centerx2="1290">
            <li class="visible">
                <div class="svg-wrapper">
                    <svg viewBox="0 0 1400 800">
                        <title>Animated SVG</title>
                        <defs>
                            <clipPath id="cd-image-1">
                                <circle id="cd-circle-1" cx="110" cy="400" r="1364"/>
                            </clipPath>
                        </defs>
                        <image height='800px' width="1400px" clip-path="url(#cd-image-1)" xlink:href="images/1.jpg"></image>
                    </svg>
                </div> <!-- .svg-wrapper -->
                <div class="cd-radial-slider-content">
                    <div class="wrapper">
                        <div class="text-center">
                            <h2>Interior Architecture </h2>
                            <h3> Furniture </h3>

                        </div>
                    </div>
                </div> <!-- .cd-radial-slider-content -->
            </li>
            <li class="next-slide">
                <div class="svg-wrapper">
                    <svg viewBox="0 0 1400 800">
                        <title>Animated SVG</title>
                        <defs>
                            <clipPath id="cd-image-2">
                                <circle id="cd-circle-2" cx="1290" cy="400" r="60"/>
                            </clipPath>
                        </defs>
                        <image height='800px' width="1400px" clip-path="url(#cd-image-2)" xlink:href="images/2.jpg"></image>
                    </svg>
                </div> <!-- .svg-wrapper -->
                <div class="cd-radial-slider-content text-center">
                    <div class="wrapper">
                        <div class="text-center">
                            <h3>Interior Furniture </h3>
                            <h3> Architecture </h3>


                        </div>
                    </div>
                </div> <!-- .cd-radial-slider-content -->
            </li>
            <li>
                <div class="svg-wrapper">
                    <svg viewBox="0 0 1400 800">
                        <title>Animated SVG</title>
                        <defs>
                            <clipPath id="cd-image-3">
                                <circle id="cd-circle-3" cx="110" cy="400" r="60"/>
                            </clipPath>
                        </defs>
                        <image height='800px' width="1400px" clip-path="url(#cd-image-3)" xlink:href="images/3.jpg"></image>
                    </svg>
                </div> <!-- .svg-wrapper -->
                <div class="cd-radial-slider-content text-center">
                    <div class="wrapper">
                        <div class="text-center">
                            <h3>Interior Design </h3>
                            <h3> Architecture </h3>

                        </div>
                    </div>
                </div> <!-- .cd-radial-slider-content -->
            </li>
            <li class="prev-slide">
                <div class="svg-wrapper">
                    <svg viewBox="0 0 1400 800">
                        <title>Animated SVG</title>
                        <defs>
                            <clipPath id="cd-image-4">
                                <circle id="cd-circle-4" cx="110" cy="400" r="60"/>
                            </clipPath>
                        </defs>
                        <image height='800px' width="1400px" clip-path="url(#cd-image-4)" xlink:href="images/4.jpg"></image>
                    </svg>
                </div> <!-- .svg-wrapper -->
                <div class="cd-radial-slider-content text-center">
                    <div class="wrapper">
                        <div class="text-center">
                            <h3>Interior Architecture </h3>
                            <h3> furniture </h3>

                        </div>
                    </div>
                </div> <!-- .cd-radial-slider-content -->
            </li>
        </ul> <!-- .cd-radial-slider -->
        <ul class="cd-radial-slider-navigation">
            <li><a href="#0" class="next"><i class="fas fa-chevron-right"></i></a></li>
            <li><a href="#0" class="prev"><i class="fas fa-chevron-left"></i></a></li>
        </ul> <!-- .cd-radial-slider-navigation -->
    </div> <!-- .cd-radial-slider-wrapper -->
</div>
<!-- //banner -->

<!-- about -->
<section class="wthree-row py-5">
    <div class="container py-lg-5 py-3">
        <h3 class="heading text-capitalize mb-sm-5 mb-4"> О Нас </h3>
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

<!-- why choose us -->
<section class="why">
    <div class="layer py-5">
        <div class="container py-3">
            <h3 class="heading text-capitalize mb-sm-5 mb-4"> Почему мы ? </h3>
            <div class="row why-grids">
                <div class="col-lg-3 col-sm-6 why-grid1">
                    <i class="fas icon fa-tags"></i>
                    <h4>10 year Gurantee</h4>
                    <p class="mb-lg-5 mb-4">taciti aptent</p>

                </div>
                <div class="col-lg-3 col-sm-6 mt-sm-0 mt-5 why-grid1">
                    <i class="fas icon fa-puzzle-piece"></i>
                    <h4>Comfortable support</h4>
                    <p class="mb-lg-5 mb-4">taciti aptent</p>

                </div>
                <div class="col-lg-3 col-sm-6 mt-lg-0 mt-5 why-grid1">
                    <i class="fab icon fa-angellist"></i>
                    <h4>Quality In Furniture</h4>
                    <p class="mb-lg-5 mb-4">taciti aptent</p>

                </div>
                <div class="col-lg-3 col-sm-6 mt-lg-0 mt-5 why-grid1">
                    <i class="fas icon fa-dollar-sign"></i>
                    <h4>100% Money Back</h4>
                    <p class="mb-lg-5 mb-4">taciti aptent</p>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- //why choose us -->

<!-- team -->
<section class="w3ls-team py-5">
    <div class="container py-3">
        <h3 class="heading text-capitalize mb-sm-5 mb-4"> Наши поставщики </h3>
        <div class="row team-grids">
            @foreach($brands as $brand)
            <div class="col-md-3 col-sm-6 w3_agileits-team1">
                <img class="img-fluid" src="{{ $brand->getImage() }}" alt="">
                <h5 class="mt-3">{{ $brand->title }}</h5>
                <p>{!! $brand->description !!}</p>

            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- //team -->

<!-- Clients -->
<section class="clients-main">
    <div class="wthree-different-dot1 py-5">
        <div class="container py-sm-3">
            <!-- Owl-Carousel -->
            <h3 class="heading text-capitalize mb-sm-5 mb-4">Последние вопросы </h3>
            <div class="cli-ent">
                <section class="slider">
                    <div class="flexslider">
                        <ul class="slides">
                            @foreach($questions as $question)
                            <li>
                                <div class="item g1">
                                    <div class="agile-dish-caption">
                                        <img class="lazyOwl" src="{{ asset('images/noavatar.jpg') }}" alt="" />
                                        <h5>{{ $question->name }}</h5>
                                        <h4>{{ $question->message }}</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="para-w3-agile"> {!! $question->answer !!}</div>
                                </div>
                            </li>
                          @endforeach
                        </ul>
                    </div>
                </section>
            </div>
            <!--// Owl-Carousel -->
        </div>
    </div>
</section>
<!--// Clients -->

<!-- latest news -->
<div class="news py-5 my-sm-3">
    <div class="container">
        <h3 class="heading text-capitalize mb-sm-5 mb-4"> Последние новости </h3>
        <div class="row news-grids">
            @foreach($news as $article)
            <div class="col-md-4 newsgrid1 text-center">
                <img src="{{ $article->getImage() }}" alt="news image" class="img-fluid" />
                <h4 class=" mt-4 text-uppercase">{{ $article->title }}</h4>
                <p class="mt-4"> {!! $article->description !!}</p>
                <a href="{{ route('article.show',$article->slug) }}">View Post</a>
            </div>
                @endforeach
        </div>
    </div>
</div>
<!-- //latest news -->

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
<script type="text/javascript" src="{{ asset('js/front.js')}}"></script>
<!-- //js -->


<!-- flexSlider --><!-- for testimonials -->

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

            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };


        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -->
<!-- start-smoth-scrolling -->

<!-- //js-scripts -->

</body>
</html>