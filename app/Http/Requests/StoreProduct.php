<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = '';
        $required_image = '';
        switch ($this->route()->getName()) {
            case 'admin.products.store':
                $required_image = 'required|';
                break;
            case 'admin.products.update':
                $id = $this->route('product')->id;
        }
        return [
            'title' => 'required|max:255|unique:products,title,' . $id,
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'image' => $required_image . 'image|mimes:jpeg,jpg,bmp,png|max:8192',
        ];
    }
}
