<?php

namespace App\Resources\Acf;

use App\Resources\JsonResource;

class AcfImageTerm extends JsonResource
{
    public function toArray(): array
    {
        $pathArray = explode('/', $this->url ?? '');

        return [
            'id' => $this->id,
            'url' => $this->url ?? '',
            'name' => $this->name ?? '',
            'fullName' => $pathArray[count($pathArray) - 1],
            'modified' => $this->modified ?? '',
            'icon' => $this->icon ?? '',
        ];
    }
}