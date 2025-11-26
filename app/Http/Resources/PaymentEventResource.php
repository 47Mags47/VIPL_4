<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentEventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'date' => $this->date->format('Y-m-d'),
            'payment' => [
                'code' => $this->payment->code,
                'name' => $this->payment->name,
                'kbk' => $this->payment->kbk,
            ]
        ];
    }
}
