<?php
use \App\Http\Controllers\PostsController;
$posts = \App\Http\Controllers\PostsController::getIssues();

 ?>

      <div id="hamburgerdiv-issues">
          <div id="issues-icon" onclick="openIssues()">
          <span></span>
          <span></span>
          <span></span>
          <span></span>


          </div>
      </div>

      <div id="issueslist" class="sidenav-right">
          <h1> Recent Issues</h1>
          <hr>

          @foreach ($posts as $post)
            @if($post->post_type == '1')
          <a style="max-width: 20rem;" data-target="#myModal{{$post->id}}" onclick="modal('{{$post->title}}', '{{$post->post_text}}')" data-toggle="modal" href="#">
              <div class="card text-secondary mb-3"  >
                  <div class="card-header bg-primary" style="width: 300px;">
                    <h6 class="text-center">{{$post->title}}</h6>
                  </div>
              </div>
            </a>
            @endif

            @endforeach


        </div>

        <script>

            let modal = function (title, text){
                document.getElementById('modalTitle').innerHTML = title;
                document.getElementById('modalBody').innerHTML = text;
            }

        </script>
