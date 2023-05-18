<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
        $data['total_format'] = number_format($this->total);
        $data['room_name']  = $this->room->name ?? '';
        $data['customer_name']  = $this->customer->name ?? '';
        return $data;
    }
}
