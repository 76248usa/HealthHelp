<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'subcategory_id'
    ];

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
}
