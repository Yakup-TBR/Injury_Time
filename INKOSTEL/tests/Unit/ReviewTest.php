<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Review;
use App\Models\carikos;

class ReviewTest extends TestCase
{
    /** @test */
    public function it_can_add_a_review()
    {

        $data = [
            'id_kos' => '7',
            'user_id' => '1',
            'rating' => '5',
            'comment' => 'Tempatnya bagus'
        ];

        Review::create($data);

        $this->assertDatabaseHas('reviews', $data);
    }

    /** @test */
    public function it_requires_user_id_to_add_a_review()
    {

        $data = [
            'id_kos' => '7',
            'user_id' => '1', //Fix
            'rating' => '5',
            'comment' => 'Tempatnya bagus'
        ];

        Review::create($data);

        $this->assertDatabaseHas('reviews', $data);
    }

    /** @test */
    public function it_requires_id_kos_to_add_a_review()
    {
        $data = [
            'id_kos' => '7', //Fix
            'user_id' => '1',
            'rating' => '5',
            'comment' => 'Tempatnya bagus'
        ];

        Review::create($data);

        $this->assertDatabaseHas('reviews', $data);
    }

    /** @test */
    public function it_requires_rating_to_add_a_review()
    {
        $data = [
            'id_kos' => '7',
            'user_id' => '1',
            'rating' => '5', //Fix
            'comment' => 'Tempatnya bagus'
        ];

        Review::create($data);

        $this->assertDatabaseHas('reviews', $data);
    }

    /** @test */
    public function it_can_add_a_review_with_empty_comment()
    {
        $data = [
            'id_kos' => '7',
            'user_id' => '1',
            'rating' => '4',
            'comment' => '' // Komentar kosong
        ];

        Review::create($data);

        $this->assertDatabaseHas('reviews', $data);
    }

}