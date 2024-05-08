<?php
use App\Api\DimensionsApi;
use App\Api\MediaApi;
use App\Api\TermApi;

// TODO: need auth
DimensionsApi::register();
TermApi::register();
MediaApi::register();