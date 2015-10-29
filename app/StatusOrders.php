<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class StatusOrders extends Model
{
    protected $fillable = ['name'];

    public function order(){
        return $this->belongsTo('CodeCommerce\Order');
    }
}
