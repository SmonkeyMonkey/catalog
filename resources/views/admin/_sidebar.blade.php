<ul class="sidebar-menu">
    <li class="header">Здравствуйте,{{ Auth::user()->name }}  <span style='padding-left:40px;'> <a href="{{ route('logout') }}">Выход</a> </span></li>

    <li><a href="{{ route('index') }}"><i class="fa fa-sticky-note-o"></i> <span>Главная страница сайта</span></a></li>
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-sticky-note-o"></i> <span>Главная страница</span></a></li>

    <li><a href="{{ route('brand.index') }}"><i class="fa fa-sticky-note-o"></i> <span>Производители(Бренды)</span></a></li>
    <li><a href="{{ route('category.index') }}"><i class="fa fa-list-ul"></i> <span>Категории</span></a></li>
    <li><a href="{{ route('product.index') }}"><i class="fa fa-tags"></i> <span>Продукты</span></a></li>
    <li><a href="{{ route('collection.index') }}"><i class="fa fa-tags"></i> <span>Коллекции</span></a></li>
    <li>
        <a href="{{ route('question.index') }}">
            <i class="fa  fa-envelope"></i> <span>Вопросы</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{ $newQuestions }}</small>
            </span>
        </a>
    </li>
    <li><a href="{{ route('news.index') }}"><i class="fa fa-newspaper-o"></i> <span>Новости</span></a></li>
    <li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>
</ul>
