<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Issue;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Issues extends Controller
{
    public function index()
    {
        $issues = Issue::all();
        return view ('issues.index', [
            'issues'=> $issues,
        ]);
    }

    public function show($id)
    {
        $issue = Issue::find($id);

        $comments = Comment::with('user')->where('issue_id', $id)->get();



        if(auth()->user()) {
            if ($issue->status === 'open'  && auth()->user()->id === $issue->assigned_to ){
                $issue->status = 'in_progress';
                $issue->save();
            }
        }
        
        return view ('issues.show', [
            'issue'=>$issue,
            'comments'=>$comments,
        ]);
    }

    public function close($id, Request $request)
    {
        $issue = Issue::find($id);
        $issue->status = $request['status'];
        $issue->save();

        return redirect('/issues');
    }

    public function create(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'assigned_to' => 'exists:users,id',
        ]);
        
        $title = $validate['title'];
        $description = $validate['description'];
        $priority = $validate['priority'];
        $assignedTo = $validate['assigned_to'];
        $status = 'open';
        $createdBy = auth()->user()->id;
        
        Issue::create([
            'title'=>$title,
            'description'=>$description,
            'status'=> $status,
            'priority'=> $priority,
            'assigned_to'=> $assignedTo,
            'created_by'=> $createdBy,
        ]);
        
        return redirect('/issues');
    }

    public function showForm()
    {
        $users= User::all();
        return view('issues.create', [
            'users'=> $users,
        ]);
    }
}
