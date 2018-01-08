@if (session('message'))

<div class="alert alert-info">
	<i class="fa fa-info-circle" aria-hidden="true"></i> {{ session('message') }}</div>

@endif

<div id="hamburgerdiv">
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
	<a href="{{ route('logout') }}" onclick="event.preventDefault();  
                        document.getElementById('logout-form').submit();">
		Logout
	</a>


	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		{{ csrf_field() }}
	</form>

	@endguest

</div>


@guest @else @if(Request::is('/') || Request::is('sorted'))
<div class="dropdown">
	<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
	 aria-expanded="false">
		Sort By
	</a>

	<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
		<a href="{{ url('/sorted') }}" class="btn btn-block btn-lg">Likes</a>
		<a href="{{ url('/') }}" class="btn btn-block btn-lg">Most Recent</a>
	</div>
</div>
@endif @endguest
