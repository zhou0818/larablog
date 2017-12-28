<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-header">
    <div class="container">
        <a class="navbar-brand" href="{{ route('root') }}">LaraBlog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item {{ active_class(if_route('articles.index')) }}">
                    <a class="nav-link" href="{{ route('articles.index') }}"><i class="fas fa-code"></i> 所有文章</a>
                </li>
                <li class="nav-item {{ active_class((if_route('categories.show')&&if_route_param('category',1))) }}">
                    <a class="nav-link" href="{{ route('categories.show',1) }}"><i class="fab fa-python"></i> 玩蛇之路</a>
                </li>
                <li class="nav-item {{ active_class((if_route('categories.show')&&if_route_param('category',2))) }}">
                    <a class="nav-link" href="{{ route('categories.show',2) }}"><i class="fab fa-laravel"></i> laravel踩坑</a>
                </li>
                <li class="nav-item {{ active_class((if_route('categories.show')&&if_route_param('category',3))) }}">
                    <a class="nav-link" href="{{ route('categories.show',3) }}"><i class="fab fa-vuejs"></i> Vue探索</a>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav my-2 my-lg-0">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">注册</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span style="margin-right:8px; margin-top:-5px;">
                                <img src="{{ Auth::user()->avatar }}"
                                     class="rounded-circle" width="30px" height="30px">
                            </span>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('users.show',Auth::id()) }}">个人中心</a>
                            <a class="dropdown-item" href="{{ route('users.edit',Auth::id()) }}">编辑资料</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                退出登录
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>