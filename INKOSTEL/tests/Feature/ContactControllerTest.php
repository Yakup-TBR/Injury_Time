<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    public function test_store_contact_message_with_invalid_data()
    {
        $response = $this->post(route('contact.store'), [
            'name' => '', // Name Invalid
            'email' => 'invalid-email', //  email format Invalid
            'subject' => '', // Subject Kosong
            'message' => '', // Message Kosong
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'subject', 'message']);
        $this->assertDatabaseMissing('contact_messages', [
            'email' => 'invalid-email',
        ]);
    }

    public function test_store_contact_message_redirects_with_success_message()
    {
        $response = $this->post(route('contact.store'), [
            'name' => 'Yakup',
            'email' => 'yakup@gmail.com',
            'subject' => 'Penambahan Fitur',
            'message' => 'Tambahkan fitur AI!',
        ]);

        $response->assertRedirect(route('carikost'));
        $response->assertSessionHas('success', 'Your message has been sent successfully!');
    }

    
}
