<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        posle sozd menyaem na true, inache ne zarab
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //tipa facecontrol //chtobi iz summernote v adminke vse doshlo do kontrollera pishem zdes
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',

            //prishli dobavlat nignuu striku posle dobavlenia v blade foreach dla categoriy
            //posle strelki eto pravila kriterii dla prihodashhego shtob proshla validaciya
            //proverka budet v tablice categories
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
            //teper idem v storcontroller
        ];
    }
}
