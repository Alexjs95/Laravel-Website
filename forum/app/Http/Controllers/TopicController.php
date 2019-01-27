<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Topic;
use App\TopicPost;

class TopicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index', 'show', 'search']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::orderBy('created_at', 'desc')->paginate(10);       // limits number of topics per page to 10
        return view('topics.index')->with('topics', $topics);
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
        $this -> validate($request, ['title' => 'required', 'body' => 'required']);

        // create a new topic
        $topic = new Topic;
        $topic->title = $request->input('title');
        $topic->body = $request->input('body');
        $topic->user_id = auth()->user()->id;
        $topic->save();
        return redirect('/topics')->with('success', 'Topic created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Topic::find($id);
        $posts = TopicPost::where('topic_id', '=', $id)->paginate(10);

        //return view('topics.show')->with('topic', $topic)->with('posts', $posts);
        return view('topics.show')->with(compact('topic', 'posts'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = Topic::find($id);

        // Ensure correct user is editing
        if(auth()->user()->id != $topic->user_id)
        {
            return redirect('topics')->with('error', 'Not authorised to edit topic.');
        }
        $topic = Topic::find($id);
        return view('topics.edit')->with('topic', $topic);
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
        $this -> validate($request, ['title' => 'required', 'body' => 'required']);

        // update an existing topic
        $topic = Topic::find($id);
        $topic->title = $request->input('title');
        $topic->body = $request->input('body');
        $topic->save();
        return redirect('/topics')->with('success', 'Topic updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = Topic::find($id);

        // Ensure correct user is deleting a topic
        if(auth()->user()->id != $topic->user_id)
        {
            return redirect('topics')->with('error', 'Not authorised to edit topic.');
        }
        $topic->delete();

        return redirect('/topics')->with('success', 'Topic deleted');
    }

    /**
     * Search to find topics based on the authorr.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $this -> validate($request, ['search']);
        $search = $request->input('search');
        $id = User::where('name', $search)->first();
        if ($id != null) {
            $id = User::where('name', $search)->first()->id;
            $topics = Topic::where('user_id', '=', $id)->paginate(10);
        } else {
            return view('topics/index')->withErrors('No search results', 'fail')->with('topics', null);
        }

        return view('topics.index')->with('topics', $topics);
    }

}
