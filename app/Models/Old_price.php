<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class old_price extends Model
{
    protected $table = 'old_price';
    public $fillable = [ 'id', 'menu_id', 'old_price'];


    public function menu()
    {
        return $this->belongsTo('App\Models\Menu', 'menu_id', 'id');
    }



}
