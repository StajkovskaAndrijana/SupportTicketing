<?php

namespace App\Models\Tickets;

use App\Models\Tickets\Ticket;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['id_user', 'name', 'description'];

    protected $table = 'statuses';
    public $primaryKey = 'id';

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
