<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;


class ShowController extends Controller
{
    //tak ka mi napisali v route /tag, eto oznach chto v argum avtomattich tag.
    public function __invoke(Tag $tag)
    {

       return view('admin.tag.show', compact('tag'));

    }

}
