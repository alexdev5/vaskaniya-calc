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
            'childBlockImage' => !empty($this->{TermsAcfEnum::ChildBlockImage})
                ? AcfImageTerm::collection($this->{TermsAcfEnum::ChildBlockImage})
                : null,
            'imageFullSize' => !empty($this->{TermsAcfEnum::ImageFullSize})
                ? AcfImageTerm::collection($this->{TermsAcfEnum::ImageFullSize})
                : null,
            'thumbnailActive' => !empty($this->{TermsAcfEnum::ThumbnailActive})
                ? AcfImageTerm::collection($this->{TermsAcfEnum::ThumbnailActive})
                : null,
            'price' => isset($this->price) ? (int)$this->{TermsAcfEnum::Price} : null,
            'name' => isset($this->name) ? $this->{TermsAcfEnum::Name} : null,
            'lastChildBlockNumber' => $this->{TermsAcfEnum::LastChildBlockNumber} ?? null,
            'lastChildBlockTitle' => $this->{TermsAcfEnum::LastChildBlockTitle} ?? null,
            'lastChildBlockInfo' => $this->{TermsAcfEnum::LastChildBlockInfo} ?? null,
            'blockTitle' => $this->{TermsAcfEnum::BlockTitle} ?? null,
            'blockNumber' => $this->{TermsAcfEnum::BlockNumber} ?? null,
            'blockInfo' => $this->{TermsAcfEnum::BlockInfo} ?? null,
            'isHidden' => $this->{TermsAcfEnum::IsHidden} ?? null
        ];
    }
}