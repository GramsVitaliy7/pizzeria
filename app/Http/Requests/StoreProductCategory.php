<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductCategory extends FormRequest
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
        if ($this->route()->getName() == 'admin.product_categories.update') {
            $id = $this->route('permission')->id;
        }
        return [
            'name' => 'required|max:255|unique:product_categories,name,' . $id,
        ];
    }
}
