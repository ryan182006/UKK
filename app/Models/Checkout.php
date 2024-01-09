<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkout extends Model
{
    use HasFactory, SoftDeletes, Uuid;
    protected $guarded = ['id'];

    public function alamat()
    {
        return $this->belongsTo(Alamat::class);
    }

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class, 'checkout_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
