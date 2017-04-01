<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => "Everyday sustanability",
			'body' => "How can i behave in a more sustanaible way on a daily basis?",
			'user_id' => 10,
			'type' => 'problem',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
        ]);
		
		DB::table('posts')->insert([
            'title' => "Visit other countries",
			'body' => "I'm an exchange student and I wish to travel during the semester. What are the most beautifull countries nearby?",
			'user_id' => 5,
			'type' => 'problem',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
        ]);
		
		DB::table('posts')->insert([
            'title' => "Have a nice trip",
			'body' => "Let's create a platform for people to share about the countries they have visited, for them to find some new palces to discover, and to gather with people who want to go abroad, but not alone !!",
			'user_id' => 2,
			'type' => 'project',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
        ]);
		
		DB::table('posts')->insert([
            'title' => "Concert for a charity",
			'body' => "Hey! I volonteer for a charity and i would like to organize a concert, but i don't have the necessary skills to do so. So please join my project if you know how to organise an event like that!",
			'user_id' => 1,
			'type' => 'project',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
        ]);
		
		DB::table('posts')->insert([
            'title' => "I'm thursty",
			'body' => "Can someone please design a bag for me to carry both my huge computer and my bottle of water?",
			'user_id' => 44,
			'type' => 'idea',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
        ]);
		
		DB::table('posts')->insert([
            'title' => "What Should I Draw?",
			'body' => "Reckless Deck is a character-creating card deck: 72 individual cards, divided into six categories across four genres. Basically, Reckless Deck is a randomizer, an idea generator. But it's also a genre smasher - it takes everything you think you know about the borders between Science Fiction and Fantasy, Between Steampunk and Comics and Horror - and turns it all on its head. The results are a never ending supply of fresh ammunition for your next painting, comic, or sketchbook doodle - or your next novel, short story, cosplay character, or gaming adventure, for that matter.",
			'user_id' => 23,
			'type' => 'project',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
        ]);
		
		DB::table('posts')->insert([
            'title' => "XPlotter",
			'body' => "XPlotter is designed to create a new definition of plotter. By integrating the laser engraver and cutter into the mechanism, it becomes a versatile yet affordable desktop tool for artists, craftsmen and makers to set their imagination free. XPlotter is not just capable of simulating real effects of handmade drawing and writing, cutting out and laser engraving on different materials as people like, but also be able to pick and place objects with great accuracy, leaving room for secondary development on more applications. ",
			'user_id' => 26,
			'type' => 'project',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
        ]);
		
		DB::table('posts')->insert([
            'title' => "Instrument Tuners",
			'body' => "Can someone create a automatic string tuner that is quick, easy to use, and cheap?",
			'user_id' => 14,
			'type' => 'idea',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
        ]);
		
		DB::table('posts')->insert([
            'title' => "Water tester",
			'body' => "Wouldn't a water tester be amazing? Just put some water on the tester to make sure your water is drinkable before actually drinking it ^^!",
			'user_id' => 50,
			'type' => 'idea',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
        ]);
		
		DB::table('posts')->insert([
            'title' => "Food sharing system",
			'body' => "The problem with leaving food in the kitchen to share it with everyone is that people don't know when the thing was open, if it is still good, if some insects didn't have a taste of it when someone forgot to close the box... Anyone has an idea?",
			'user_id' => 50,
			'type' => 'problem',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
        ]);
		
		DB::table('posts')->insert([
            'title' => "Looking for someone with advertising skills",
			'body' => "Hey! Our very new website needs to get some views so that we can run some statistics for our final report. We think we shoud advertise our website, but we don't really know how... Little help? Thanks !",
			'user_id' => 33,
			'type' => 'project',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
        ]);
		
		DB::table('posts')->insert([
            'title' => "I want to make a video game!",
			'body' => "I have a lot of ideas, but not all the skills to make a video game. So if anyone wants to join the adventure, please contact me!! I can't do this alone, but I promise it's gonna be amazing!",
			'user_id' => 13,
			'type' => 'project',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
        ]);
            
    }
}
