<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Like;
use App\Post;
use App\Comment;
use App\User;
use Image;
use Storage;

class PostsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

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
        $users = User::select('id', 'name')->get();

        return view('pages/dashboard')->with('posts', $posts)->with('likes',$likeArr)->with('comments', $comments)->with('users', $users);
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

          $post->image = $filename;
        }

        $post->likes = 0;

        //Slack CURL 

        //If post is a project

        if ($post->post_type == 0) {
            $ch_url = env("SLACK_HOOK_PROJECTS");
            $message = array('payload' => json_encode(array('text' => 'New project: ' . $post->title . '  at the category ' . $post->category . '.')));

        //Else post is an issue
        } else {
            $ch_url = env("SLACK_HOOK_ISSUES");
            $message = array('payload' => json_encode(array('text' => 'New issue: ' . $post->title . ' at the category ' . $post->category . '.')));
        }

        $ch = curl_init($ch_url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
        
        $result = curl_exec($ch);

        curl_close($ch);

        $post->save();
        $posts = \App\Post::all();

        return redirect('/');
    }

    public function alreadyLiked($id){

        $user = auth()->user()->id;
        $userlikes = new Like;

        return $user == $userlikes->user_id && $userlikes->post_id != $id;
    }

    public function getLikes(Request $request)
    {
        $Like = \App\Like::get()->count();

        return response()->json(['likes' => $Like]);
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
        if(auth()->user()->id !== $post->user_id) {
          return redirect('/home')->with('error', 'Unauthorized Page');
        }
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
    $comments = Comment::all();
    $users = User::select('id', 'name')->get();

        return view('pages/dashboard')->with('posts', $posts)->with('likes',$likeArr)->with('comments', $comments)->with('users', $users);
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
		$comment->user_id = auth()->user()->id;
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
