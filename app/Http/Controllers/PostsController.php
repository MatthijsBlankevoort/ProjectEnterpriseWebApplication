<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Like;
use App\Post;
use App\Comment;
use Image;
use Storage;

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

        $likes = Like::select('post_id')->get();
        $likeArr=array_flatten($likes->toArray());

        $comments = Comment::all();

        return view('pages/dashboard')->with('posts', $posts)->with('likes',$likeArr)->with('comments', $comments);
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
            'post_text' => 'required',
            'featured_image' => 'sometimes|image'

        ]);


        $post = new Post;

        $post->title = $request->title;
        $post->category = $request->category;
        $post->post_type = $request->post_type;
        $post->post_text = $request->post_text;
        $post->user_id = auth()->user()->id;

        if($request->hasFile('featured_image')) {
          $image = $request->file('featured_image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('assets/images/' . $filename);
          Image::make($image)->save($location);

          //->resize(200, 100)

          $post->image = $filename;
        }


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

    public function getLikes(Request $request)
    {
        $Like = \App\Like::get()->count();

        return response()->json(['likes' => $Like]);
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
        $post = Post::find($id);
        return view('pages.edit')->with('post', $post);
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
      $this->validate($request, [
          'title' => 'required',
          'post_text' => 'required',
          'featured_image' => 'image'

      ]);


      $post = Post::find($id);

      $post->title = $request->title;
      $post->category = $request->category;
      $post->post_type = $request->post_type;
      $post->post_text = $request->post_text;
      $post->user_id = auth()->user()->id;

      //updaten image
      if($request->hasFile('featured_image')) {
        //add new
        $image = $request->file('featured_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('assets/images/' . $filename);
        Image::make($image)->save($location);
        $oldFilename = $post->image;
        //update to database
        $post->image = $filename;
        //delete old
        Storage::delete($oldFilename);

      }

      $post->save();

      $posts = \App\Post::all();

      return redirect('/home')->with('success', 'Post Updated');


  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Storage::delete($post->image);
        return redirect('/home')->with('success', 'Post Removed');
    }

    public function sortBy()
    {
     $posts = \App\Post::orderBy('likes', 'desc')->get();
     $likes = Like::select('post_id')->get();
     $likeArr=array_flatten($likes->toArray());
     return view('pages/dashboard')->with('posts', $posts)->with('likes', $likeArr);
    }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function storeComment(Request $request)
	{

		$comment = new Comment;
		$comment->post_id = $request->post_id;
		$comment->user_id = 2;
		$comment->comment = $request->comment_content;

		$comment->save();

		return redirect('/')->with('success', 'Comment Created');
	}

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getComments($id){
        $comments = \App\Comment::where('post_id', $id)->get();
        return $comments->toJson();
    }
}
