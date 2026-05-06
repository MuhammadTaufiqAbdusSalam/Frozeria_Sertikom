<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'nama', 'kategori_id', 'stok', 'satuan', 'harga', 'foto'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
