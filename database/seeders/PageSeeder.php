<?php

namespace Nortta\Laravel\Seeders;

use Illuminate\Database\Seeder;
use Nortta\Laravel\Page;

class PageSeeder extends Seeder
{
    public function run()
    {
        $faq = Page::factory()->create([
            'title' => 'FAQ',
            'slug' => 'faq',
        ]);

        Page::factory()->create([
            'title' => 'Hello World',
            'slug' => 'hello-world',
            'parent_id' => $faq->uuid
        ]);

        Page::factory(9)->create([
            'parent_id' => $faq->uuid
        ]);
    }
}
