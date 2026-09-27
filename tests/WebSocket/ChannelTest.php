<?php

declare(strict_types=1);

namespace Mammatus\Tests\Http\Server\Attributes\WebSocket;

use Mammatus\Http\Server\Attributes\WebSocket\Channel;
use PHPUnit\Framework\Attributes\Test;
use WyriHaximus\TestUtilities\TestCase;

final class ChannelTest extends TestCase
{
    #[Test]
    public function storesPayloadClass(): void
    {
        $channel = new Channel('events', 'Mammatus\\Example\\Event');

        self::assertSame('events', $channel->channel);
        self::assertSame('Mammatus\\Example\\Event', $channel->payloadClass);
    }
}
