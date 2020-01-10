<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'title', 'price', 'image_name', 'description'];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'id');
    }

    public function setImageName()
    {
        $image = request()->file('image');
        $imageName = 'product-image-' . time() . '.' . $image->getClientOriginalExtension();
        $this->image_name = $imageName;
    }
}
