<?php

namespace App\Http\Controllers\API;

use App\Models\Topic;
use App\Http\Resources\TopicResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopicController extends Controller
{
   public function index()
    {
        return TopicResource::collection(Topic::all());
    }

    public function store(TopicRequest $request)
    {
        $topic = Topic::create($request->validated());

        return new TopicResource($topic);
    }

    public function show(Topic $topic)
    {
        return new TopicResource($topic);
    }

    public function update(TopicRequest $request, Topic $topic)
    {
        $topic->update($request->validated());

        return new TopicResource($topic);
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();

        return response()->noContent();
    }
    
}
