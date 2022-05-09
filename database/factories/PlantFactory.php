<?php

namespace Database\Factories;

use App\Domain\Plant\Plant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Domain\Plant\Plant>
 */
class PlantFactory extends Factory
{
    protected $model = Plant::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->colorName(),
            'species' => $this->faker->creditCardType(),
            'watering_instructions' => $this->faker->text(),
            'photo_name' => $this->faker->filePath()
        ];
    }
}
