<?php

require 'vendor/autoload.php';
require 'core/Bootstarp.php';

use App\Core\{Router, Request};

Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());