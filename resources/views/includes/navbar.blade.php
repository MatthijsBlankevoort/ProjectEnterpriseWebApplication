@if (session('message'))

<div class="alert alert-info"><i class="fa fa-info-circle" aria-hidden="true"></i> {{ session('message') }}</div>

@endif

<nav class="navbar sticky-top navbar-light bg-faded">
    <div id="hamburgerdiv" class="fixedtop">
        <div id="nav-icon" onclick="openNav()">
        <span></span>
        <span></span>
        <span></span>
        <span></span>


        </div>
    </div>
    <div id="sidebar" class="sidenav">
        @guest
            <hr>
            <a href="/">Dashboard</a>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @else
            <a href="/profile">{{ Auth::user()->name }}</a>
            <hr>
            <a href="/">Dashboard</a>
            <a href="/submitpost">New Post</a>
            <a href="/home">Post Overview</a>


            <hr>
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
      <div id="hamburgerdiv-right" class="fixedtop">
          <div id="nav-icon-right" onclick="openNavRight()">
          <span></span>
          <span></span>
          <span></span>
          <span></span>


          </div>
      </div>
      <div id="sidebar-right" class="sidenav-right">
          <img src="images/logo-white.png" width="75%" height="" alt="">
          <hr>
              <a href="/">Issue 1</a>
              <a href="/">Issue 2</a>
              <a href="/">Issue 3</a>

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
</nav>
