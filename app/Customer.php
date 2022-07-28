<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'email', 'address', 'phone', 'ticket'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'customer_id');
    }
}
