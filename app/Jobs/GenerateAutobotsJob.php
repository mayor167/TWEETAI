<?php

namespace App\Jobs;

use App\Models\Autobot;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class GenerateAutobotsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        for ($i = 0; $i < 500; $i++) {
            $user = Http::get('https://jsonplaceholder.typicode.com/users/' . rand(1, 10))->json();
            $autobot = Autobot::create([
                'name' => $user['name'],
                'username' => $user['username'],
                'email' => $user['email'],
            ]);

            for ($j = 0; $j < 10; $j++) {
                $post = Http::get('https://jsonplaceholder.typicode.com/posts/' . rand(1, 100))->json();
                $createdPost = $autobot->posts()->create([
                    'title' => $post['title'] . uniqid(),
                    'body' => $post['body'],
                ]);

                for ($k = 0; $k < 10; $k++) {
                    $comment = Http::get('https://jsonplaceholder.typicode.com/comments/' . rand(1, 500))->json();
                    $createdPost->comments()->create([
                        'name' => $comment['name'],
                        'email' => $comment['email'],
                        'body' => $comment['body'],
                    ]);
                }
            }
        }
    }
}
