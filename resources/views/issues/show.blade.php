@extends('layouts.layout')

@section('title')
    Issue number: {{ $issue->id }}
@endsection

@section('content')
    <a href="/issues">Back</a>
    <h2>{{ $issue->title }}</h2>
    <p>{{ $issue->description }}</p>
@endsection
