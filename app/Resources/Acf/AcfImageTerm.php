<?php

namespace App\Resources\Acf;

use App\Resources\JsonResource;

class AcfImageTerm extends JsonResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'url' => $this->url ?? '',
            'name' => $this->name ?? '',
            'modified' => $this->modified ?? '',
            'icon' => $this->icon ?? '',
        ];
    }
}