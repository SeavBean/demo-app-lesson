<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $thumbnails = ['image1.jpg', 'image2.jpg', 'image3.jpg', 'image4.jpg', 'image5.jpg'];
        $category = Category::all()->pluck('id')->toArray();
        return [
            'user_id'=>1,
            'title' => $this->faker->sentence(),
            'content'=> $this->faker->text(),
            'image'=> 'uploads/'.fake()->randomElement($thumbnails),
            'category_id'=> fake()->randomElement($category),

        ];
    }
    public function configure()
    {
        $tags= Tag::all()->pluck('id')->toArray();

        return $this->afterCreating(function ($post) use ($tags) {
            // Attach random tags to the post
            $post->tags()->sync(fake()->randomElements($tags, 2));
           
        });
    }
}

