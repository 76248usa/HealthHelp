<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'name', 'category_id', 'physician_id'
    ];

    public function category()
    {
        //return $this->belongsTo('App\Category');
        return $this->belongsTo(Category::class);
    }
}
