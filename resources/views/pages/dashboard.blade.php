@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">

        <?php for($i = 0; $i < 5; $i++): ?>
            <div class="col col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-3" style="max-width: 20rem;">
                    <div class="card-header text-white bg-primary">
                        Article Title 1
                    </div><img alt="Great Idea" class="card-img-top cardimage" src="http://pipsum.com/435x310.jpg" width="100%">
                    <div class="card-body">
                        <h4 class="card-title">Wow! Wat een geweldig idee van Pietje Puk</h4>
                        <p class="card-text">Pietje puk die al meerdere jaren bij de ABN AMRO werkt heeft onlangs een geweldig nieuw systeem bedacht.</p>
                        <div class="card-body">
                            <a class="text-right" data-target="#myModal" data-toggle="modal" href="#">Read more</a>
                        </div>
                        <div class="card-header">
                            <div class="container-fluid row text-left">
                                <img alt="Likes" height="10%" src="/assets/images/thumbup.png" width="10%">
                                <h5 class="text-primary">2017</h5>
                                <p class="text-primary">Created on 28-sep-2017</p>
                            </div><span class="badge badge-pill badge-primary">JavaScript</span> <span class="badge badge-pill badge-primary">Memes</span> <span class="badge badge-pill badge-warning">Yellow</span> <span class="badge badge-pill badge-primary">JavaScript</span> <span class="badge badge-pill badge-primary">Memes</span> <span class="badge badge-pill badge-warning">Yellow</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endfor; ?>

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