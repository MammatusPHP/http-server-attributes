<?php

declare(strict_types=1);

namespace Mammatus\Tests\Http\Server\Attributes\WebSocket;

use Mammatus\Http\Server\Attributes\WebSocket\HeartbeatChannel;
use PHPUnit\Framework\Attributes\Test;
use WyriHaximus\TestUtilities\TestCase;

final class HeartbeatChannelTest extends TestCase
{
    #[Test]
    public function storesChannel(): void
    {
        $attribute = new HeartbeatChannel('custom');

        self::assertSame('custom', $attribute->channel);
    }
}
