<?php

namespace Tests\Unit;

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Validation\ValidationException;

class ContactControllerUnitTest extends TestCase
{
    public function test_store_saves_data_correctly()
    {
        $controller = new ContactController();

        $request = Request::create('/contact-us', 'POST', [
            'name' => 'Yakup',
            'email' => 'yakup@gmail.com',
            'subject' => 'Penambahan Fitur',
            'message' => 'Tambahkan fitur AI!',
        ]);

        $controller->store($request);

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Yakup',
            'email' => 'yakup@gmail.com',
            'subject' => 'Penambahan Fitur',
            'message' => 'Tambahkan fitur AI!',
        ]);
    }
}
