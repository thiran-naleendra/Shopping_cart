<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    public $fillable = [ 'id', 'name', 'code', 'category_id', 'price', 'description','qty','image'];


    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }


}



