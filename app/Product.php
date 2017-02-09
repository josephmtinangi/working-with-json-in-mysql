<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'attributes'];
    protected $cast = [
    	'attributes' => 'array'
    ];

    public function brand()
    {
    	return $this->belongsTo(Brand::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
