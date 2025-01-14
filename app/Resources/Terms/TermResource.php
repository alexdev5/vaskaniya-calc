<?php

namespace App\Resources\Terms;

use App\Resources\Acf\AcfTerm;
use App\Resources\JsonResource;

class TermResource extends JsonResource
{
    public function toArray(): array
    {
        $result = [
            'id' => $this->id ?? $this->term_id ?? null,
            'title' => $this->name ?? null,
            'slug' => $this->slug ?? null,
            'taxonomy' => $this->taxonomy ?? null,
            'description' => $this->description ?? null,
            'acf' => !empty($this->acf)
                ? AcfTerm::collection($this->acf)
                : [],
        ];

        if (!empty($this->children)) {
            $result['children'] = self::collection($this->children);
        }

        return $result;
    }
}