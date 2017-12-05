@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-md-12 ">
            <div class="panel panel-default">


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="card text-center">
                      <h5 class="card-header">Your Posts</h5>
                      <div class="card-body">
                    @if(count($posts) > 0)

                    <div class="container">
                        <div class="row">
                          @foreach($posts as $post)

                          <div class = "col col-lg-6 col-md-12 col-sm-12">
                          <div class="card text-black card-outline-primary mb-3 button"  >
                              <div class="card-header bg-primary">
                                <h6 class="text-white text-center">{{$post->title}}</h6>
                              </div>
                          <p class = "text-center">Created: {{$post->created_at}}</p>
                          <p class = "text-center">Category: {{$post->category}}</p>
                        </div>
                      </div>



                          @endforeach
                          </div>
                          </div>

                    @else
                      <p>You have no posts</p>
                    @endif

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
