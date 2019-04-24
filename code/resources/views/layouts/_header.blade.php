<header class="fixed-top navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div>
            <a href={{ action('StaticPagesController@index') }} id="logo">勤怠管理システム</a>

            @if(Auth::check())
                @if (isAdmin())
                    <div class="user_position font_color_admin">
                        admin
                    </div>
                @else
                    <div class="user_position font_color_{{ positionInEnglish(Auth::user()) }}">
                        {{ positionInEnglish(Auth::user()) }}
                    </div>
                @endif
            @endif
        </div>

        <nav>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href={{ action('StaticPagesController@index') }} class="nav-link">ホーム</a>
                </li>

                @if(Auth::check())
                    @if (isAdmin())
                        @include('layouts._admin_header')
                    @else
                        @include('layouts._user_header')
                    @endif

                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle nav-link" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            アカウント
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <a href={{ action('UsersController@show', Auth::user()->id) }} class="dropdown-item">勤怠情報表示</a>
                            <a href={{ action('UsersController@edit', Auth::user()) }} class="dropdown-item">設定</a>
                            <div class="dropdown-divider"></div>
                            <a href={{ action('SessionsController@destroy') }} class="dropdown-item">ログアウト</a>
                        </div>
                    </div>
                @else
                    <li class="nav-item">
                        <a href={{ action('SessionsController@add') }} class="nav-link">ログイン</a>
                    </li>
                @endif
            </ul>
        </nav>
    </li>
</header>
