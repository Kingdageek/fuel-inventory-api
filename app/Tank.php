<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TankStock;

class Tank extends Model
{
    protected $fillable = [
        'serial_num', 'capacity', 'fuel_type'
    ];

    public function tank_stocks()
    {
        return $this->hasMany(TankStock::class);
    }
}
