<?php

namespace App\Http\Controllers;
use App\User;
use App\Topic;
use App\Like;
use App\Comment;
use Illuminate\Http\Request;
use Auth;
use DB;
class CommentController extends Controller
{
    public function __construct()
    {
    	return $this->middleware('auth');
    }
    public function store(Topic $topic)
    {
    	request()->validate([
         'content'=>'required|min:5'
    	]);
    	
        $comment = new Comment();
        $comment->content = request('content');
        $comment->user_id = auth::user()->id;
        $comment->commentable_id = $topic->id;
        $comment->commentable_type = auth::user()->name;
        $comment->save();
        return redirect()->route('topic',$topic);
    }
    public function index()
    {
        $topics = Comment::all();
        return view('topics/message',compact('topics'));
    }
    public function indexx()
    {
        $topics = Comment::all();
        return view('topics/load_message',compact('topics'));
    }
    public function storeDeux()
    {
    	request()->validate([
         'content'=>'required|min:5'
    	]);
    	$comment = new Comment();
        $comment->content = request('content');
        $comment->user_id = auth::user()->id;
        $comment->commentable_id = auth::user()->id;
        $comment->commentable_type = 'App\Topic';
        $comment->save();
         return back();
    	
        
    }

    public function showResponse($id){
      $comments = DB::select('select content,commentable_type from comments where commentable_id=?',[$id]);
        return view('topics/response',['comments'=>$comments]);

    }
    public function likes($id){
         $likes = new Like();
         $likes ->topics_id = $id;
         $likes->save();
         return back();
         
    }
    public function likesShow($id){
         
         $likes = DB::select('select count id from likes where topics_id=?',$id);
         return view('inbox',compact('likes'));
    }


}
