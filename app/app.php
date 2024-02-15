<?php
use App\Controllers\Admin\PostTypeController;
use App\Controllers\Admin\TagsController;

(new PostTypeController())->init();
(new TagsController())->init();
