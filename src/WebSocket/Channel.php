<?php

declare(strict_types=1);

namespace Mammatus\Http\Server\Attributes\WebSocket;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
final readonly class Channel
{
    public function __construct(
        public string $channel,
        public string $payloadClass,
    ) {
    }
}
