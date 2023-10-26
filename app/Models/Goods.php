<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;

    protected $fillable = [
        "name","cost","producers_id","categories_id"
    ];
    public function producers()
    {
        return $this->belongsTo(Producers::class,"producers_id","id");
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function ratings()
    {
        return $this->hasMany(Ratings::class,"goods_id","id");
    }

    public function getratingAttribute()
    {
        return $this->ratings()->average("rate");
    }
}

