<?php

namespace Nortta\Laravel\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Nortta\Laravel\Page;

class PageFactory extends Factory
{
    protected $model = Page::class;

    public function definition()
    {
        $title = ucwords($this->faker->words(3, true));

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
