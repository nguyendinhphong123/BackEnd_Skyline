<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       $data= parent::toArray($request);
       $data['room_count'] = number_format($this->rooms()->count());
       $data['image'] = 'http://127.0.0.1:8000' . $this->image;
        return $data;
    }
}
