<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;


class ShowController extends Controller
{
    //tak ka mi napisali v route /category, eto oznach chto v argum avtomattich categ.
    public function __invoke(Category $category)
    {

       return view('admin.categories.show', compact('category'));

    }

}
