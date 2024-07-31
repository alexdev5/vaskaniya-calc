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
            'price' => isset($this->price) ? (int)$this->{TermsAcfEnum::Price} : null,
            'childBlockTitle' => $this->{TermsAcfEnum::ChildBlockTitle} ?? null,
            'childBlockNumber' => $this->{TermsAcfEnum::ChildBlockNumber} ?? null,
            'blockTitle' => $this->{TermsAcfEnum::BlockTitle} ?? null,
            'blockNumber' => $this->{TermsAcfEnum::BlockNumber} ?? null,
            'isVisible' => $this->{TermsAcfEnum::IsVisible} ?? null,
            'sortIndex' => $this->{TermsAcfEnum::SortIndex} ?? null,
        ];
    }
}