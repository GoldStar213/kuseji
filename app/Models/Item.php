<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Category;
use App\Models\User;
use App\Models\ItemUser;
use App\Models\UserMana;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'front_img', 'back_img', 'side_img', 'category_id', 'frontal_color_id', 'user_id'];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function users(): BelongsTo {
        return $this->belongsTo(User::class);
    }

}
