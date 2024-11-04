<?php

namespace Database\Factories;

use App\Models\CariKos;
use Illuminate\Database\Eloquent\Factories\Factory;

class CariKosFactory extends Factory
{
    protected $model = CariKos::class;

    public function definition()
    {
        return [
            'id_kos' => $this->faker->unique()->numberBetween(1, 100),
            'nama_kos' => $this->faker->word,
            'harga_kos_pertahun' => $this->faker->numberBetween(1000000, 5000000),
            'jarak_kos' => $this->faker->numberBetween(1, 100),
            'gambar_kos1' => $this->faker->imageUrl(),
            'alamat' => $this->faker->address,
            'Deskripsi' => $this->faker->text,
            'ContactPerson' => $this->faker->name,
        ];
    }
}
