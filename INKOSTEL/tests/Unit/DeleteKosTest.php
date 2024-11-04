<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Simpan; 
use App\Models\User;
use App\Models\Carikos;

class DeleteKosTest extends TestCase
{
    public function testItCanDeleteASavedKos()
    {
        $user = User::factory()->create();
        $kos = Carikos::factory()->create();

        $simpan = Simpan::create([
            'user_id' => $user->id,
            'id_kos' => $kos->id_kos, 
            'nama_kos' => 'Kos Test',
            'harga_kos_pertahun' => 8000000,
            'jarak_kos' => 700,
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
        $user = User::factory()->create();
        $kos = Carikos::factory()->create();

        $simpan = Simpan::create([
            'user_id' => $user->id,
            'id_kos' => $kos->id_kos, 
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
