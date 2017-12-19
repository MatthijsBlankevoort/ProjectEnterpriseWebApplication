@extends('layouts.app')
@section('content')
    <div id="main">
	<div class="container">
		{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'files' => 'true']) !!}
			<div class="form-group w-50">
				    {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
			</div>



			<fieldset class="form-group">
				<legend>Post Type</legend>
				<div class="inline-radio">
					<div class="form-check form-check-inline">
						<label class="form-check-label radio-inline">
							<input type="radio" class="form-check-input" name="post_type" id="optionsRadios1" value="0" checked>
							Standard post
						</label>
					</div>
					<div class="form-check form-check-inline">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="post_type" id="optionsRadios2" value="1">
							Issue
						</label>
					</div>
				</div>

			</fieldset>

			<!-- <div class="form-group w-75">
        {{Form::label('exampleTextarea', 'Post Description')}}
        {{Form::text('post_text', $post->post_text, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
			</div> -->

      <div class="form-group w-75">
				<label for="exampleTextarea">Post Description</label>
				<textarea name="post_text" class="form-control" id="article-ckeditor" rows="9">
          {{$post->post_text}}
        </textarea>
			</div>

      <div class="form-group">
        {{Form::file('featured_image')}}
      </div>

      {{ Form::hidden('_method', 'PUT') }}
			<button type="submit" class="btn btn-primary">Submit</button>
		{!! Form::close() !!}
	</div>

</div>
@endsection
