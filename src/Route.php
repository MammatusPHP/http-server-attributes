<?php

declare(strict_types=1);

namespace Mammatus\Http\Server\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
final readonly class Route
{
    public function __construct(
        public HttpMethod $httpMethod,
        public string $path,
    ) {
    }
}
