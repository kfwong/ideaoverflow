<?php

use \Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
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

        foreach(range(1,100) as $i){
            array_push($data,[
                'user_id' => $faker->numberBetween(1, 100),
                'post_id' => $faker->numberBetween(1, 100)
            ]);
        }

        DB::table('post_user_likes')->insert($data);
    }
}
