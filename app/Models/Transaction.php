<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transaction extends Model
{
    use HasFactory;
    use Notifiable;
    protected $fillable = [
        'cashier_id',
        'amount',
        'description',
        'transaction_date', 
    ];
}
