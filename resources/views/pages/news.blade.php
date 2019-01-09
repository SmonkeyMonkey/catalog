@extends('layout')
@section('content')
    <section class="banner-bottom-w3ls-agileinfo py-5">
        <!--/blog-->
        <div class="container py-md-3">
            <h2 class="heading text-capitalize mb-sm-5 mb-3"> {{ $news->title }} </h2>
            <div class="row inner-sec-wthree-agileits">
                <div class="col-lg-8 blog-sp">
                    <article class="blog-x row">
                        <div class="blog-img">
                            <a href="{{ route('article.show',$news->slug) }}">
                                <img src="{{ $news->getImage() }}" alt="" class="img-fluid" />
                            </a>
                        </div>
                        <div class="blog_info">



                            <p>{!! $news->text !!}</p>

                        </div>
                        <div class="clearfix"></div>
                    </article>


                </div>
                <aside class="col-lg-4 single-left">
                    <div class="single-gd tech-btm">
                        <h4>Последние новости </h4>
                        @foreach($otherNews as $item)
                        <div class="blog-grids">
                            <div class="blog-grid-left">
                                <a href="{{ route('article.show',$item->slug) }}">
                                    <img src="{{ $item->getImage() }}" class="img-fluid mb-0" alt="">
                                </a>
                            </div>
                            <div class="blog-grid-right">

                                <h5>
                                    <a href="{{ route('article.show',$item->slug) }}">{!! $item->description !!}</a>
                                </h5>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        @endforeach

                    </div>

                </aside>

            </div>


        </div>

    </section>
    @endsection