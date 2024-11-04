<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Simpan;
use App\Models\User; 

class SimpanKosTest extends TestCase
{
    public function testItCanSaveKos()
{
    // Membuat pengguna baru menggunakan factory
    $user = User::factory()->create();

    $data = [
        'user_id' => $user->id, 
        'id_kos' => 7,
        'nama_kos' => 'Kos Test',
        'harga_kos_pertahun' => '800000',
        'jarak_kos' => '1200',
        'gambar_kos1' => 'path/to/image.jpg'
    ];

    // Simpan data kos
    $simpan = Simpan::create($data);

    // Memastikan data disimpan di database
    $this->assertDatabaseHas('bookmark_kos', [
        'id' => $simpan->id,
        'nama_kos' => 'Kos Test',
    ]);
}

}
