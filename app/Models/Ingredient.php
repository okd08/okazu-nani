<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Item;

class Ingredient extends Model
{
    use HasFactory;

    // リレーション
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
