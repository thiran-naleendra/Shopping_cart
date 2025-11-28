<?php

namespace App\Models;

// warehouse table get data

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
   
    protected $table = 'sales';
    public $timestamps = false;

    public $fillable = ['id','user_id','user_name','item_name','qty','price','status' ,'created_at'];

    public function updateStatus($status)
    {
        $this->status = $status;
        $this->save();
    }
   
}
