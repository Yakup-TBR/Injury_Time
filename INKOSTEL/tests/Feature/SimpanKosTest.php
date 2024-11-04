<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Simpan;
use App\Models\User; 
use App\Models\Carikos; // Pastikan untuk menggunakan model Carikos

class SimpanKosTest extends TestCase
{
    public function testItCanSaveKos()
    {
        $user = User::factory()->create();
        $kos = Carikos::factory()->create();

        $data = [
            'user_id' => $user->id, 
            'id_kos' => $kos->id_kos, 
            'nama_kos' => 'Kos Test',
            'harga_kos_pertahun' => '800000',
            'jarak_kos' => '1200',
            'gambar_kos1' => 'path/to/image.jpg'
        ];

        $simpan = Simpan::create($data);

        $this->assertDatabaseHas('bookmark_kos', [
            'id' => $simpan->id,
            'nama_kos' => 'Kos Test',
        ]);
    }
}
