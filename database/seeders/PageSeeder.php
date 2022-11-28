<?php

namespace Nortta\Laravel\Seeders;

use Illuminate\Database\Seeder;
use Nortta\Laravel\Page;

class PageSeeder extends Seeder
{
    public function run()
    {
        Page::factory()->create([
            'title' => 'Hello World',
            'slug' => 'hello-world',
        ]);

        Page::factory(9)->create();
    }
}
