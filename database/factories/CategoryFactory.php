<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,5),
            'thumbnail' => $this->faker->sentence,
            'slug' => str_slug($title),
            'name' => 'jay',
            'slug' => 'title',
            'is_published' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
