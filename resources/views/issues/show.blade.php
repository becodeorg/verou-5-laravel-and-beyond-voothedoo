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
            <input type="hidden" name="status" value="resolved">
            @auth()
                <button type="submit" class="close-issue">Close Ticket</button>
            @endauth
        </form>

        <div class="all-comments-section">
            <div class="single-comment-section">
                <p class="added-by">Added by: User</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet minima natus perferendis placeat, odio
                    magnam mollitia. Nihil recusandae adipisci sit?</p>
            </div>
        </div>
        @auth()
            <div class="add-comment-section">
                <form action="" method="POST">
                    @csrf
                    <textarea name="comment" id="comment" rows="5" placeholder="Add a comment"></textarea>
                    <button class="submit-comment">Send</button>
                </form>
            </div>
        @endauth

    </main>
@endsection
