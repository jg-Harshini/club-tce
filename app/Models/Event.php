<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'club_id',
        'event_name',
        'description',
        'date',
        'time',
        'image_path',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
