<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Category;
use App\Models\User;
use App\Models\ItemUser;
use App\Models\UserMana;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'front_img', 'back_img', 'side_img', 'category_id', 'frontal_color_id', 'user_id'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_item', 'item_id', 'category_id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
