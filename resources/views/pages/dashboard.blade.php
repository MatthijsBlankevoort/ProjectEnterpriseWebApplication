@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">



		@foreach ($posts as $post)
		<?php
                $snippet = substr($post->post_text, 0, 200). '...';
                ?>

			<div class="col col-lg-4 col-md-6 col-sm-12">
				<div class="card text-black mb-3" style="max-width: 20rem;">
					<div class="card-header bg-primary">

					</div>
					<img alt="Great Idea" class="card-img-top cardimage" src="http://pipsum.com/435x310.jpg" width="100%">
					<div class="card-body">
						<h4 class="card-title">{{$post->title}}</h4>
						<p class="card-text">{{$snippet}}</p>
						<div class="card-body text-right">
							<a class="text-right" data-target="#myModal" onclick="modal('{{$post->title}}', '{{$post->post_text}}')" data-toggle="modal"
							 href="#">Read more</a>
						</div>
						<div class="card-header">
							<div class="container-fluid row text-left">
								@if(!in_array($post->id, $likes))
								<a href="{{action('LikesController@store',$post)}}" class="btn fa fa-thumbs-up fa-2x"></a>
								@endif
								@if(in_array($post->id, $likes))
								<a href="{{action('LikesController@update',$post)}}" class="btn fa fa-thumbs-down fa-2x"></a>
								@endif
								<h1>{{$post->likes}}</h1>
								<p class="text-primary">Created on {{$post->created_at}}</p>
							</div>
							<span class="badge badge-pill badge-primary">{{$post->category}}</span>
						</div>
					</div>
				</div>
			</div>
		@endforeach

			<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="modalTitle">Modal title</h5>
							<button aria-label="Close" class="close" data-dismiss="modal" type="button">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" id="modalBody">
							...
						</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>
<script>
	let modal = function (title, text){
            document.getElementById('modalTitle').innerHTML = title;
            document.getElementById('modalBody').innerHTML = text;
        }
</script>
@endsection
