<?php
use \App\Http\Controllers\PostsController;
$posts = \App\Http\Controllers\PostsController::getIssues();

 ?>

      <div id="hamburgerdiv-issues" class="fixedtop">
          <div id="issues-icon" onclick="openIssues()">
          <span></span>
          <span></span>
          <span></span>
          <span></span>


          </div>
      </div>

      <div id="issueslist" class="sidenav-right">
          <h1> Top Issues</h1>
          <hr>

          @foreach ($posts as $post)
            @if($post->post_type == '0')
          <a style="max-width: 20rem;" data-target="#myModal" onclick="modal('{{$post->title}}', '{{$post->post_text}}')" data-toggle="modal" href="#">
              <div class="card text-secondary mb-3"  >
                  <div class="card-header bg-primary" style="width: 300px;">
                    <h6 class="text-center">{{$post->title}}</h6>
                  </div>
              </div>
            </a>
            @endif

            @endforeach


        </div>
