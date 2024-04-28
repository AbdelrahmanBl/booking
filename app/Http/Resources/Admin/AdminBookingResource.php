<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminBookingResource extends JsonResource
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
            'client' => $this->whenLoaded('user', fn() => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ]),
            'room' => $this->whenLoaded('room', fn() => [
                'id' => $this->room->id,
                'name' => $this->room->name,
                'type' => $this->room->type,
                'type_text' => $this->room->type_text,
                'status' => $this->room->status,
                'status_text' => $this->room->status_text,
            ]),
            'status' => $this->status,
            'status_text' => $this->status_text,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
