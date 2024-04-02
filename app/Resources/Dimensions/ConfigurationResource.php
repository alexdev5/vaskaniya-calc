<?php
namespace App\Resources\Dimensions;

use App\Resources\Acf\AcfTerm;
use App\Resources\JsonResource;

class ConfigurationResource extends JsonResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'productTypeParentId' => (int) $this->productTypeParentId,
            'name' => $this->name ?? null,
            'slug' => $this->slug ?? null,
            'description' => $this->description ?? null,
            'acf' => !empty($this->acf)
                ? AcfTerm::collection($this->acf)
                : [],
        ];
    }
}