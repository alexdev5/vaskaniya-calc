<?php

namespace App\Resources\Dimensions;

use App\Resources\JsonResource;

class DimensionsResource extends JsonResource
{
    public function toArray(): array
    {
        return array_merge(
            DimensionsSimpleResource::collection($this),
            [
                'children' => !empty($this->children)
                    ? DimensionsSimpleResource::collection($this->children)
                    : [],
            ]
        );
    }
}