<?php

namespace App\Http\Controllers\Tickets;

use Illuminate\Http\Request;
use App\Models\Tickets\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function postComment(Request $request)
    {
        $this->validate($request, [
            'comment'   => 'required'
        ]);

        $comment = new Comment();
        $comment->id_user = Auth::user()->id;
        $comment->id_ticket = $request->input('id_ticket');
        $comment->comment = $request->input('comment');

        $comment->save();

        return redirect()->back()->with("success", "Your comment has be submitted.");
    }
}
