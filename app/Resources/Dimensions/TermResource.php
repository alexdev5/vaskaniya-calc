<?php
namespace App\Resources\Dimensions;

use App\Resources\Acf\AcfTerm;
use App\Resources\JsonResource;

class TermResource extends JsonResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name ?? null,
            'slug' => $this->slug ?? null,
            'description' => $this->description ?? null,
            'acf' => !empty($this->acf)
                ? AcfTerm::collection($this->acf)
                : [],
        ];
    }
}