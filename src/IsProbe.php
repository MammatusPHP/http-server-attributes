<?php

declare(strict_types=1);

namespace Mammatus\Http\Server\Attributes;

use Attribute;

/** @internal Internal use only, will break things */
#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
final readonly class IsProbe
{
    public function __construct(
        public ProbeType $type,
    ) {
    }
}
