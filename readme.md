# Cormy\Server\MiddlewareInterface [![Build Status](https://travis-ci.org/cormy/server-middleware.svg?branch=master)](https://travis-ci.org/cormy/server-middleware)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/db7c420b-980e-4b03-8639-be2ad3af136c/big.png)](https://insight.sensiolabs.com/projects/db7c420b-980e-4b03-8639-be2ad3af136c)

> Common interfaces for Cormy [PSR-7](http://www.php-fig.org/psr/psr-7) server middlewares


## Install

```
composer require cormy/server-middleware
```


## Usage

```php
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
```


## License

MIT © [Michael Mayer](http://schnittstabil.de)
