@extends('layout')
@section('content')

    <section class="banner-bottom-w3ls-agileinfo py-5">
        <div class="container py-md-3">
            <h2 class="heading text-capitalize mb-sm-5 mb-3"> {{ $category->title }} </h2>
            <div class="row inner-sec-wthree-agileits">
                <div class="col-lg-8 blog-sp">
                    <article class="blog-x row">
                        <div class="blog-img">
                            <a href="single.html">
                                <img src="{{ $category->getImage() }}" alt="" class="img-fluid" />
                            </a>
                        </div>
                        <div class="blog_info">
                            <p>{!! $category->description !!}</p>
                        </div>
                        <div class="clearfix"></div>
                    </article>
                    <div class="comment-top">
                        <h4>Производители</h4>
                        @foreach($brands as $brand)
                        <div class="media mb-3">
                            <img src="{{ $brand->getImage() }}" alt="" class="img-fluid">
                            <div class="media-body">
                                <h5 class="mt-0">{{ $brand->title }}</h5>
                                <h6><p>{!! $brand->description !!}</p></h6>
                                @if($brand->collections->isNotEmpty())
                                    <label>Коллекции:</label>
                                     @foreach($brand->collections as $collection)
                                        <a href="{{ route('collections.show',$collection->slug) }}">{{ $collection->title }}</a>
                                      @endforeach
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
    </section>
    @endsection