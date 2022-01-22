<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        //prover prihodit chto to ili net - teper mojno ukaz v form acrion v createblade
        $data = $request->validated();
        //eto dla bazi esli po pervomu massivu ne nahodit deistvuet po vtoromu esli net dop atrib obhodimsa odnim massivom
        // mojno prosto firstOrCreate($data);
        Category::firstOrCreate([ 'title' => $data['title']]);

       return redirect()->route('admin.category.index');

    }

}
