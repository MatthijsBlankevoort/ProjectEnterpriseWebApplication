@extends('layouts.app') @section('content')
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
					{!! Form::open(['action' => 'ProfilesController@store', 'method' => 'POST']) !!}
					<div class="col-md-6 offset-md-3 col-sm-12 mb-3">
						<div class="input-group">
							{{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
						</div>
					</div>

					<div class="col-md-6 offset-md-3 col-sm-12 mb-3">
						<div class="input-group">
							{{Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'Last name'])}}
						</div>
					</div>

					<div class="col-md-6 offset-md-3 col-sm-12 mb-3">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
							{{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'email'])}}
						</div>
					</div>

					<div class="col-md-6 offset-md-3 col-sm-12 mb-3">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-key" aria-hidden="true"></i>
							</span>
							{{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'])}}
						</div>
					</div>

					<div class="col-md-4 offset-md-4 col-sm-12 mb-3">
						<div class="input-group">
							<!-- If slack account is not linked yet: -->
							<button class="btn btn-outline-info btn-block text-center animated fadeInUp">
								<i class="fa fa-slack" aria-hidden="true"></i> Link Slack</button>
						</div>
					</div>
					{{Form::submit('Submit', ['class' => 'btn btn-primary'])}} {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
