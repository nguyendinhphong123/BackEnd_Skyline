<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data= parent::toArray($request);
       $data['user_count'] = number_format($this->users()->count());
       $data['role_count'] = number_format($this->roles()->count());
       $data['roles'] = $this->roles;
       $data['users'] = $this->users;
        return $data;
    }
}
