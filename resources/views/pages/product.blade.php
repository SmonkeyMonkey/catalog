@extends('layout')
<head>
    <meta charset="utf-8">
    <title>{{ $product->meta_title }}</title>
    <meta name="description" content="{{ $product->meta_description }}">
    <meta name="keywords" content="{{ $product->meta_keywords }}">
</head>
@section('content')
    @if ($errors->any())
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
<section class="banner-bottom-w3ls-agileinfo py-5">
    <div class="container py-md-3">
        @if(session('message'))
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Спасибо за Ваш вопрос!</h4>
                <h5><p>После ответа нашего менеджера,он будет опубликован на данной странице</p></h5>
            </div>
        @endif
        <h2 class="heading text-capitalize mb-sm-5 mb-3"> {{ $product->title }} </h2>
        <h4 class="heading text-capitalize mb-sm-5 mb-3"> Производитель : {{ $product->brand->title }} </h4>
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
                <!-- коллекция-->
                <div class="comment-top">
                    <div class="gallery py-5">
                        <div class="container py-sm-3">
                            @if($collectionProduct->products->isNotEmpty())
                                <h2 class="heading text-capitalize mb-sm-5 mb-3"> Все продукты коллекции {{ $collectionProduct->title }} </h2>
                                <div class="row gallery-grids">
                                    @foreach($collectionProduct->products as $item)
                                        <div class="col-lg-3 col-md-4 col-sm-6 ggd baner-top small wow fadeInLeft animated" data-wow-delay=".4s">
                                            <a href="{{ route('products.show',['collection'=>$collectionProduct->slug,'product'=>$item->slug])}}" class="b-link-stripe b-animate-go  swipebox">
                                                <div class="gal-spin-effect vertical">
                                                    <img src="{{ $item->getImage() }}" alt=" " />
                                                    <div class="gal-text-box">
                                                        <div class="info-gal-con">
                                                            <h4>{{ $item->title }}</h4>
                                                            <span class="separator"></span>
                                                            <p>Цена:{{ $item->price }}</p>
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
                <div class="comment-top">
                    <h4>Хотите задать вопрос по данному продукту ?</h4>
                    <div class="comment-bottom">
                        {{ Form::open(['route' => 'question.add', 'method' => 'post']) }}
                            <input class="form-control" type="text" name="name" placeholder="Как Вас зовут ?" value="{{ old('name') }}">
                           <input type="hidden" name="product_id" value="{{$product->id}}">
                            <textarea name="message" placeholder="Ваш вопрос" >{{ old('message') }}</textarea>
                        {!! app('captcha')->display() !!}
                        <input type="submit" class="form-control" value="Отправить">
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="comment-top">
                    @if($product->question->isEmpty())
                        <h4>Еще никто не задал вопрос по данному товару</h4>
                        @else
                    <h4>Вопрос-ответ</h4>
                    @endif
                    @foreach($product->question as $question)
                    <div class="media mb-3">
                        <img src="{{ asset('images/noavatar.jpg') }}" alt="" class="img-fluid">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $question->name }}</h5>
                            <p>{!! $question->message !!}</p>
                            <hr>
                            <p>{!! $question->answer ?? '' !!}</p>
                        </div>
                    </div>
                        @endforeach
                </div>

            </div>
            <aside class="col-lg-4 single-left">
                <div class="single-gd">
                    <h3>Идентификатор(ID) продукта : {{ $product->id }}</h3>
                    <h4>Стоимость : {{ $product->price }}</h4>
                </div>
            </aside>

        </div>


    </div>

</section>
    @endsection

