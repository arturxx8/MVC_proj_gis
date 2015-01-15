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
                    <div class="span10">
                        <ul class="nav">
                            <li class="active"><a href="/"><i class="icon-home"></i>&nbsp;Главная</a></li>
                            <li class="divider-vertical"></li>
                            <li><a href="/index.php?p=catalog" rel="tooltip" title="Каталог методических пособий">Каталог</a></li>
                        </ul>
                        <form class="navbar-search form-search" action="/index.php?p=poisk" method="POST">
                            <div class="input-append">
                                <input type="text" class="span3 search-query" placeholder="Поиск по каталогу" name="searchTextBox">
                                <button type="submit" class="btn">Найти</button>
                            </div>
                        </form>
                    </div>
                    <div class="span2">

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
            @yield('content');
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
        <form class="form-horizontal" method="POST" action="/enter.php">
            <input type="hidden" name="act" value="login">
            <div class="control-group">
                <label class="control-label" for="inputEmail">Логин</label>
                <div class="controls">
                    <input type="text" id="inputEmail" placeholder="Логин" name="login">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword">Пароль</label>
                <div class="controls">
                    <input type="password" id="inputPassword" placeholder="Пароль" name="pass">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox"><input type="checkbox"> Запомнить</label>
                    <button type="submit" class="btn">Войти</button>
                    <script type="text/javascript">
                        function reg() {
                            window.location.href='/index.php?p=registr';
                        }
                    </script>
                    <button class="btn" type="button" onclick="reg()">Регистрация</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>