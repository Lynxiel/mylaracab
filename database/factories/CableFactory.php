<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cable>
 */
class CableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $corecount = rand(1,10);
        $coresize = rand(1,50);
        return [
            'title' => $this->faker->firstNameMale(). ' ' . $corecount. 'x' . $coresize,
            'cable_group_id'=> rand(1,5),
            'footage'=> rand(100,400),
            'coresize'=> $coresize,
            'corecount'=> $corecount,
            'capacity'=> rand(1000,40000),
            'instock'=> rand(10,40000),
            'price'=> rand(10,400),

        ];
    }
}
