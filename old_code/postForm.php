<?php
require_once 'private/controller/post.controller.php';
$postController = new PostController();
$postCategories = $postController->getCategories();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
	      crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
	        crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
	        crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
	        crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Dashboard</title>
</head>

<body>
<div id="sidebar" class="sidenav">
	<img src="assets/images/logo-white.png" width="75%" height="" alt="">
	<hr>
	<a href="/">Home</a>
	<a href="postform.php">New Post</a>
</div>

<div id="hamburgerdiv">
	<div id="nav-icon3" onclick="openNav()">
		<span></span>
		<span></span>
		<span></span>
		<span></span>


	</div>
</div>

<hr>
<div id="main">
	<div class="container">
		<form action="#" method="post">
			<div class="form-group w-50">
				<label for="posttitle">Post Title</label>
				<input name="title" type="text" class="form-control" id="posttitle">
			</div>
			<div class="form-group w-25">
				<label for="categoryselect">Select Category</label>
				<select name="category" class="form-control" id="categoryselect">
					<option value=""></option>
					<?php
					foreach($postCategories as $category){
						echo '<option value="'. $category['category_naam'] .'">'. $category['category_naam'] .'</option>';
					}
					?>
				</select>
			</div>


			<fieldset class="form-group">
				<legend>Post Type</legend>
				<div class="inline-radio">
					<div class="form-check form-check-inline">
						<label class="form-check-label radio-inline">
							<input type="radio" class="form-check-input" name="postType" id="optionsRadios1" value="standard" checked>
							Standard post
						</label>
					</div>
					<div class="form-check form-check-inline">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="postType" id="optionsRadios2" value="issue">
							Issue
						</label>
					</div>
				</div>

			</fieldset>

			<div class="form-group w-75">
				<label for="exampleTextarea">Post Description</label>
				<textarea name="content" class="form-control" id="exampleTextarea" rows="9"></textarea>
			</div>
			<div class="form-group">
				<label for="imageInput">Image Input</label>
				<input type="file" class="form-control-file" id="imageInput" aria-describedby="fileHelp">
				<small id="fileHelp" class="form-text text-muted">Add JPEG, PNG or GIF images.</small>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

</div>


<script src="assets/js/navbar.js"></script>
</body>

</html>
<?php
if(!empty($_POST)){
	$postController->handleData($_POST);
}

?>
