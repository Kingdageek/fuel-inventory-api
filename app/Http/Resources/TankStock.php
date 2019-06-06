<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TankStock extends JsonResource
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
            'closing_stock' => (float) $this->closing_stock,
            'tank_id' => $this->tank_id,
            'created_at' => $this->created_at->toDayDateTimeString(),
            'updated_at' => $this->updated_at->toDayDateTimeString(),
        ];
    }
}
