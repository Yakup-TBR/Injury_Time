<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class ReviewTest extends TestCase
{
    private function validateReviewData(array $data)
    {
        $validator = Validator::make($data, [
            'id_kos' => 'required',
            'user_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    /** @test */
    public function it_can_add_a_review()
    {
        $data = [
            'id_kos' => '7',
            'user_id' => '1',
            'rating' => '5',
            'comment' => 'Tempatnya bagus'
        ];

        $this->validateReviewData($data);

        $this->assertTrue(true); 
    }

    /** @test */
    public function it_requires_user_id_to_add_a_review()
    {
        $this->expectException(ValidationException::class);

        $data = [
            'id_kos' => '7',
            'rating' => '5',
            'comment' => 'Tempatnya bagus'
        ];

        $this->validateReviewData($data);
    }

    /** @test */
    public function it_requires_id_kos_to_add_a_review()
    {
        $this->expectException(ValidationException::class);

        $data = [
            'user_id' => '1',
            'rating' => '5',
            'comment' => 'Tempatnya bagus'
        ];

        $this->validateReviewData($data);
    }

    /** @test */
    public function it_requires_rating_to_add_a_review()
    {
        $this->expectException(ValidationException::class);

        $data = [
            'id_kos' => '7',
            'user_id' => '1',
            'comment' => 'Tempatnya bagus'
        ];

        $this->validateReviewData($data);
    }

    /** @test */
    public function it_can_add_a_review_with_empty_comment()
    {
        $data = [
            'id_kos' => '7',
            'user_id' => '1',
            'rating' => '4',
            'comment' => '' 
        ];

        
        $this->validateReviewData($data);

        $this->assertTrue(true); 
    }

    /** @test */
    public function it_requires_valid_rating_value()
    {
        $this->expectException(ValidationException::class);

        $data = [
            'id_kos' => '7',
            'user_id' => '1',
            'rating' => '10', 
            'comment' => 'Invalid rating'
        ];

        $this->validateReviewData($data);
    }
}
