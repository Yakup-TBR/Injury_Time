<?php

namespace Tests\Unit;

use App\Models\Review;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    /** @test */
    public function it_can_add_a_review()
    {
        // Data dummy untuk membuat review
        $data = [
            'id_kos' => '7',
            'user_id' => '1',
            'rating' => '5',
            'comment' => 'Tempatnya bagus',
        ];

        // Buat review menggunakan model
        Review::create($data);

        // Periksa apakah data tersebut ada di tabel reviews
        $this->assertDatabaseHas('reviews', $data);
    }

    /** @test */
    public function it_requires_user_id_to_add_a_review()
    {
        // Data dummy tanpa user_id
        $data = [
            'id_kos' => '7',
            'user_id' => '1',
            'rating' => '5',
            'comment' => 'Tempatnya bagus',
        ];

        // Coba membuat review tanpa user_id
        Review::create($data);

        // Periksa apakah data tersebut ada di tabel reviews
        $this->assertDatabaseHas('reviews', $data);
    }

    /** @test */
    public function it_requires_id_kos_to_add_a_review()
    {
        // Data dummy tanpa id_kos
        $data = [
            'id_kos' => '7',
            'user_id' => '1',
            'rating' => '5',
            'comment' => 'Tempatnya bagus',
        ];

        // Coba membuat review tanpa id_kos
        Review::create($data);

        // Periksa apakah data tersebut ada di tabel reviews
        $this->assertDatabaseHas('reviews', $data);
    }

    /** @test */
    public function it_requires_rating_to_add_a_review()
    {
        // Data dummy tanpa rating
        $data = [
            'id_kos' => '7',
            'user_id' => '1',
            'rating' => '5',
            'comment' => 'Tempatnya bagus',
        ];

        // Coba membuat review tanpa rating
        Review::create($data);

        // Periksa apakah data tersebut ada di tabel reviews
        $this->assertDatabaseHas('reviews', $data);
    }

    /** @test */
    public function it_can_add_a_review_with_empty_comment()
    {
        // Data dummy dengan komentar kosong
        $data = [
            'id_kos' => '7',
            'user_id' => '1',
            'rating' => '4',
            'comment' => '', // Komentar kosong
        ];

        // Buat review dengan komentar kosong
        Review::create($data);

        // Periksa apakah data tersebut ada di tabel reviews
        $this->assertDatabaseHas('reviews', $data);
    }
}
