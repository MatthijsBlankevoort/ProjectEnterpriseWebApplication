<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="/assets/js/app.js"></script>
<script>
    $.ajax({
		url: '/getlikes',
		type: 'GET',
		data: '',
		success: function(data){
			$('#likes').html(data.likes);
		}
	});


	$(function() {
		$(".vote").click(function(e) {
            e.preventDefault();
            var post_id = $(this).attr("data-id");

            var url = "";
            var increment;
            var classname;
            var remClassname;

            if($(this).hasClass("upvote")) {
                url = "/like/insert";
                increment = 1;
                classname = "downvote fa-thumbs-down";
                remClassname = "upvote fa-thumbs-up";
            } else {
                url = "/like/update";
                increment = -1;
                classname = "upvote fa-thumbs-up"    
                remClassname = "downvote fa-thumbs-down";           
            }

			$.ajax({
				url: url,
				type: 'POST',
				data: {
					id: post_id
				},
				success: function(data){
					console.log('Upvoted ' + post_id)
					$('#likes').html(data.likes);
                    var amount_likes = parseInt($("h1[data-id='"+post_id+"']").html()) + increment;
                    $("h1[data-id='"+post_id+"']").html(amount_likes);
                    $("a[data-id='"+post_id+"']").addClass(classname).removeClass(remClassname);
				}
			});
		});

	});
</script>