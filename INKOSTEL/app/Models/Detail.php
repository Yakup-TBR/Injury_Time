<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $table = 'carikos';
    protected $fillable = [
        'nama_kos',
        'harga_kos',
        'jarak_kos',
        'gambar_kos1',
        'gambar_kos2',
        'gambar_kos3',
        'gambar_kos4',
        'gambar_kos5',
        'alamat',
        'jarak_kos',
        'Deskripsi',
        'Fasilitas',
        'ContactPerson',
        'KamarKosong'
    ];


    protected $primaryKey = 'id_kos';

    /**
     * Fungsi untuk mengonversi harga dari Rupiah ke Dolar.
     *
     * @param float|null $exchangeRate Nilai tukar IDR ke USD, default 15000.
     * @return float Harga dalam USD.
     */
    public function convertCurrency($exchangeRate = 15000)
    {
        // Pastikan harga_kos terisi
        if (!$this->harga_kos) {
            return 0;
        }

        // Konversi harga ke dalam USD
        return $this->harga_kos / $exchangeRate;
    }
}
