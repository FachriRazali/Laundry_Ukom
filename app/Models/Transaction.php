<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

public static function boot()
{
    parent::boot();
    
    static::creating(function ($transaction) {
        if (empty($transaction->invoice_number)) {
            $transaction->invoice_number = 'INV-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
        }
    });
}


class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'quantity', 'total_price', 'status'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
