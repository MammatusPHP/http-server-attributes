<?php

declare(strict_types=1);

namespace Mammatus\Tests\Http\Server\Attributes;

use Mammatus\Http\Server\Attributes\HttpMethod;
use Mammatus\Http\Server\Attributes\Route;
use PHPUnit\Framework\Attributes\Test;
use WyriHaximus\TestUtilities\TestCase;

final class RouteTest extends TestCase
{
    #[Test]
    public function matchesValue(): void
    {
        $method = HttpMethod::GET;
        $path   = '/';

        $route = new Route($method, $path);

        self::assertSame($method->value, $route->httpMethod->value);
        self::assertSame($path, $route->path);
    }
}
