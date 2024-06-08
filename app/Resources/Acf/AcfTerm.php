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
            'price' => isset($this->price) ? (int) $this->{TermsAcfEnum::Price} : null,
            'childBlockTitle' => isset($this->{TermsAcfEnum::ChildBlockTitle}) ?? null,
            'childBlockNumber' => isset($this->{TermsAcfEnum::ChildBlockNumber}) ?? null,
            'blockTitle' => isset($this->{TermsAcfEnum::BlockTitle}) ?? null,
            'blockNumber' => isset($this->{TermsAcfEnum::BlockNumber}) ?? null,
            'isHidden' => $this->{TermsAcfEnum::IsHidden} ?? null,
        ];
    }
}