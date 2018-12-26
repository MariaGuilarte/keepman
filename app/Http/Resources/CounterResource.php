<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CounterResource extends JsonResource
{
    public function toArray($request)
    {
      return [
        'id' => $this->id,
        'title' => $this->title,
        'color' => $this->color,
        'start_date' => $this->start_date,
        'status' => $this->status,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
        'user' => new UserResource($this->user),
        'resets' => ResetResource::collection($this->resets)
      ];
      
      // return parent::toArray($request);
    }
}
