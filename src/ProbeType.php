<?php

declare(strict_types=1);

namespace Mammatus\Http\Server\Attributes;

enum ProbeType: string
{
    case StartUp   = 'startup';
    case Liveness    = 'liveness';
    case Readiness  = 'readiness';
}
