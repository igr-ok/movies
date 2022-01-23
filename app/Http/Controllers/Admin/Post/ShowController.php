<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;


class ShowController extends BaseController
{
    //tak ka mi napisali v route /category, eto oznach chto v argum avtomattich categ.
    public function __invoke(Post $post)
    {

       return view('admin.post.show', compact('post'));

    }

}
