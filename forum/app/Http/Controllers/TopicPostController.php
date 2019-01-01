<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\TopicPost;
class TopicPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * * @param  int  $topic_id
     * @return \Illuminate\Http\Response
     */
    public function create($topic_id)
    {
        return view('topicposts.create')->with('topic_id', $topic_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, ['body' => 'required']);

        // create a new topic
        $topicPost = new TopicPost;
        $topicPost->body = $request->input('body');

        return $request->input('topic_id');

        $topicPost->Topic()->associate($topic);


        // $topicPost->save();
        // return redirect('/topics')->with('success', 'Topic created');
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
}
