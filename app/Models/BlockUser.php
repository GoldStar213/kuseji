<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockUser extends Model
{
        use HasFactory;

    protected $table = 'block_state';

    protected $fillable = ['first_user', 'second_user', 'created_at', 'updated_at'];
}
