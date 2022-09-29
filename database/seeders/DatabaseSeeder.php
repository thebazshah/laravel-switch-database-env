<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@hiscompany.com',
            'password' => bcrypt('johndoespassword'),
        ]);

        Article::create([
            'title' => "John Doe's First Article?",
            'text' => 'Some detail on first article.',
            'userId' => $user->id,
        ]);
        Article::create([
            'title' => "John Doe's Second Article?",
            'text' => 'Some detail on second article.',
            'userId' => $user->id,
        ]);

        // switch environment to dev
        putenv('ALPHA_ENV=dev');

        Article::create([
            'title' => "John Doe's First Article?",
            'text' => 'Some detail on first article.',
            'userId' => $user->id,
        ]);
        Article::create([
            'title' => "John Doe's Second Article?",
            'text' => 'Some detail on second article.',
            'userId' => $user->id,
        ]);

        // switch environment back to prod
        putenv('ALPHA_ENV=prod');
    }
}
