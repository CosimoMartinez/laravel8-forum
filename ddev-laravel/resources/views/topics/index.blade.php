@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div>
                <h4>Topics List</h2>
            </div>
            @if(Auth::check())
                <div class="btn-new-topic">
                    <a class="btn btn-success" href="{{ route('topics.create') }}" title="Create a topic">
                        Topic  <i class="fas fa-plus-circle"></i></a>
                </div>
            @endif
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <br>

    <div class="clearfix"></div>
        
    @foreach ($topics as $topic)

        <div class="topic">

            <h4>{{ $topic->title }}</h4>

            <div class="topic-actions">

                <form action="" method="POST">

                        <a href="{{ route('topics.show',$topic->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        @csrf

                        @if( Auth::id() === $topic->user->id)
                            <a href="{{ route('topics.edit',$topic->id) }}" title="edit">
                                <i class="fas fa-edit  fa-lg"></i>
                            </a>




                            @method('DELETE')
                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                <i class="fas fa-trash fa-lg text-danger"></i>
                            </button>
                        @endif
                </form>

            </div>

            <p>{{ $topic->content }}</p>

            <p>Posted by: {{ $topic->user->name }}  - Created: {{ $topic->created_at }}</p>

            <div class="comments">
                @foreach($topic->comments as $comment)

                <div class="comment">
                    <p>User: {{ $comment->user->name }}</p>

                    <p class="comment-content">{{ $comment->content }}</p>
                </div>

                @endforeach

            </div>

        </div>

        <div class="clearfix"></div>

        <br>

    @endforeach

{!! $topics->links() !!}

@endsection