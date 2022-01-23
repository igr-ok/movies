<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        //dla filtra mojno pribavit k posts skobki()->filter() sm ur 38 blog(13min) ili 30 baza
        $posts = $category->posts()->paginate(3);
        return view('category.post.index', compact('posts'));


    }

}
