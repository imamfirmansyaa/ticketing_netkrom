<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['customer_id', 'code', 'checkin'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
