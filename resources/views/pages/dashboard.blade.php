@extends('layouts.app') @section('content')

<div class="container">
	<div class="row">



		@foreach ($posts as $post)
		<?php
                $snippet = substr($post->post_text, 0, 200). '...';
                ?>

			<div class="col col-lg-4 col-md-6 col-sm-12">
				<div class="card text-black mb-3" style="max-width: 20rem;">
					<div class="card-header text-white text-center bg-primary">
						<h6> {{$post->category}} </h6>
					</div>
					@if ($post->image)
						<a href="/images/{{$post->image}}"><img alt="Great Idea" class="card-img-top cardimage" src="{{ asset('assets/images/' . $post->image) }}" width="100%"></a>
						@else
					<img alt="Great Idea" class="card-img-top cardimage" src="http://pipsum.com/435x310.jpg" width="100%">
					@endif

			<div class="card-body">
						<h4 class="card-title">{{$post->title}}</h4>
						<p class="card-text">{!! $snippet !!}</p>
						<div class="card-body text-right">
							<a class="text-right" data-target="#myModal{{$post->id}}" onclick="modal('{{$post->title}}', '{{$post->post_text}}')" data-toggle="modal"
							 href="#">Read more</a>
						</div>
						<div class="card-header">
							<div class="container-fluid row text-left">
                                @guest

                                @else

                                    @if(!in_array($post->id, $likes))
                                    <a href="#" class="upvote vote btn fa fa-thumbs-up fa-2x" data-id="{{$post->id}}"></a>
                                    @endif
                                    @if(in_array($post->id, $likes))
									<a href="#" class="downvote vote btn fa fa-thumbs-down fa-2x" data-id="{{$post->id}}"></a>
								    @endif
                                @endguest
								<h1 data-id="{{$post->id}}">{{$post->likes}}</h1>
								<p class="text-primary">Created on {{$post->created_at}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>

            <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="myModal{{$post->id}}" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle">{{$post->title}}</h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modalBody">
                            {{$post->post_text}}
                        </div>
						<div class="comment comment-form">
							<form method="post" action="/submitpost/createComment">
								<input type="hidden" name="post_id" value="80">
								<textarea name="comment_content" id="" class="comment-content"></textarea>
								<input name="submit" value="verzend" type="submit">
							</form>
						</div>
						<div class="comment comment-section">
							<h3>comments</h3>
							<p>haal comments van {{$post->id}}</p>


							@foreach($comments as $comment)
								@if($post->id == $comment->post_id)
									<p class="comment">{{$comment->comment}}</p>
								@endif
							@endforeach
						</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
                        </div>
                    </div>
                </div>
            </div>

		@endforeach


	</div>
</div>
<script>
	let modal = function (title, text){
            document.getElementById('modalTitle').innerHTML = title;
            document.getElementById('modalBody').innerHTML = text;
        }
</script>
@endsection
