<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
        {
            $comics = config('comicsData');
            foreach ($comics as $comic) {
                $newComic = new Comic();
                $newComic->title = $comic['title'];
                $newComic->description = $comic['description'];
                $newComic->image = $comic['thumb'];
                $newComic->series = $comic['series'];
                $newComic->type = $comic['type'];
                $price = str_replace('$', '', $comic['price']);
                $price = floatval($price);
                $newComic->price = $price;
                $newComic->save();
        }
        }

}
