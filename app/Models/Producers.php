<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producers extends Model
{
    use HasFactory;
    protected $fillable = [
        "name"
    ];
    public function pgoods()
    {
        return $this->hasMany(Goods::class);
    }

    public function getamountAttribute()
    {
        return $this->pgoods()->count();
    }
}
