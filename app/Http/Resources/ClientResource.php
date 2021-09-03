<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class ClientResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->getKey(),
            'name' => $this->client_name,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'zipCode' => $this->zip,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'phoneNo1' => $this->phone_no1,
            'phoneNo2' => $this->phone_no2,
            'totalUser' => $this->getTotalUser(),
            'startValidity' => $this->start_validity,
            'endValidity' => $this->end_validity,
            'status' => $this->status,
            'createdAt' => $this->created_at,
            'updateAt' => $this->updated_at,
        ];
    }

    public function getTotalUser()
    {
        if (!$this->users) {
            return [
                'all' => 0,
                'active' => 0,
                'inactive' => 0,
            ];
        }

        $active = Arr::get($this->users, 'Active', 0);
        $inactive = Arr::get($this->users, 'Inactive', 0);

        return [
            'all' => $active + $inactive,
            'active' => $active,
            'inactive' => $inactive,
        ];
    }
}
