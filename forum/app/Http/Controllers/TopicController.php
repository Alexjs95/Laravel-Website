<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\TopicPost;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::orderBy('created_at', 'desc')->paginate(10);
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
        $topic->delete();
        return redirect('/topics')->with('success', 'Topic deleted');
    }
}
