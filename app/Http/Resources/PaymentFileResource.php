<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentFileResource extends JsonResource
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
            'file_id' => $this->file_id,
            'bank_id' => $this->bank_id,
            'event_id' => $this->event_id,

            'disk' => $this->file->disk,
            'path' => $this->file->path,
            'name' => $this->file->name,
            'origin_name' => $this->file->origin_name,
        ];
    }
}
