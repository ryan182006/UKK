<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;
use App\Models\Keranjang;
use App\Models\Checkout;

class CreateSnapTokenService extends Midtrans
{
    protected $checkout;

    public function __construct($checkout)
    {
        parent::__construct();

        $this->checkout = $checkout;
    }

    public function getSnapToken()
    {
        $barang = [];
        foreach ($this->checkout->pesanans as $pesanan) {
            array_push($barang, [
                'id' => $pesanan->barang_id,
                'price' => $pesanan->barang['harga'],
                'quantity' => $pesanan->kuantitas,
                'name' => $pesanan->barang['nama_barang']
            ]);
        }
        array_push($barang, [
            'id' => $this->checkout->id,
            'price' => 7000,
            'quantity' => 1,
            'name' => "ongkir"
        ]);
        $params = [
            'transaction_details' => [
                'order_id' => $this->checkout->uuid,
                'gross_amount' => $this->checkout->total,
            ],
            'item_details' => $barang,
            'customer_details' => [
                'first_name' => $this->checkout->alamat->nama_penerima,
            'email' => auth()->user()->email,
                'phone' => $this->checkout->alamat->no_hp,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
