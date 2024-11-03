<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FaqPageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Jalankan seeder khusus untuk FAQ sebelum setiap test dijalankan
        $this->seed(\Database\Seeders\FaqSeeder::class);
    }

    /** @test */
    public function it_displays_faqs_from_seeder()
    {
        // Akses halaman FAQ
        $response = $this->get('/faq');

        // Pastikan status halaman 200
        $response->assertStatus(200);

        // Verifikasi bahwa konten dari seeder terlihat di halaman
        $response->assertSee('Apa itu InKostel?');
        $response->assertSee('InKostel adalah platform untuk mencari kost.');
        $response->assertSee('Apakah ada biaya untuk menggunakan InKostel?');
        $response->assertSee('Tidak, InKostel dapat digunakan secara gratis.');
    }
}
