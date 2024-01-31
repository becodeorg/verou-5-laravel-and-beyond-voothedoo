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
            <button type="submit" class="close-issue">Close Ticket</button>
        </form>
    </main>
@endsection
