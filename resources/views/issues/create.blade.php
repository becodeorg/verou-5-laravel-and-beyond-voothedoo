@extends('layouts.layout')

@section('title')
    Add Issue
@endsection

@section('content')
    <main>
        <form id="create-issue" action="">
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5"></textarea>
            <label for="priority">Select an option:</label>
            <select name="priority" id="priority">
                <option value=""></option>
                <option value="low">Low</option>
                <option value="edium">Medium</option>
                <option value="high">High</option>
            </select>
            <label for="assigned_to">Assign this issue to:</label>
            <select name="assigned_to" id="assigned_to">
                <option value=""></option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <button type="submit">Submit</button>
        </form>
    </main>
@endsection
