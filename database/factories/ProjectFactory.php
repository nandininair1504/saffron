<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = ucwords(implode(' ', $this->faker->words()));
        $startDate = Carbon::now()->format('Y-m-d h:i:s');
        $endDate = Carbon::now()->addMonths(1)->format('Y-m-d h:i:s');

        return [
            "title" => $title,
            "slug" => Str::slug($title),
            "description" => $this->faker->text,
            "start_date" => $startDate,
            "end_date" => $endDate,
            "status" => $this->faker->boolean,
            "image_path" => $this->faker->imageUrl,
        ];
    }
}
