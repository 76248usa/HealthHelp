<?php

namespace App;

use App\Category;

use Illuminate\Database\Eloquent\Model;

class Physician extends Model
{
    protected $fillable = [
        'name',

        'credentials',
        'specialization',
        'price',
        'category_id',
        'subcategory_id'
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function subcategory()
    {
        return $this->hasOne(Subcategory::class, 'id', 'subcategory_id');
    }
}
