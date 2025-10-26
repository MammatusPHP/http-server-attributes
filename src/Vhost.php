<?php

declare(strict_types=1);

namespace Mammatus\Http\Server\Attributes;

use Attribute;

#[Attribute]
final readonly class Vhost
{
    public function __construct(public string $vhost)
    {
    }
}
