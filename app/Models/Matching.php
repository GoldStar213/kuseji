<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matching extends Model
{
    use HasFactory;

    protected $table = 'matches';

    protected $fillable = [
        'title', 'start_date', 'end_date',
    ];
}
