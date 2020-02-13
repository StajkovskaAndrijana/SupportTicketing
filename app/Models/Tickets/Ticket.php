<?php

namespace App\Models\Tickets;

use App\User;
use App\Models\Tickets\Type;
use App\Models\Tickets\Status;
use App\Models\Tickets\Comment;
use App\Models\Tickets\Category;
use App\Models\Tickets\Document;
use App\Models\Tickets\Priority;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['name', 'description', 'id_user', 'id_status', 'id_type', 'id_category', 'documentation'];

    protected $table = 'tickets';
    public $primaryKey = 'id';

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class, 'id_priority', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status', 'id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'id_type', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_ticket', 'id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

}
