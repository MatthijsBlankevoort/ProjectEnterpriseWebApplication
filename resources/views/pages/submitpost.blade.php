@extends('layouts.app')
@section('content')
    <div id="main">
	<div class="container">
		<form action="/submitpost/create" method="post" enctype="multipart/form-data">
			<div class="form-group w-50">
				<label for="posttitle">Post Title</label>
				<input name="title" type="text" class="form-control" id="posttitle">
			</div>
			<div class="form-group w-25">
				<label for="categoryselect">Select Category</label>
				<select name="category" class="form-control" id="category">
					@foreach ($categories as $category)
						<option value="{{$category->title}}">{{$category->title}}</option>
					@endforeach

				</select>
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

			<div class="form-group w-75">
				<label for="exampleTextarea">Post Description</label>
				<textarea name="post_text" class="form-control" id="article-ckeditor" rows="9"></textarea>
			</div>

      <div class="form-group">
        {{Form::file('featured_image')}}
      </div>

      <div class="form-group">
  			<button type="submit" class="btn btn-primary">Submit</button>
      </div>
		</form>
	</div>

</div>
@endsection
