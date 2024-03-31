<?php

namespace App\Resources\Acf;
use App\Resources\JsonResource;

class AcfTerm extends JsonResource
{
    public function toArray(): array
    {
        return [
            'thumbnail' => !empty($this->thumbnail)
                ? AcfImageTerm::collection($this->thumbnail)
                : [],
            'related_image' => !empty($this->related_image)
                ? AcfImageTerm::collection($this->related_image)
                : [],
            'price' => $this->price ?? null,
            'is_hidden' => $this->is_hidden ?? null,
        ];
    }
}