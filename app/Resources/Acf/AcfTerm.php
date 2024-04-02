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
                : null,
            'relatedImage' => !empty($this->related_image)
                ? AcfImageTerm::collection($this->related_image)
                : null,
            'price' => isset($this->price) ? (int) $this->price : null,
            'relatedTitle' => isset($this->related_title) ?? null,
            'isHidden' => $this->is_hidden ?? null,
        ];
    }
}