<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department_name',
    ];

    // Optionally, define table name if different from plural of class name
    // protected $table = 'departments';
}
