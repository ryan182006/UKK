<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'produk_id');
    }

    // public function rating()
    // {
    //     return $this->hasOne(ProdukRating::class);
    // }

    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }
}
