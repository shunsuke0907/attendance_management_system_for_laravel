<header class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <a href={{ action('StaticPagesController@index') }} id="logo">勤怠管理システム</a>
        <nav>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href={{ action('StaticPagesController@index') }}>ホーム</a>
                </li>

                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            アカウント <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href={{ action('UsersController@show', $user->id) }}>勤怠情報表示</a></li>
                            <li><a href={{ action('UsersController@edit', $user) }}>設定</a></li>
                            <li class="divider"></li>
                            <li><a href={{ action('SessionsController@destroy') }}>ログアウト</a></li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href={{ action('SessionsController@add') }}>ログイン</a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</header>
