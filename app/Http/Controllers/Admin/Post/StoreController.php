<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated(); //data ranshe bila na 6 strok nije - eto obrabotka eto zona http

        $this->service->store($data);

        return redirect()->route('admin.post.index');

    }

}
