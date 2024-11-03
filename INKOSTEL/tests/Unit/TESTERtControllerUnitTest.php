<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TESTERtControllerUnitTest extends TestCase
{
    public function test_store_method_validates_request_data()
    {
        $this->expectException(ValidationException::class);

        $controller = new ContactController();
        $request = Request::create('/contact-us', 'POST', [
            'name' => 'Yakup',
            'email' => 'yakupgmail.com',  // invalid email
            'subject' => 'Penambahan Fitur',
            'message' => 'Tambahkan fitur AI!',
        ]);

        $controller->store($request);
    }
}
