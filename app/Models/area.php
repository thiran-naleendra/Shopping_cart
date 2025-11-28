<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'area';
    public $fillable = ['id','area_id', 'area_name'];
}
