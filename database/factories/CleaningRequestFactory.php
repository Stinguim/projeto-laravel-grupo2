<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Company;
use App\Models\Lodging;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CleaningRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'data_request' => $this->faker->date(),
            'descricao' => $this->faker->sentence(),
            'lodging_id' => Lodging::all()->random()->id_lodging,
            'user_id' => User::where('user_type', 'client')->inRandomOrder()->first()->id_user,
            'company' => Company::all()->random()->id_company
        ];
    }
}
