@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">



            @foreach ($posts as $post)


            <div class="col col-lg-4 col-md-6 col-sm-12">
                <div class="card text-black mb-3" style="max-width: 20rem;">
                    <div class="card-header bg-primary">

                    </div><img alt="Great Idea" class="card-img-top cardimage" src="http://pipsum.com/435x310.jpg" width="100%">
                    <div class="card-body">
                        <h4 class="card-title">{{$post->title}}</h4>
                        <p class="card-text">{{$post->post_text}}</p>
                        <div class="card-body text-right">
                            <a class="text-right" data-target="#myModal" data-toggle="modal" href="#">Read more</a>
                        </div>
                        <div class="card-header">
                            <div class="container-fluid row text-left">
                                <img alt="Likes" height="10%" src="/assets/images/thumbup.png" width="10%">
                                <p class="text-primary">Created on {{$post->created_at}}</p>
                            </div><span class="badge badge-pill badge-primary">{{$post->category}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
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
@endsection