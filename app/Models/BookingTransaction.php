<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingTransaction extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'booking_trx_id',
        'name',
        'phone',
        'email',
        'proof',
        'total_amount',
        'price',
        'total_tax_amount',
        'is_paid',
        'started_at',
        'wedding_package_id',
    ];

    protected $casts = [
        'started_at' => 'date',
        'is_paid' => 'boolean',
    ];
    public function weddingPackage()
    {
        return $this->belongsTo(WeddingPackage::class, 'wedding_package_id');
    }

    public static function generateUniqueBookingTrxId()
    {
        do {
            $randomString = 'SMW-' . mt_rand(100000, 999999);
        } while (self::where('booking_trx_id', $randomString)->exists());

        return $randomString;
    }
}
