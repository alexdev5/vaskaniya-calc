<?php

namespace App\Resources\Acf;
use App\Controllers\Terms\TermsAcfEnum;
use App\Resources\JsonResource;

class AcfTerm extends JsonResource
{
    public function toArray(): array
    {
        return [
            'thumbnail' => !empty($this->{TermsAcfEnum::Thumbnail})
                ? AcfImageTerm::collection($this->{TermsAcfEnum::Thumbnail})
                : null,
            'relatedImage' => !empty($this->{TermsAcfEnum::RelatedImage})
                ? AcfImageTerm::collection($this->{TermsAcfEnum::RelatedImage})
                : null,
            'imageFullSize' => !empty($this->{TermsAcfEnum::ImageFullSize})
                ? AcfImageTerm::collection($this->{TermsAcfEnum::ImageFullSize})
                : null,
            'price' => isset($this->price) ? (int) $this->{TermsAcfEnum::Price} : null,
            'relatedTitle' => isset($this->{TermsAcfEnum::RelatedTitle}) ?? null,
            'isHidden' => $this->{TermsAcfEnum::IsHidden} ?? null,
        ];
    }
}