<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LockerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'cell_name' => $this['cell_name'],
            'status_id' => $this['status_id'],
            'status_name' => $this['status_name'],
            'status_color' => $this['status_color'],
            'period' => $this['period'],
        ];
    }
}
