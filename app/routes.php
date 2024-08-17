<?php

use App\Api\DimensionsApi;
use App\Api\EdgeApi;
use App\Api\MediaApi;
use App\Api\PostApi;
use App\Api\TermApi;

// TODO: need auth
DimensionsApi::register();
TermApi::register();
MediaApi::register();
PostApi::register();
EdgeApi::register();