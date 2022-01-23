<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;


class CreateController extends Controller
{
    public function __invoke()
    {
        //dobavlaem vozm davat postam categorii
        $categories = Category::all();

        //chtobi v create.blade prihodili realn tegi pishem nije eto
        $tags = Tag::all();

       return view('admin.post.create', compact('categories', 'tags'));
       //teper idem delaem foreach v create.blade

    }

}
