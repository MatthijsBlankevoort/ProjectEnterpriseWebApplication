<?php require "config.php"; ?>
<?php
    require_once "private/controller/post.controller.php";
    $controller = new PostController();
    $posts      = $controller->getPosts();
?>
<!-- Application: Info Support Connect -->
<!-- Version: <?php echo $version; ?> -->

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

<nav class="navbar sticky-top navbar-light bg-faded">
    <div id="hamburgerdiv" class="fixedtop">
        <div id="nav-icon3" onclick="openNav()">
            <span></span>
            <span></span>
            <span></span>
            <span></span>


        </div>
    </div>
    <div id="sidebar" class="sidenav">
        <img src="assets/images/logo-white.png" width="75%" height="" alt="">
        <hr>
	    <a href="/">Home</a>
	    <a href="postform.php">New Post</a>

    </div>
</nav>

<!-- <nav class="navbar"> -->

<script src="assets/js/navbar.js"></script>

<div id="main">
    <div class="container">

        <div class="row">
			<?php foreach ( $posts as $post ) { ?>
				<div class="col col-lg-4 col-md-6 col-sm-12">
					<div class="card text-black mb-3" style="max-width: 20rem;">
						<div class="card-header card-header-title bg-primary"><?= $post['title']; ?></div>
						<img class="card-img-top cardimage" src="//pipsum.com/435x310.jpg" alt="Great Idea" width="100%">
						<div class="card-body">
							<p class="card-text"><?= substr($post['content'], 0, 200); ?>...</p>

							<div class="card-body text-right">
								<a href="#" class="text-right" onclick="showText('<?= $post['title']; ?>', '<?= $post['content']; ?>')" data-toggle="modal" data-target="#myModal">Read more</a>
							</div>

							<div class="card-header">
								<div class="container-fluid row text-left">
									<img src="assets/images/thumbup.png" width="10%" height="10%" alt="Likes">
									<p class="text-primary"> Created on <?= date('M g Y', strtotime($post['created_at'])); ?> </p>
								</div>
								<span class="badge badge-pill badge-primary"><?= $post['categorie'] ?></span>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>






            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="modal-content" class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <!-- From here are issues -->


        <!-- Till here for issues -->

        <!-- Test Card -->
        <!-- <div class="card text-black mb-3" style="max-width: 20rem;">
			  <div class="card-header bg-primary">Article Title</div>
				<div class="card-body">
				  <h4 class="card-title">Success card title</h4>
				  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
		  </div> -->
        <!-- end card -->


</body>
<script type="text/javascript">
	function showText(titel, description)
	{
		text1=titel;
		text2=description
		document.getElementById("modal-title").innerHTML = text1;
		document.getElementById("modal-content").innerHTML = text2;
	}
</script>
</html>