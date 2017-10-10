<?php
	require_once 'private/controller/post.controller.php'

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>post</title>
</head>
<body>
<form method="post" action="#">
	<input name="title" placeholder="titel" type="text"><br>
	<textarea name="content" placeholder="content" rows="20" cols="30" ></textarea>
	<input name="submit" value="verzend" type="submit">
</form>
<pre>
<?php
if(isset($_POST)){
	$postController = new PostController($_POST);
	$postController->handleData();
}

?>
</pre>


</body>
</html>

