<?php


namespace Database\Factories;

use App\Models\AdTag;
use App\Models\Ad;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdTagFactory extends Factory
{
    protected $model = AdTag::class;

    public function definition()
    {
        return [
            'ad_id' => Ad::factory(), // Yangi Ad yaratadi
            'tag_id' => Tag::factory(), // Yangi Tag yaratadi
        ];
    }
}

