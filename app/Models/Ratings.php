<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    use HasFactory;
    protected $fillable = [
    "rate","goods_id"
    ];
    public function goods()
    {
        return $this->belongsTo(Goods::class);
    }
}
