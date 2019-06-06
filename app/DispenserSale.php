<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Dispenser;

class DispenserSale extends Model
{
    protected $fillable = [ 'sale_volume' ];

    public function dispenser()
    {
        return $this->belongsTo(Dispenser::class);
    }
}
