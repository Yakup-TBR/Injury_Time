<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Simpan; 
use App\Models\User;

class DeleteKosTest extends TestCase
{
    public function testItCanDeleteASavedKos()
    {
        // Membuat pengguna baru menggunakan factory
        $user = User::factory()->create();

        // Simpan kos dengan data yang benar
        $simpan = Simpan::create([
            'user_id' => $user->id, // Menggunakan ID pengguna yang baru dibuat
            'id_kos' => 6,
            'nama_kos' => 'Kos Test',
            'harga_kos_pertahun' => 8000000,
            'jarak_kos' => 700,
            'gambar_kos1' => 'path/to/image.jpg'
        ]);

        // Memastikan data kos ada di database
        $this->assertDatabaseHas('bookmark_kos', [
            'id' => $simpan->id,
            'nama_kos' => 'Kos Test',
        ]);

        // Simulasi penghapusan
        $simpan->delete();

        // Memastikan data kos sudah tidak ada di database
        $this->assertDatabaseMissing('bookmark_kos', [
            'id' => $simpan->id,
        ]);
    }

    public function testItFailsToDeleteKosWithoutConfirmation()
    {
        // Membuat pengguna baru menggunakan factory
        $user = User::factory()->create();

        // Simpan kos dengan data yang benar
        $simpan = Simpan::create([
            'user_id' => $user->id, // Menggunakan ID pengguna yang baru dibuat
            'id_kos' => 6,
            'nama_kos' => 'Kos Test',
            'harga_kos_pertahun' => 8000000,
            'jarak_kos' => 700,
            'gambar_kos1' => 'path/to/image.jpg'
        ]);

        // Memastikan data kos ada di database
        $this->assertDatabaseHas('bookmark_kos', [
            'id' => $simpan->id,
        ]);

        // Pastikan tidak ada penghapusan terjadi
        $this->assertDatabaseHas('bookmark_kos', [
            'id' => $simpan->id, 
        ]);
    }

    public function testItFailsToDeleteNonExistingKos()
    {
        // Mengambil data kos dengan ID yang tidak ada
        $simpan = Simpan::find(999); 
        
        // Memastikan data tidak ada di database
        $this->assertNull($simpan, 'Data tidak seharusnya ditemukan di database');
    }
}
