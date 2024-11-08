<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'meeting_title',
        'meeting_date',
        'meeting_time',
        'meeting_id',
        'institutions',
        'additional_notes',
    ];
}
