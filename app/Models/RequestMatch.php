<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestMatch extends Model
{
    use HasFactory;

    protected $table = 'request_match';

    public function items_first(): BelongsTo {
        return $this->belongsTo(Item::class, 'first_item');
    }

    public function items_second(): BelongsTo {
        return $this->belongsTo(Item::class, 'second_item');
    }
}
