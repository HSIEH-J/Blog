<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

//can run php artisan migrate:fresh --seed

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            //'category_id' => $personal->id,
            'user_id' => $user->id,
            'title' => 'Tempelete Post',
            //'slug' => 'my-php-blog',
            'excerpt' => "Let's sign up or log in to write your first post ...",
            'body' => 'There are a variety of tools and frameworks available to you when building a web application. However, we believe Laravel is the best choice for building modern, full-stack web applications.'
        ]);

        
    }
}

//'<p>'.'Hey! Family...'.'</p>'
