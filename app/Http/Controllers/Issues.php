<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view ('issues.show', [
            'issue'=>$issue
        ]);
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
        $createdBy = '1';
        
        Issue::create([
            'title'=>$title,
            'description'=>$description,
            'status'=> $status,
            'priority'=> $priority,
            'assigned_to'=> $assignedTo,
            'created_by'=> $createdBy,
        ]);
        
        return redirect('/issues-create');
    }

    public function showForm()
    {
        $users= User::all();
        return view('issues.create', [
            'users'=> $users,
        ]);
    }
}
