<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->name(),
            'url' => asset('/img/video/29a.mp4'),
            'length' => $this->faker->randomNumber(3),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->realText(),
            'thumbnail' => 'https://picsum.photos/id/' . rand(1, 99).'/446/240',
            'category_id'=> Category::inRandomOrder()->first() ?? Category::factory(),
            'created_at'=> time() - random_int(100,10000)
        ];
    }
}
