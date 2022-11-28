<?php

namespace Nortta\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PageFactory extends Factory
{
    public function definition()
    {
        $title = ucwords($this->faker->words(3));

        $paragraphs = $this->faker->paragraphs(5);

        $paragraphs = array_map(function ($paragraph) {
            return "<p>$paragraph</p>";
        }, $paragraphs);

        return [
            'uuid' => $this->faker->uuid,
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => implode('', $paragraphs),
        ];
    }
}
