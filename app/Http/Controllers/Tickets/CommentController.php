<?php

namespace App\Http\Controllers\Tickets;

use App\Mailers\AppMailer;
use Illuminate\Http\Request;
use App\Models\Tickets\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function postComment(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'comment'   => 'required'
        ]);

        $comment = new Comment();
        $comment->id_user = Auth::user()->id;
        $comment->id_ticket = $request->input('id_ticket');
        $comment->comment = $request->input('comment');

        $comment->save();

         // send mail if the user commenting is not the ticket owner
         if($comment->ticket->user->id !== Auth::user()->id) {
            $mailer->sendTicketComments($comment->ticket->user, Auth::user(), $comment->ticket, $comment);
        }

        return redirect()->back()->with("success", "Your comment has be submitted.");
    }
}
