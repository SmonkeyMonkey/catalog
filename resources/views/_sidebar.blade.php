<div class="inner-page-banner" id="home">
    <!--Header-->
    <header>
        <div class="container agile-banner_nav">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <h1><a class="navbar-brand" href="{{ route('index') }}">In <span class="display"> Trend</span></a></h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('index') }}">Главная страница</a>
                        </li>
                        <li class="nav-item">
                            <a class="{{ request()->is('about') ? 'btn btn-primary disabled' : 'nav-link' }}" href="{{ route('about') }} ">О нас</a>
                        </li>
                        <li class="nav-item">
                            {{--<a class="nav-link" href="{{ route('services') }}">Услуги</a>--}}
                            <a class="{{ request()->is('services') ? 'btn btn-primary disabled' : 'nav-link' }}" href="{{ route('services') }} ">Услуги</a>
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
                            <a class="{{ request()->is('objects') ? 'btn btn-primary disabled' : 'nav-link' }}" href="{{ route('objects') }}">Объекты</a>
                        </li>
                        <li class="nav-item">
                            <a class="{{ request()->is('contacts') ? 'btn btn-primary disabled' : 'nav-link' }}" href="{{ route('contacts') }}">Контакты</a>
                        </li>

                        <li class="nav-item">
                            <a class="float-right" href="{{ route('admin.index') }}">админка</a>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>
    </header>
    <!--Header-->
</div>