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

                          <div class ="col col-lg-6 col-md-12 col-sm-12">


                          <div class="card text-black card-outline-primary mb-3 button" data-target="#myModal" onclick="modal('{{$post->title}}', '{{$post->post_text}}')" data-toggle="modal" href="#" >
                              <div class="card-header bg-primary">
                                <h6 class="text-white text-center">{{$post->title}}</h6>
                              </div>
                              <p>Title: {{$post->title}}</p>
                              <p>Created: {{$post->created_at}}</p>
                              <div class="">
                                  {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => ''])!!}
                                  {{Form::hidden('_method', 'DELETE')}}
                                  {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                  {!!Form::close()!!}


                                  <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                              </div>

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

        <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Modal title</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body" id="modalBody">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>

<script>

    let modal = function (title, text){
        document.getElementById('modalTitle').innerHTML = title;
        document.getElementById('modalBody').innerHTML = text;
    }

</script>
@endsection
