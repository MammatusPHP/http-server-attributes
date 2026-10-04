<?php

declare(strict_types=1);

namespace Mammatus\Tests\Http\Server\Attributes\WebSocket;

use Mammatus\Http\Server\Attributes\WebSocket\HeartbeatInterval;
use PHPUnit\Framework\Attributes\Test;
use WyriHaximus\TestUtilities\TestCase;

final class HeartbeatIntervalTest extends TestCase
{
    #[Test]
    public function storesOptions(): void
    {
        $attribute = new HeartbeatInterval(enabled: false, seconds: 9.0);

        self::assertFalse($attribute->enabled);
        self::assertSame(9.0, $attribute->seconds);
    }
}
