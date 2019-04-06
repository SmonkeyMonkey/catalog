@extends('layout')
@section('content')
<body>
<section class="banner-bottom-w3ls-agileinfo py-5">
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
                            {!! $collection->description !!}
                        </p>


                    </div>
                    <div class="clearfix"></div>
                </article>
                <div class="comment-top">
                    <div class="gallery py-5">
                        <div class="container py-sm-3">
                            @if(!$collection->products->isEmpty())
                            <h2 class="heading text-capitalize mb-sm-5 mb-3"> Продукты </h2>
                                <div class="row gallery-grids">
                                @foreach($collection->products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 ggd baner-top small wow fadeInLeft animated" data-wow-delay=".4s">
                                    <a href="{{ route('products.show',['collection'=>$collection->slug,'product'=>$product->slug])}}" class="b-link-stripe b-animate-go  swipebox">
                                        <div class="gal-spin-effect vertical">
                                            <img src="{{ $product->getImage() }}" alt=" " />
                                            <div class="gal-text-box">
                                                <div class="info-gal-con">
                                                    <h4>{{ $product->title }}</h4>
                                                    <span class="separator"></span>
                                                    <p>Стоимость:{{ $product->getPrice() }}</p>
                                                    <span class="separator"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                    @endforeach
                            </div>
                                @endif
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


</body>
@endsection
