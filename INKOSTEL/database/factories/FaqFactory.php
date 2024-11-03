<?php

namespace Database\Factories;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    protected $model = Faq::class;

    public function definition()
    {
        return [
            'kategori' => $this->faker->word(),
            'pertanyaan' => $this->faker->sentence(),
            'jawaban' => $this->faker->paragraph(),
        ];
    }
}
