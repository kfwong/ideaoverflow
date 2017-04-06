<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class PostTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $data = [];

        foreach(range(1,13) as $i){
            array_push($data,[
                'post_id' => $i,
                'tag_id' => $faker->numberBetween(1,3)
            ]);
        }

        DB::table('post_tags')->insert($data);
    }
}
