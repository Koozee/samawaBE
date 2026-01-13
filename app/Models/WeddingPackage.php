<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class WeddingPackage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', //paket honeymoon bali
        'slug', //paket-honeymoon-bali -> seo friendly url
        'thumbnail',
        'about',
        'price',
        'is_popular',
        'city_id',
        'wedding_organizer_id',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function weddingOrganizer()
    {
        return $this->belongsTo(WeddingOrganizer::class, 'wedding_organizer_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function photos()
    {
        return $this->hasMany(WeddingPhoto::class);
    }

    public function weddingBonusPackages() //many to many
    {
        return $this->hasMany(WeddingBonusPackage::class, 'wedding_package_id');
    }
    public function weddingTestimonials()
    {
        return $this->hasMany(WeddingTestimonial::class);
    }

}
