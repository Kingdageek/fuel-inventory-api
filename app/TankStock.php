<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tank;

class TankStock extends Model
{
    protected $fillable = [ 'closing_stock' ];

    public function tank()
    {
        return $this->belongsTo(Tank::class);
    }
}
