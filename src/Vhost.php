<?php

declare(strict_types=1);

namespace Mammatus\Http\Server\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
final readonly class Vhost
{
    public function __construct(public string $vhost)
    {
    }
}
