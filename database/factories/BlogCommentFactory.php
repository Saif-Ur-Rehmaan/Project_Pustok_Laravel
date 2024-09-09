<?php

namespace Database\Factories;

use App\Models\BlogComment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogComment>
 */
class BlogCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rNo=BlogComment::count();
        return [
            'user_id'=>$rNo?$rNo:1,
            'blog_id'=>$rNo?$rNo:1,
            'comment'=>$this->faker->text(),
        ];
    }
}
