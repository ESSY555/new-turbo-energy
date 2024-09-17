<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
           'firstName', // Add 'firstName' to the fillable array
        'middleName',
        'lastName',
        'address',
        'phoneNumber',
        'email', // Corrected to lowercase 'email'
        'department',

    ];

}
