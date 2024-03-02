<?php

namespace App\Contracts;

interface SeederContract
{
    public function createTerms($taxonomyName, $taxonomies);
    public function run();
}