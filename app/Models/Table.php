<?php

namespace App\Models;

// warehouse table get data

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
   
    protected $table = 'reserve_table';
    public $timestamps = false;

    public $fillable = ['id','table_id','table_name'];

    
   
}
