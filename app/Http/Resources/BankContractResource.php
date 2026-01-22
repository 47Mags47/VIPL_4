<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BankContractResource extends JsonResource
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
            'number' => $this->number,
            'signed' => $this->signed_at->format('Y-m-d'),
            'template' => [
                'id' => $this->template->id,
                'name' => $this->template->name,
                'chunk' => $this->template->chunk,
            ],
        ];
    }
}
