<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Autobot;
use App\Models\Post;
use App\Models\Comment;

class CreateAutobots extends Command
{
    protected $signature = 'create:autobots';
    protected $description = 'Create 500 unique Autobots with posts and comments';

    public function handle()
    {
        for ($i = 0; $i < 500; $i++) {
            // Create Autobot
            $response = Http::get('https://jsonplaceholder.typicode.com/users');
            $user = $response->json()[array_rand($response->json())]; // Get a random user
            
            $autobot = Autobot::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'username' => strtolower($user['name']), 
            ]);

            // Create Posts
            for ($j = 0; $j < 10; $j++) {
                $postTitle = "Unique Post Title " . uniqid();
                $post = Post::create([
                    'autobot_id' => $autobot->id,
                    'title' => $postTitle,
                    'body' => 'Post body here...',
                ]);

               
                for ($k = 0; $k < 10; $k++) {
                    $commentResponse = Http::get('https://jsonplaceholder.typicode.com/users');
                    $commentUser = $commentResponse->json()[array_rand($commentResponse->json())];
                    Comment::create([
                        'post_id' => $post->id,
                        'body' => 'Comment body here...',
                        'name' => $commentUser['name'], 
                        'email' => $commentUser['email']
                    ]);
                }
            }
        }
    }
}
