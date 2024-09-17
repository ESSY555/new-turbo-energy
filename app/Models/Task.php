<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title', 'description', 'due_date', 'priority', 'assigned_user', 'assigned_by', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_user');
    }
    use HasFactory;
}
