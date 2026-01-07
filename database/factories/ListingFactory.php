<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'bed'=> fake()->numberBetween(1,5),
            'bath'=> fake()->numberBetween(1,5),
            'area'=> fake()->numberBetween(20,500),
            'city'=> fake()->city(),
            'street'=> fake()->streetName(),
            'code'=> fake()->postcode(),
            'street_nr'=> fake()->buildingNumber(),
            'price'=> fake()->numberBetween(50000,1000000),
            
        ];
    }
}
