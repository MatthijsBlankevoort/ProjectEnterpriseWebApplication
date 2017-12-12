<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \App\Post::orderBy('created_at', 'desc')->get();

        $likes = Like::select('post_id')->where('user_id',auth()->user()->id)->get();
        $likeArr=array_flatten($likes->toArray());

        return view('pages/dashboard')->with('posts', $posts)->with('likes',$likeArr);
    }

    public static function getIssues()
    {
        $posts = \App\Post::orderBy('created_at', 'desc')->get();
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/submitpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'post_text' => 'required'

        ]);


        $post = new Post;

        $post->title = $request->title;
        $post->category = $request->category;
        $post->post_type = $request->post_type;
        $post->post_text = $request->post_text;
        $post->user_id = auth()->user()->id;


        //$post->likes = self::getLikes($request->post_id);
        $post->likes = 0;
        $post->save();

        $posts = \App\Post::all();

        //return view('pages/dashboard')->with('posts', $posts);
        return redirect('/');


    }

    public function alreadyLiked($id){

        $user = auth()->user()->id;
        $userlikes = new Like;

        if($user == $userlikes->user_id && $userlikes->post_id != $id){
            return true;
        } else {
            return false;
        }

    }

    public function getLikes($id)
    {
        $Like = \App\Like::get($id)->count();
        return $Like;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sortBy()
    {
     $posts = \App\Post::orderBy('likes', 'desc')->get();
     $likes = Like::select('post_id')->where('user_id',auth()->user()->id)->get();
     $likeArr=array_flatten($likes->toArray());
     return view('pages/dashboard')->with('posts', $posts)->with('likes', $likeArr);
    }
}
