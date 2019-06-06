<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DispenserSale extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'sale_volume' => (float) $this->sale_volume,
            'dispenser_id' => $this->dispenser_id,
            'created_at' => $this->created_at->toDayDateTimeString(),
            'updated_at' => $this->updated_at->toDayDateTimeString(),
        ];
    }
}
