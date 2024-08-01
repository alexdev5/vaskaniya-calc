<?php

namespace App\Config;

class PostTypeEnum
{
    const Products = 'vs-products';
    const Palette = 'vs-products-palette'; // палитра
    const Addons = 'vs-products-addons';
    const Services = 'vs-products-services';

    private function __construct()
    {
    }
}