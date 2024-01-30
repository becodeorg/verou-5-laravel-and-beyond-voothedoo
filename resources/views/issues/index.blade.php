@extends('layouts.layout')

@section('title')
    All Issues
@endsection

@section('content')
    <main>
        <table class="issues">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Assigned to</th>
                    <th>Created by</th>
                    <th>Created at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($issues as $issue)
                    <tr>
                        <td><a href="">{{ $issue->title }}</a></td>
                        <td>{{ $issue->status }}</td>
                        <td>{{ $issue->priority }}</td>
                        <td>{{ $issue->assignedToUser->name }}</td>
                        <td>{{ $issue->createdByUser->name }}</td>
                        <td>{{ $issue->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
