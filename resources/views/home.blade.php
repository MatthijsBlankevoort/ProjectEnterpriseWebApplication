@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Your Posts</h3>
                    @if(count($posts) > 0)

                          @foreach($posts as $post)


                          <p>Title: {{$post->title}}</p>
                          <p>Created: {{$post->created_at}}</p>
                          <br>





                          @endforeach
                        </table>
                    @else
                      <p>You have no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
