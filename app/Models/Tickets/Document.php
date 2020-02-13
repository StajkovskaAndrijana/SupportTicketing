<?php

namespace App\Models\Tickets;

use App\Models\Tickets\Ticket;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['id_user', 'id_ticket', 'path'];

    protected $table = 'tickets_docs';
    public $primaryKey = 'id';

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

}
