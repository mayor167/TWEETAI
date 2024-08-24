<?php
namespace App\Http\Controllers;

use App\Models\Autobot;
use App\Models\Post;
use Illuminate\Http\Request;

class AutobotController extends Controller
{
    public function index()
    {
        return Autobot::paginate(10);
    }

    
    public function posts(Autobot $autobot)
    {
        return $autobot->posts()->paginate(10);
    }

   
    public function comments(Post $post)
    {
        return $post->comments()->paginate(10);
    }
    public function count()
    {
        $count = Autobot::count();
        return response()->json(['count' => $count]);
    }
}
