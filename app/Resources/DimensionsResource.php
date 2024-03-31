<?php
namespace App\Resources;

class DimensionsResource extends JsonResource
{
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'acf' => [
                'thumbnail' => !empty($this->acf) && !empty($this->acf->thumbnail)
                    ? AcfImageTerm::collection($this->acf->thumbnail)
                    : [],
                'related_image' => !empty($this->acf) && !empty($this->acf->related_image)
                    ? AcfImageTerm::collection($this->acf->related_image)
                    : [],
                'price' => $this->acf->price,
                'is_hidden' => $this->acf->is_hidden,
            ]
        ];
    }
}