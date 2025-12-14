<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'harga',
        'foto'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
    ];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }

    // Format harga untuk tampilan
    public function getFormattedHargaAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    // Get foto URL
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset('storage/' . $this->foto);
        }
        return asset('images/default-package.jpg');
    }
}
