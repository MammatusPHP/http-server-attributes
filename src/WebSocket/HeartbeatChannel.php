<?php

declare(strict_types=1);

namespace Mammatus\Http\Server\Attributes\WebSocket;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
final readonly class HeartbeatChannel
{
    public function __construct(
        public string $channel,
    ) {
    }
}
