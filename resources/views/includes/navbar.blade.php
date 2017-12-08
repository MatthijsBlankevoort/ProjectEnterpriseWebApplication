
    <div id="hamburgerdiv" class="fixedtop">
        <div id="nav-icon" onclick="openNav()">
        <span></span>
        <span></span>
        <span></span>
        <span></span>


        </div>
    </div>
    <div id="sidebar" class="sidenav">
        <img src="images/logo-white.png" width="75%" height="" alt="">
        <hr>
        @guest
            <a href="/">Dashboard</a>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @else
            <a href="/home">{{ Auth::user()->name }}</a>
            <a href="/">Dashboard</a>
            <a href="/submitpost">New Post</a>
            <a href="/profile/create">Create Profile</a>



            <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            Logout
            </a>


          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>

        @endguest
      </div>


        <!-- <ul class="nav navbar-nav navbar-right"> -->
            <!-- Authentication Links -->
            <!-- @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>


    </div> -->
