<?php

namespace App\Models\Tickets;

use App\User;
use App\Models\Tickets\Ticket;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['id_user', 'id_ticket', 'comment'];

    protected $table = 'comments';
    public $primaryKey = 'id';

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'id_ticket', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
