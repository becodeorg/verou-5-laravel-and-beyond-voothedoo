@extends('layouts.layout')

@section('title')
    Issue number: {{ $issue->id }}
@endsection

@section('content')
    <a href="/issues" class="back-button">Back</a>
    <h2>Ticket Priority: {{ $issue->priority }}</h2>
    <h3 class="issue-title">{{ $issue->title }}</h3>
    <p class="issue-description">{{ $issue->description }}</p>
    <form action="{{ route('closeIssue', ['id' => $issue->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="status" value="resolved">
        <button type="submit">Close Ticket</button>
    </form>
@endsection
