<?php

use App\Article;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 15; $i++) { 
            $article = new Article();
            $article->author = $faker->word();
            $article->title = $faker->words(3, true);
            $article->subtitle = $faker->words(10, true);
            $article->image = $faker->imageUrl(360, 360, 'Articles', true, $article->title);
            $article->content = $faker->paragraphs(3, true);
            $article->save();
        }
    }
}
