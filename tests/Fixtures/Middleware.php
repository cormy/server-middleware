<?php

namespace Cormy\Server\Fixtures;

use Generator;
use Cormy\Server\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Middleware implements MiddlewareInterface
{
    /**
     * Process an incoming server request and return the response, optionally delegating
     * to the next request handler.
     *
     * @param ServerRequestInterface $request
     *
     * @return Generator yields PSR `ServerRequestInterface` instances and returns a PSR `ResponseInterface` instance
     */
    public function __invoke(ServerRequestInterface $request):Generator
    {
        // delegate $request to the next request handler
        $response = yield $request;

        // mofify the response
        $response = $response->withHeader('X-PoweredBy', 'Unicorns');

        return $response;
    }
}
