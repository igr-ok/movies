<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        //poluchaem posti obrashayas k modeli post
        $posts = Post::paginate(25);

        //idet sql zapros ispolz metod get na vihode obrz collection(anakjg massivov) i primenaetsa metod random
        $randomPosts = Post::get()->random(4);
        return view('post.index', compact('posts', 'randomPosts'));
        //teper idem v index.blade

    }

}
