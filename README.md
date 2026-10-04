# Attributes for the HTTP server

![Continuous Integration](https://github.com/mammatusphp/http-server-attributes/workflows/Continuous%20Integration/badge.svg)
[![Latest Stable Version](https://poser.pugx.org/mammatus/http-server-attributes/v/stable.png)](https://packagist.org/packages/mammatus/http-server-attributes)
[![Total Downloads](https://poser.pugx.org/mammatus/http-server-attributes/downloads.png)](https://packagist.org/packages/mammatus/http-server-attributes/stats)
[![Type Coverage](https://shepherd.dev/github/mammatusphp/http-server-attributes/coverage.svg)](https://shepherd.dev/github/mammatusphp/http-server-attributes)
[![License](https://poser.pugx.org/mammatus/http-server-attributes/license.png)](https://packagist.org/packages/mammatus/http-server-attributes)

PHP 8 attributes for HTTP routes, health probes, vhosts, and WebSocket channels and RPC. Use them on handler classes in apps built with [mammatus/http-server](https://github.com/MammatusPHP/http-server); its Composer plugin reads these attributes when autoload is dumped and generates routing configuration.

# Install

To install via [Composer](http://getcomposer.org/), use the command below, it will automatically detect the latest version and bind it with `^`.

```
composer require mammatus/http-server-attributes
```

# Attributes

This package provides the following attributes:

## Vhost

Class-level, repeatable. Names the virtual host the handler belongs to.

```php
use Mammatus\Http\Server\Attributes\Vhost;

#[Vhost('frontend')]
final readonly class HomePageHandler
{
}
```

## Route

Class- or method-level, repeatable. HTTP method and path pattern. The method is [`HttpMethod`](src/HttpMethod.php) (`HEAD`, `GET`, `POST`, `PUT`, `PATCH`, `DELETE`).

```php
use Mammatus\Http\Server\Attributes\HttpMethod;
use Mammatus\Http\Server\Attributes\Route;

#[Route(HttpMethod::GET, '/ping/{name}')]
final readonly class PingHandler
{
}
```

## Probe

Class-level, repeatable. Marks the handler as a Kubernetes-style probe for Helm integration in the server plugin. The type is [`ProbeType`](src/ProbeType.php): `StartUp`, `Liveness`, or `Readiness`.

```php
use Mammatus\Http\Server\Attributes\HttpMethod;
use Mammatus\Http\Server\Attributes\Probe;
use Mammatus\Http\Server\Attributes\ProbeType;
use Mammatus\Http\Server\Attributes\Route;
use Mammatus\Http\Server\Attributes\Vhost;

#[Vhost('healthz')]
#[Route(HttpMethod::GET, '/probe/liveness')]
#[Probe(ProbeType::Liveness)]
final class LivenessProbeHandler
{
}
```

See [healthz-vhost](https://github.com/MammatusPHP/healthz-vhost) for full probe handlers.

## Bus

Class-level marker with a bus name (successor to [http-server-annotations Bus](https://github.com/MammatusPHP/http-server-annotations/blob/master/src/Bus.php)). Not consumed by [mammatus/http-server](https://github.com/MammatusPHP/http-server) today.

```php
use Mammatus\Http\Server\Attributes\Bus;

#[Bus('domain-events')]
final readonly class OrderPlacedHandler
{
}
```

## WebSocket Channel

Class-level, repeatable. Registers a broadcast channel name and optional payload class; when `payloadClass` is omitted or empty, the annotated class is the payload type.

```php
use Mammatus\Http\Server\Attributes\Vhost;
use Mammatus\Http\Server\Attributes\WebSocket\Channel;

#[Vhost('frontend')]
#[Channel('demo-events')]
final readonly class WebSocketDemoEvent
{
    public function __construct(public string $message)
    {
    }
}
```

With an explicit payload class:

```php
#[Channel('events', 'App\\WebSocket\\EventPayload')]
final readonly class EventBroadcaster
{
}
```

## WebSocket Rpc

Method-level, repeatable. JSON-RPC-style method name on WebSocket handlers. [mammatus/http-server](https://github.com/MammatusPHP/http-server) accepts `(ServerRequestInterface $upgradeRequest)` with a named return type, or `($params, ServerRequestInterface $upgradeRequest)` where `$params` is a user DTO class. See [Collector](https://github.com/MammatusPHP/http-server/blob/master/src/Composer/Collector.php).

```php
use Mammatus\Http\Server\Attributes\Vhost;
use Mammatus\Http\Server\Attributes\WebSocket\Rpc;
use Psr\Http\Message\ServerRequestInterface;

#[Vhost('frontend')]
final readonly class WebSocketPingHandler
{
    #[Rpc('ping')]
    public function ping(WebSocketPingParams $params, ServerRequestInterface $upgradeRequest): WebSocketPingResult
    {
        return new WebSocketPingResult(pong: true, echo: $params->message);
    }
}
```

More examples in the http-server dev app: [PingHandler](https://github.com/MammatusPHP/http-server/blob/master/etc/dev-app/PingHandler.php).

# License

The MIT License (MIT)

Copyright (c) 2026 Cees-Jan Kiewiet

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
