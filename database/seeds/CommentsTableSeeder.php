<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the comments seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Comment::class, 100)
            ->create();
    }
}
