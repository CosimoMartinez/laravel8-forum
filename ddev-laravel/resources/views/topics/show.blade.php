@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <p>{{ $topic->title }}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Content</strong>
                <p>{{ $topic->content }}</p>
            </div>
        </div>
    </div>
    <div class="comments">
        @if(Auth::check())
            <h4>Add comment</h4>
            <form method="post" action="{{ route('comments.store') }}">
                 @csrf
                <div class="form-group">
                    <textarea class="form-control" name="content"></textarea>
                    <input type="hidden" name="topic_id" value="{{ $topic->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Add Comment" />
                </div>
           </form>
        @endif
        
        @foreach($topic->comments as $comment)

            <div class="comment">
               <p>User: {{ $comment->user->name }}</p>

                <p class="comment-content">{{ $comment->content }}</p>
            </div>

        @endforeach

    </div>
@endsection