<?php

declare(strict_types=1);

namespace Mammatus\Tests\Http\Server\Attributes\WebSocket;

use Mammatus\Http\Server\Attributes\WebSocket\Rpc;
use PHPUnit\Framework\Attributes\Test;
use WyriHaximus\TestUtilities\TestCase;

final class RpcTest extends TestCase
{
    #[Test]
    public function storesMethodName(): void
    {
        $rpc = new Rpc('ping');

        self::assertSame('ping', $rpc->method);
    }
}
