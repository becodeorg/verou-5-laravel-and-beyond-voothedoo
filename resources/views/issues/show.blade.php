@extends('layouts.layout')

@section('title')
    Issue number: {{ $issue->id }}
@endsection

@section('content')
    <main>
        <a href="/issues" class="back-button">Back</a>
        <h2 class="issue-priority">Ticket Priority: {{ $issue->priority }}</h2>
        <div class="issue-wrapper">
            <h3 class="issue-title">{{ $issue->title }}</h3>
            <p class="issue-description">{{ $issue->description }}</p>
            <p class="issue-added-on"> Added on: {{ $issue->created_at }}</p>
        </div>
        <form action="{{ route('closeIssue', ['id' => $issue->id]) }}" method="POST" class="close-issue-form">
            @csrf
            @auth()
                @if ($issue->status === 'resolved')
                    <input type="hidden" name="status" value="open">
                    <button type="submit" class="close-issue">Open ticket again</button>
                @elseif ($issue->assigned_to === auth()->user()->id)
                    <input type="hidden" name="status" value="resolved">
                    <button type="submit" class="close-issue">Close Ticket</button>
                @endif
            @endauth
        </form>
        <div class="all-comments-section">
            @if ($comments)
                @foreach ($comments as $comment)
                    <div class="single-comment-section">
                        <p class="added-by">Added by: <span class="user-span">{{ $comment->user->name }}</span> </p>
                        <p class="added-on">Date added: {{ $comment->created_at }}</p>
                        <p class="comment">{{ $comment->comment_text }}</p>
                    </div>
                @endforeach
            @endif
        </div>
        @auth()
            <div class="add-comment-section">
                <form action="{{ route('addComment') }}" method="POST">
                    @csrf
                    @method('POST')
                    <p class="commenting-as">Commenting as: <span class="user-span">{{ auth()->user()->name }}</span></p>
                    <textarea name="comment" id="comment" rows="5" placeholder="Add a comment"></textarea>
                    <input type="hidden" name="issue-id" value="{{ $issue->id }}">
                    <input type="hidden" name="user-id" value="{{ auth()->user()->id }}">
                    <button class="submit-comment">Comment</button>

                </form>
            </div>
        @endauth

    </main>
@endsection
