<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DispenserSale;

class Dispenser extends Model
{
    protected $fillable = [ 'serial_num', 'num_of_nozzles', 'fuel_type' ];

    public function dispenser_sales()
    {
        return $this->hasMany(DispenserSale::class);
    }
}
