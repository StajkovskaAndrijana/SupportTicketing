<?php

namespace App\Models\Tickets;

use Illuminate\Database\Eloquent\Model;

class StatusNotification extends Model
{
    protected $fillable = ['id_user', 'id_status'];

    protected $table = 'status_notification';
    public $primaryKey = 'id';
}
