<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        //!!!1)obrabativaem zapros
        $data = $request->validated();
        //!!!2)potom vzaimod s bazoy
        $post = $this->service->update($data, $post);
        //prover prihodit chto to ili net - teper mojno ukaz v form action v createblade

        //posle storrequest idem suda dd($data) dla otladki
        //dd($data);
        //eto dla bazi esli po pervomu massivu ne nahodit deistvuet po vtoromu esli net dop atrib obhodimsa odnim massivom
        // mojno prosto firstOrCreate($data);
        //Post::firstOrCreate([ 'title' => $data['title']]); bilo tak

//        dla diagnostiki bilo tak
//        $previewImage = $data['preview_image'];
//        $mainImage = $data['main_image'];
//        $previewImagePath = Storage::put('/images', $previewImage );
        //dd($previewImagePath); pokajet put`

        //!!!3)poluchaem na vihode svejiy post i peredaem otvet
       return view('admin.post.show', compact('post'));
       //!!4)idem smotret v storecontroller tam toje samoe

    }

}
