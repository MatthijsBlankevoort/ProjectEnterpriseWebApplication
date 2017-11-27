<!DOCTYPE html>
<html lang="en">

    <head>
        @include('includes.head')
    </head>

    <body>

        @include('includes.navbar')


        <div id="main">
            @include('includes.messages')
            @yield('content')
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

      @include('includes.scripts')

    </body>

</html>
