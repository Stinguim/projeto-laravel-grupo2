<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cleaning;
use App\Models\CleaningTeam;
use App\Models\CleaningRequest;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cleaning>
 */
class CleaningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTimeBetween('now', '+5 days'),
            'estado' => 'To do',
            'cleaning_team_id' => CleaningTeam::inRandomOrder()
                ->first()
                ->id_cleaning_team,
            'cleaning_request_id' => CleaningRequest::inRandomOrder()
                ->first()
                ->id_cleaning_request,
        ];
    }
}
