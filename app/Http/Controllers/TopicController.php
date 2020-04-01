<?php

namespace App\Http\Controllers;

use App\Topic;
use App\User;
use App\Like;
use Illuminate\Http\Request;
use DB;

class TopicController extends Controller
{


    public function __construct()
    {
         $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
    public function showuser()
    {
        $topics = User::paginate('4');
        return view('tabels',compact('topics'));
    }

    public function index()
    {
        $topics = Topic::latest()->paginate('4');
        return view('inbox',compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
         'title'=>'required|min:5',
         'content'=>'required|min:10'
        ]);
         $topic = auth()->User()->topics()->create($data);
         $notification = array(
              'message'=>'Publication postée avec succès',
              'alert-type'=>'success'
             );
         return back()->with($notification);
         /*return view('topics.show',compact('topic'));*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return view('topics.show',compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        
        return view('topics/editer',compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $title  = $request ->input('title');
        $content  = $request ->input('content');
        
       
        
        DB::update('update topics set title = ?, content = ? where id = ?',[$title,$content,$id]);
       return back()->with('message','Les modification sont envoyé avec succès.');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy($topic)
    {
        
      DB::delete('delete from topics where id=?',[$topic]);
            // $client->delete('delete from boutique');
            return back();
    }
    public function logout(){
        return redirect()->route('login');
    }
    public function shows($id){
        
        $topics = DB::select('select * from topics where id=?',[$id]);
        return view('topics/editer',['topics'=>$topics]);
        }
        public function showTopic($id){
        $topic = DB::select('select * from topics where id=?',[$id]);
        return view('topics/show',['topic'=>$topic]);
        }
}
