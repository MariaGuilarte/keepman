<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResetResource extends JsonResource
{
    public function toArray($request)
    {
      return [
        'id'         => $this->id,
        'date'       => $this->date,
        'counter_id' => $this->counter_id,
        'count'      => $this->count,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at
      ];
      // return parent::toArray($request);
    }
}
