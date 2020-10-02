<?php

namespace App;

use App\Category;
use App\Subcategory;

use Illuminate\Database\Eloquent\Model;

class Physician extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'address',
        'info',
        'credentials',
        'specialization',
        'price',
        'image',
        'category_id',
        'subcategory_id'
    ];

    public function category()
    {
        //return $this->hasOne(Category::class, 'id', 'category_id');
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function subcategory()
    {
        return $this->hasOne(Subcategory::class, 'id', 'subcategory_id');
    }
}
