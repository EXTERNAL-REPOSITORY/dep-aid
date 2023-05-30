<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use App\Models\DispensedMedicines;
use App\Models\Inventory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DipensedMedicinesFactory extends Factory
{
    protected $model = DispensedMedicines::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = fake()->randomElement(['Male', 'Female']);
        return [
            'medicine_id' => random_int(1, 100),
            'patient_name' => fake()->firstName($gender) . " " . fake()->lastName() . " " . fake()->lastName(),
            'quantity' => Inventory::all()->random()->id,
            'remarks' => "Sample Remarks",
            'created_at' => fake()->dateTimeBetween('1990-01-01', '2023-05-30'),
            'updated_at' => Carbon::now(),
        ];
    }
}
