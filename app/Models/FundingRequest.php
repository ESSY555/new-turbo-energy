<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundingRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'location',
        'reason',
        'initial_funding',
        'current_balance',
        'date',
        'time',
        'user_id'
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
