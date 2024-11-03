<?php

namespace Tests\Feature;

use App\Models\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FaqTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_faqs_correctly_on_the_faq_page()
    {
        // Buat beberapa data FAQ
        Faq::factory()->count(3)->create();

        // Akses halaman FAQ
        $response = $this->get('/faq');

        // Pastikan respons adalah 200 (OK)
        $response->assertStatus(200);

        // Ambil pertanyaan pertama dari database untuk pengecekan
        $firstFaq = Faq::first();

        // Pastikan data FAQ pertama terlihat di halaman
        $response->assertSee($firstFaq->kategori);
        $response->assertSee($firstFaq->pertanyaan);
        $response->assertSee($firstFaq->jawaban);
    }
}
