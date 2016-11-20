<?php

namespace Cormy\Server;

use Generator;
use Psr\Http\Message\ServerRequestInterface;

interface MiddlewareInterface
{
    /**
     * Process an incoming server request and return the response, optionally delegating
     * to the next request handler.
     *
     * @param ServerRequestInterface $request
     *
     * @return Generator yields PSR `ServerRequestInterface` instances and returns a PSR `ResponseInterface` instance
     */
    public function __invoke(ServerRequestInterface $request):Generator;
}
