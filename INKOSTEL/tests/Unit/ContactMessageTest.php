<?php

namespace Tests\Unit;

use App\Models\ContactMessage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactMessageTest extends TestCase
{
    public function test_create_contact_message()
    {
        $data = [
            'name' => 'Yakup',
            'email' => 'yakup@gmail.com',
            'subject' => 'Penambahan Fitur',
            'message' => 'Tambahkan fitur AI!',
        ];

        ContactMessage::create($data);

        $this->assertDatabaseHas('contact_messages', $data);
    }

    public function test_contact_message_requires_all_fields()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        ContactMessage::create([
            'email' => 'yakup@gmail.com', // Missing required fields like 'name', 'subject', 'message'
        ]);
    }
}
