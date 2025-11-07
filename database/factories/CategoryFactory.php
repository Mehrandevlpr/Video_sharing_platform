<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = [
            'ورزشی' => [
                'slug' => 'sport',
                'icon' => 'fa-solid fa-basketball'
            ],
            'سینما' => [
                'slug' => 'cinema',
                'icon' => 'fa fa-film'
            ],
            'بازی' => [
                'slug' => 'game',
                'icon' => 'fa fa-gamepad'
            ],
            'طنز' => [
                'slug' => 'fun',
                'icon' => 'fa-solid fa-face-smile'
            ],
            'وحشت' => [
                'slug' => 'horror',
                'icon' => 'fa fa-hashtag'
            ],
            'تکنولوژی' => [
                'slug' => 'tech',
                'icon' => 'fa fa-laptop'
            ],
            'تاریخی' => [
                'slug' => 'historical',
                'icon' => 'fa fa-university'
            ],
        ];

        foreach($categories as $categoryName => $details){
            Category::create([
                'name'=>$categoryName,
                'description'=>$this->faker->realText(10),
                'slug'=>$details['slug'],
                'icon'=>$details['icon'],
            ]);
        }
    }
}
