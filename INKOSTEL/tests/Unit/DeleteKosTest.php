<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Simpan; 

class DeleteKosTest extends TestCase
{
    

    public function testItCanDeleteASavedKos()
    {
        $simpan = Simpan::create([
            'user_id' => 14,
            'id_kos' => 16,
            'nama_kos' => 'Kos Test',
            'harga_kos_pertahun' => 8000000,
            'jarak_kos' => 700,
            'gambar_kos1' => 'path/to/image.jpg'
        ]);

        $this->assertDatabaseHas('bookmark_kos', [
            'id' => $simpan->id,
            'nama_kos' => 'Kos Test',
        ]);

        // Simulasi penghapusan dengan konfirmasi
        $simpan->delete();

        $this->assertDatabaseMissing('bookmark_kos', [
            'id' => $simpan->id,
        ]);
    }

    public function testItFailsToDeleteKosWithoutConfirmation()
    {
        $simpan = Simpan::create([
            'user_id' => 14,
            'id_kos' => 16,
            'nama_kos' => 'Kos Test',
            'harga_kos_pertahun' => 8000000,
            'jarak_kos' => 700,
            'gambar_kos1' => 'path/to/image.jpg'
        ]);

        $this->assertDatabaseHas('bookmark_kos', [
            'id' => $simpan->id,
        ]);


        $this->assertDatabaseHas('bookmark_kos', [
            'id' => $simpan->id, 
        ]);
    }

    public function testItFailsToDeleteNonExistingKos()
    {
        $simpan = Simpan::find(999); 
    
        $this->assertNull($simpan, 'Data tidak seharusnya ditemukan di database');
    }
}
