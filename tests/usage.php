#!/usr/bin/env php
<?php

namespace Cormy;

require __DIR__.'/../vendor/autoload.php';

use Cormy\Server\Fixtures\Middleware;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;

$sut = new Middleware();
$generator = $sut(new ServerRequest());

while ($generator->valid()) {
    $generator->send(new Response());
}

$response = $generator->getReturn();

exit($response->getHeader('X-PoweredBy')[0] === 'Unicorns' ? 0 : 1);
