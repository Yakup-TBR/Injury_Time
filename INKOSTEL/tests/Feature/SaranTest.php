<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SaranTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    use RefreshDatabase;
    
    public function test_form_saran_dapat_diakses(): void
    {
        $response = $this->get('/saran');
        $response->assertStatus(200);
        $response->assertSee('Nama');

    }
    public function test_validasi_input_saran(){
        $response = $this->post('/saran', [
            'nama' => '',
            'saran' => ''
        ]);
        $response->assertSessionHasErrors(['nama', 'saran']);
    }
    public function test_input_saran(){
        $response = $this->post('/saran', [
            'nama' => 'Tio',
            'saran' => 'Saran saya'
        ]);

                $response->assertSessionHasNoErrors();
        $response->assertRedirect('/saran');
        $this->assertDatabaseHas('saran', [
            'nama' => 'Tio',
            'saran' => 'Saran saya'
        ]);
    }
    public function test_tampilkan_saran_sukses_setelah_input_saran(){
        $response = $this->post('/saran', [
            'nama' => 'Tio',
            'saran' => 'Saran saya'
        ]);
        $response->assertRedirect('/saran');
        $response = $this->get('/saran');
        $response->assertSee('Terimakasih atas saran yang anda berikan');
    }
}
