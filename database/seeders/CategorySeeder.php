<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,10) as $index)
        DB::table('categories')->insert([
            'name' => $faker->name,
            'slug' => $faker->slug,
            'description' => $faker->text,
            'status' => $faker->randomElement(['0','1']),
            'popular' => $faker->randomElement(['0','1']),
            'image' => $faker->image(public_path('upload/image/category'),50,50,null,false),
            'meta_title' => $faker->title,
            'meta_descrip' => $faker->title,
            'meta_keywords' => $faker->title,
        ]);
    }
}