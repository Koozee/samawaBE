<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BonusPackage extends Model
{
    protected $fillable = [
        'name',
        'thumbnail',
        'about',
        'price',
    ];

     public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function weddingBonusPackages()
    {
        return $this->hasMany(WeddingBonusPackage::class);
    }
}