<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class Comments extends Controller
{
    public function create(Request $request)
    {
        $validate = $request->validate([
            'comment'=>'required|string|min:1',
            'issue-id'=> 'required',
            'user-id'=> 'required',
        ]) ;

        $comment = $validate['comment'];
        $issueId = $validate['issue-id'];
        $userId = $validate['user-id'];

        Comment::create([
            'issue_id'=>$issueId,
            'user_id'=>$userId,
            'comment_text'=> $comment,
        ]);

        return redirect()->route('showIssue', ['id' => $issueId]);
    }
}
//test git linux 123
