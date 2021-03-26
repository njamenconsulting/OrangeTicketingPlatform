<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'phone',
        'description',
        'status',
        'started_at',
        'created_by',
        'user_id',
    ];

    /**
     * Get the user that owns the ticket.
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

}
