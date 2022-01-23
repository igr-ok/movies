<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest; //nado pereopredelit - prihodit ot kategoriy
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        //vipolnaetsa rabota vzaimod s bazoy i ----
        //pishu posle updatecontroller
        //!!5)obrabativaem zapros
        $data = $request->validated(); //data ranshe bila na 6 strok nije - eto obrabotka eto zona http
        //eto dobavili dla basecontrollera
        //!!6)proish vzaim s bazoy
        $this->service->store($data);
        //zavorachivaem v tranzakciu vse chto delali s privyazkoy tegov i ne tolko

        //---i perehodim na admin.post.index
        //!!7)vozvr otvet
        return redirect()->route('admin.post.index');

    }

}
