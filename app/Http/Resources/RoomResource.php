<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        $data['price_format'] = number_format($this->price);
        $data['category_name']  = $this->category->name ?? '';
        $data['image'] = 'http://127.0.0.1:8000' . $this->image;
        return $data;
    }
}
