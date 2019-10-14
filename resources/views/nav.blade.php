        <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0px !important;">
            <div class="container">
                <div style="border-radius: 50%;background-color: blue">
                    <a class="navbar-brand" href="{{ url('/') }}" style="position: relative;background: white;border-radius: 50%;top: 0px;">
                            <img src="/image/ICONWEB.png" width="20" alt="" style="bottom: 8px;position: relative;">
                    </a>
                </div>
                

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Inciar Sesion</a></li>
                            <li><a href="{{ route('register') }}">Registrarse</a></li>
                        @else 
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @if(Auth::user()->type == "admin")
                                        <li><a href="{{route('admin.inicio')}}">Mi Perfil</a></li>
                                    @elseif(Auth::user()->type == "encargado")
                                        <li><a href="{{route('encargado.inicio')}}">Mi Perfil</a></li>
                                    @else
                                        <li><a href="{{route('cliente.inicio')}}">Mi Perfil</a></li>                
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesion
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>