<?php

namespace App\Resources\Posts;

use App\Resources\JsonResource;

class PostImageResource extends JsonResource
{

    public function toArray(): array
    {
        return [
            'id' => $this->ID,
            'title' => $this->post_title ?? null,
            'name' => $this->post_name ?? null,
            'fullName' => $this->post_name ?? null,
            'modified' => $this->post_modified ?? null,
            'date' => $this->post_date ?? null,
            'url' => $this->url ?? null,
        ];
    }
}