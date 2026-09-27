<?php

declare(strict_types=1);

namespace Mammatus\Http\Server\Attributes\WebSocket;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
final readonly class Rpc
{
    public function __construct(
        public string $method,
    ) {
    }
}
