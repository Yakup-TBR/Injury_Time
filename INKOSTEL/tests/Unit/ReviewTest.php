<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Review;
use App\Models\Carikos;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReviewTest extends TestCase
{

    /** @test */
    public function it_can_add_a_review()
    {
        // Membuat data dummy untuk User dan Carikos
        $user = User::create([
            'name' => 'Rizki Mr',
            'email' => 'rizkimr@gmail.com.com',
            'password' => bcrypt('password'),
        ]);

        $carikos = Carikos::create([
            'nama_kos' => 'Firdaus',
            'alamat' => 'Sukpur',
        ]);

        $data = [
            'id_kos' => $carikos->id,
            'user_id' => $user->id,
            'rating' => '5',
            'comment' => 'Tempatnya bagus'
        ];

        Review::create($data);

        $this->assertDatabaseHas('reviews', $data);
    }

    /** @test */
    public function it_requires_user_id_to_add_a_review()
    {
        // Membuat data dummy untuk Carikos
        $carikos = Carikos::create([
            'nama_kos' => 'Test Kos',
            'alamat' => 'Alamat Kos',
        ]);

        $data = [
            'id_kos' => $carikos->id,
            'rating' => '5',
            'comment' => 'Tempatnya bagus'
        ];

        // Coba tambahkan review tanpa user_id
        Review::create($data);

        // Pastikan bahwa data tidak masuk ke dalam database
        $this->assertDatabaseMissing('reviews', $data);
    }

    /** @test */
    public function it_requires_id_kos_to_add_a_review()
    {
        // Membuat data dummy untuk User
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
        ]);

        $data = [
            'user_id' => $user->id,
            'rating' => '5',
            'comment' => 'Tempatnya bagus'
        ];

        // Coba tambahkan review tanpa id_kos
        Review::create($data);

        // Pastikan bahwa data tidak masuk ke dalam database
        $this->assertDatabaseMissing('reviews', $data);
    }

    /** @test */
    public function it_requires_rating_to_add_a_review()
    {
        // Membuat data dummy untuk User dan Carikos
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
        ]);

        $carikos = Carikos::create([
            'nama_kos' => 'Test Kos',
            'alamat' => 'Alamat Kos',
        ]);

        $data = [
            'id_kos' => $carikos->id,
            'user_id' => $user->id,
            'comment' => 'Tempatnya bagus'
        ];

        // Coba tambahkan review tanpa rating
        Review::create($data);

        // Pastikan bahwa data tidak masuk ke dalam database
        $this->assertDatabaseMissing('reviews', $data);
    }

    /** @test */
    public function it_can_add_a_review_with_empty_comment()
    {
        // Membuat data dummy untuk User dan Carikos
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
        ]);

        $carikos = Carikos::create([
            'nama_kos' => 'Test Kos',
            'alamat' => 'Alamat Kos',
        ]);

        $data = [
            'id_kos' => $carikos->id,
            'user_id' => $user->id,
            'rating' => '4',
            'comment' => '' // Komentar kosong
        ];

        Review::create($data);

        // Pastikan bahwa data masuk ke dalam database
        $this->assertDatabaseHas('reviews', $data);
    }
}
