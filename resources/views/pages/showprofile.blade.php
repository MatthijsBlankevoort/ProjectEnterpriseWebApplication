@extends('layout.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col align-self-center">
			<div class="card">
				<h5 class="card-header">Profile</h5>
				<div class="card-body text-center">
					<div class="social-profile text-center">
						<a href="https://vlo.informatica.hva.nl/app/upload/users/1/1461/big_1461_5905195c50e8d_500747878.jpg?rand=5a0ed301eafe5"
						 class="expand-image">
							<img class="img-circle mt-3 mb-3" src="https://vlo.informatica.hva.nl/app/upload/users/1/1461/big_1461_5905195c50e8d_500747878.jpg?rand=5a0ed301eafe5"
							 alt="Picture">
						</a>
					</div>
					<!-- If user has slack, display the slack icon behind his name -->
					<h6 class="card-title">
						<i class="fa fa-slack" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="This user has Slack!"></i> First Name Last Name</h6>
							<h1>Name: {{$user->name}} </h1><br>
							<h1>Email: {{$user->email}}</h1>
					<hr>
					<h6>Role</h6>
					<p class="card-text small">Software Engineer</p>
					<hr>
					<div class="row">
						<div class="col-4">
							<h6>789</h6>
							<span class="badge badge-primary">Likes</span>
						</div>
						<div class="col-4">
							<h6>456</h6>
							<span class="badge badge-success">Posts</span>
						</div>
						<div class="col-4">
							<h6>123</h6>
							<span class="badge badge-warning">Projects</span>
						</div>
					</div>
					<hr>
		
					<div class="col-md-4 offset-md-4 mb-4">
						<button href="/profile/edit" class="btn btn-primary animated fadeInUp">
							<i class="fa fa-edit" aria-hidden="true"></i> Edit Profile</button>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection