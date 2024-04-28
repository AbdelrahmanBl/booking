<?php

namespace App\Http\Resources\Client;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientBookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'booking_number' => $this->booking_number,
            'room' => $this->whenLoaded('room', fn() => [
                'image' => $this->room->image,
                'name' => $this->room->name,
                'type' => $this->room->type,
                'type_text' => $this->room->type_text,
            ]),
            'status' => $this->status,
            'status_text' => $this->status_text,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
