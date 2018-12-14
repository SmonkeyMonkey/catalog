@extends('layout')
@section('content')
<section class="banner-bottom-w3ls-agileinfo py-5">
    <div class="container py-md-3">
        <h2 class="heading text-capitalize mb-sm-5 mb-3"> {{ $product->title }} </h2>
        <div class="row inner-sec-wthree-agileits">
            <div class="col-lg-8 blog-sp">
                <article class="blog-x row">
                    <div class="blog-img">

                            <img src="{{ $product->getImage() }}" alt="" class="img-fluid" />

                    </div>
                    <div class="blog_info">
                        {!! $product->specifications !!}
                    </div>
                    <div class="clearfix"></div>
                </article>
                <div class="comment-top">
                    <h4>Похожие товары</h4>
                    <div class="related-post-carousel"><!--related post carousel-->
                        <div class="related-heading">
                            <h4>You might also like</h4>
                        </div>
                        <div class="items">

                                <div class="single-item">
                                    <a href="#">
                                        <img src="#" alt="">
                                        <p>DSDA</p>
                                    </a>
                                </div>


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


                <div class="single-gd">
                    <h3>Производитель</h3>
                    <h4>{{ $product->getBrandTitle() }}</h4>
                    <img src="{{ asset('images/a1.jpg') }}" class="img-fluid" alt="">
                    <p>Lorem Ipsum convallis diam consequat magna vulputate malesuada. id dignissim sapien velit id felis ac cursus eros.
                        Cras a ornare elit.</p>
                </div>

            </aside>

        </div>


    </div>

</section>
    @endsection

