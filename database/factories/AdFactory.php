<?php


namespace Database\Factories;

use App\Models\Ad;
use App\Models\User;
use App\Models\Category;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    protected $model = Ad::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Yangi User yaratadi
            'title' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'category_id' => Category::factory(), // Yangi Category yaratadi
            'region_id' => Region::factory(), // Yangi Region yaratadi
        ];
    }
}

