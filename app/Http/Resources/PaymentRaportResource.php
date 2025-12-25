<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentRaportResource extends JsonResource
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
            'event' => [
                'id' => $this->event->id,
                'date' => $this->event->date,
            ],
            'bank-files' => $this->bankFiles->map(fn($file) => [
                'id' => $file->id,
                'bank' => [
                    'id' => $file->bank->id,
                    'name' => $file->bank->name,
                ],
            ])
        ];
    }
}
