<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registrations';
    protected $fillable = [
        'name',
        'roll_no',
        'email',
        'gender',
        'phone',
        'photo',
        'department',
    ];
}
