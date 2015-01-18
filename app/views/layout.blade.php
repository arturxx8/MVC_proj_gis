<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/main.css') }}

    {{ HTML::script('js/jquery-1.8.1.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/main.js') }}

    {{ HTML::script('js/validation.js') }}

    {{ HTML::script('fancybox/jquery.mousewheel-3.0.2.pack.js') }}
    {{ HTML::script('fancybox/jquery.fancybox-1.3.1.js') }}
    {{ HTML::style('fancybox/jquery.fancybox-1.3.1.css') }}

    <script type="text/javascript">
        $(document).ready(function() {
            $("a#example1").fancybox();
            $("a[rel=example_group]").fancybox({
                'transitionIn'		: 'none',
                'transitionOut'		: 'none',
                'titlePosition' 	: 'over',
                'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
                    return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
                }
            });
        });
    </script>

</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <div class="nav-collapse collapse">
                <div class="row">
                    <div class="span8">
                        <ul class="nav">
                            <li class="active"><a href="/"><i class="icon-home"></i>&nbsp;Главная</a></li>
                            <li class="divider-vertical"></li>
                            <li><a href="/catalog" rel="tooltip" title="Каталог методических пособий">Каталог</a></li>
                        </ul>
                        {{ Form::open(array('url' => URL::route('search'), 'method' => 'POST', 'class'=>'navbar-search form-search')) }}
                            <div class="input-append">
                                {{Form::input('text','searchTextBox',null, array('class'=>'span3 search-query', 'placeholder'=>'Поиск по каталогу')) }}
                                {{ Form::submit('найти', array('class'=>'btn')) }}
                            </div>
                        {{Form::close()}}
                    </div>
                    <div class="span4">
                        <ul class="nav pull-right">
                            @if(Auth::check())
                                <li> {{ HTML::linkRoute('profile', 'Профиль' ) }}</li>
                                <li class="divider-vertical"></li>
                                <li> {{ HTML::linkRoute('logout', 'Выход ('.Auth::user()->name.')') }}</li>
                            @else
                                <li> {{ HTML::link('#authModal', 'Login',array('id'=>'authModalBtn', 'class'=>'pull-right', 'data-toggle'=>'modal', 'data-original-title'=>'Вход')) }} </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="hero-bg">
    <div class="hero-unit">
        <div class="container">
            <div class="row">
                <div class="span8">
                    <p>Санкт-Петербургское государственное бюджетное учреждение культуры <strong>"Государственный музей городской скульптуры"</strong></p>
                    <h1><a href="/">Библиотека музея</a></h1>
                </div>
                <div class="span4"></div>
            </div>
        </div>
    </div>
</div>

<div class="content clearfix">
    <div class="container">
        <div class="contentIndents">
            @if(Session::has('flash_notice'))
                <div id="flash_notice">{{ Session::get('flash_notice') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
</div>

<footer class="clearfix">
        <div class="container">
            <div class="contentIndents">
                <div class="row-fluid">
                    <div class="span4">
                        <address>
                            <strong>СПб ГБУК "ГМГС"</strong><br>
                            197101, Санкт-Петербург,<br>
                            Невский проспект 179<br>
                            <abbr title="Телефон">тел.</abbr>: +7 (812) 274 26 35
                        </address>
                        <address>
                            <strong>Разработано в Отделе ИТ:</strong><br>
                            <i class="icon-envelope icon-white"></i>&nbsp;<a href="mailto:it.gmgs@gmail.com">it.gmgs@gmail.com</a>
                        </address>
                    </div>

                    <div class="span8">
                        <ul class="footer-links">
                            <li class="pull-right"><a href="#"><i class="icon-arrow-up"></i>&nbsp;Наверх</a></li>
                            <li><a href="/index.php?p=korzina">Корзина</a></li>
                            <li><a href="/index.php?p=catalog">Каталог</a></li>
                            <!--Ссылка на ЛК-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</footer>

<div id="authModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><i class="icon-user"></i>&nbsp;Авторизация</h3>
    </div>
    <div class="modal-body">
        {{ Form::open(array('url' => 'login', 'method' => 'POST')) }}

        <div class="control-group">
            {{ Form::label('login', 'Логин', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::text('login', Input::old('login')) }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('password', 'Пароль', array('class'=>'control-label')) }}
            <div class="controls">
                {{ Form::password('password') }}
            </div>
        </div>
        <div class="control-group">

                {{ Form::label('password', 'Запомнить', array('class'=>'control-label', 'style'=>'display: inline;')) }}

                {{ Form::checkbox('remember', 'Запомнить') }}
                <br \><br \>
            <div class="controls">
                {{ Form::submit('Войти', array('class'=>'btn')) }}
                {{ Form::input('button', null, 'Регистрация', array('onclick'=>'window.location.href="'. URL::to('reg') .'";', 'class'=>'btn')) }}
            </div>
        </div>

        {{ Form::close() }}
    </div>
</div>

</body>
</html>