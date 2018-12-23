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
                    <div class="gallery py-5">
                        <div class="container py-sm-3">
                            @if($product->related()->isNotEmpty())
                                <h2 class="heading text-capitalize mb-sm-5 mb-3"> Похожие продукты </h2>
                                <div class="row gallery-grids">
                                    @foreach($product->getRelatedProduct() as $item)
                                        <div class="col-lg-3 col-md-4 col-sm-6 ggd baner-top small wow fadeInLeft animated" data-wow-delay=".4s">
                                            <a href="{{ route('products.show',['collection'=>$collection->slug,'product'=>$item->slug])}}" class="b-link-stripe b-animate-go  swipebox">
                                                <div class="gal-spin-effect vertical">
                                                    <img src="{{ $item->getImage() }}" alt=" " />
                                                    <div class="gal-text-box">
                                                        <div class="info-gal-con">
                                                            <h4>{{ $item->title }}</h4>
                                                            <span class="separator"></span>
                                                            <p>Стоимость:{{ $item->getPrice() }}</p>
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


                <div class="single-gd">
                    <h3>Производитель</h3>
                    <h4>{{ $product->getBrandTitle() }}</h4>

                </div>

            </aside>

        </div>


    </div>

</section>
    @endsection

