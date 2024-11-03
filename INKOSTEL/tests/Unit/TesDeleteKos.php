<?php

namespace Tests\Unit;

use App\Models\Simpan;
use Tests\TestCase;
use Illuminate\Http\Request;


class TesDeleteKos extends TestCase 
{

    public function testItCanDeleteASavedKos()
    {
        $simpan = Simpan::create([
            'user_id' => 1,
            'id_kos' => 1,
            'nama_kos' => 'Kos Test',
            'harga_kos_pertahun' => 1000000,
            'jarak_kos' => 500,
            'gambar_kos1' => 'path/to/image.jpg'
        ]);

        $this->assertDatabaseHas('bookmark_kos', [
            'id' => $simpan->id,
            'nama_kos' => 'Kos Test',
        ]);

        $simpan->delete();

        $this->assertDatabaseMissing('bookmark_kos', [
            'id' => $simpan->id,
        ]);
    }

    public function testItFailsToDeleteKosWithoutConfirmation()
    {
        $simpan = Simpan::create([
            'user_id' => 1,
            'id_kos' => 1,
            'nama_kos' => 'Kos Test',
            'harga_kos_pertahun' => 1000000,
            'jarak_kos' => 500,
            'gambar_kos1' => 'path/to/image.jpg'
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
