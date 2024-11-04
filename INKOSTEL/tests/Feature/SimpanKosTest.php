<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Simpan;


class SimpanKosTest extends TestCase
{

    public function testItCanSaveKos()
    {
        $data = [
            'user_id' => 1,
            'id_kos' => 6,
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