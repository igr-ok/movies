<?php

namespace App\Service;

use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data){
        try {
            Db::beginTransaction();
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

            $tagIds = $data['tag_ids'];
            //teper vse unichtoj iz etogo massiva
            unset($data['tag_ids']);

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }


            //dd($data);
//        delaem tak kak vishe, chtobi sokhraninlis atrib kak v baze i chtob polojit $data
            //category toje popadaet v datu
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }

    }

    public function update($data, $post)
    {
        try {

            $tagIds = $data['tag_ids'];
            //teper vse unichtoj iz etogo massiva
            unset($data['tag_ids']);

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            //metod sync udalaet vse privazki kotorie est u posta s tegami i dobavlaet tolko te kotorie zdes ukazali
            $post->update($data);
            $post->tags()->sync($tagIds);
            DB::commit();
        } catch (Exception $exception){
            DB::rollBack();
            abort(500);
        }
        return $post;

    }

}
