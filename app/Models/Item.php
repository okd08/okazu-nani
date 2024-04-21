<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Ingredient;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'kigen',
        'detail',
    ];

    // リレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
