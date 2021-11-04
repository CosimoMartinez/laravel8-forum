<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{


    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $topics = Topic::with([ 

            'comments' => function($c){

                $c->latest()->limit(5)->get() ;

            }

        ])->paginate(5);

        return view('topics.index', compact('topics'))->with('i', (request()->input('page', 1) - 1) * 5);
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
    public function store(Request $request) {

        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;

        Topic::create($input);

        return redirect()->route('topics.index')->with('success', 'Topic created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic) {

        return view('topics.show', compact('topic'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic) {

        if( Auth::id() === $topic->user->id ) {

            return view('topics.edit', compact('topic'));

        }
        
        else {

            return redirect()->route('topics.index')->with('error', 'Don\'t allowed, You haven\'t created this topic');
        }

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic) {

        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $topic->update([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);

        return redirect()->route('topics.index')
            ->with('success', 'Topic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic) {

        $topic->delete();

        return redirect()->route('topics.index')
            ->with('success', 'Topic deleted successfully');

    }

}
