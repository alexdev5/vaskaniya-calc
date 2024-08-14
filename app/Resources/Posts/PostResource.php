<?php

namespace App\Resources\Posts;

use App\Resources\JsonResource;

class PostResource extends JsonResource
{

    public function toArray(): array
    {
        return [
            'id' => $this->ID,
            'title' => $this->post_title ?? null,
            'name' => $this->post_name ?? null,
            'postType' => $this->post_type,
            'taxonomies' => $this->taxonomies ?? [],
            'excerpt' => $this->excerpt ?? null,
            'modified' => $this->post_modified ?? null,
            'modifiedGmt' => $this->post_modified_gmt ?? null,
            'content' => $this->content ?? null,
            'thumbnail' => !empty($this->thumbnail)
                ? PostImageResource::collection($this->thumbnail)
                : null,
            'acf' => $this->acf ? $this->acf : null,
        ];
    }
}