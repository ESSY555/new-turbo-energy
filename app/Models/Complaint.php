<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'location',
        'SPN',
        'email',
        'date_of_complaint',
        'complaint_details',
        'received_by',
        'resolved_by',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_of_complaint' => 'date',
        'status' => 'string',
    ];
}
