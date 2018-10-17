<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public static function createNew($data)
    {
        $customer = new static();

        $customer->first_name = $data['first_name'];
        $customer->last_name = $data['last_name'];
        $customer->email = $data['email'];

        $customer->save();

        return $customer;
    }
}
