<?php

declare(strict_types=1);

namespace Mammatus\Tests\Http\Server\Attributes;

use Mammatus\Http\Server\Attributes\Probe;
use Mammatus\Http\Server\Attributes\ProbeType;
use PHPUnit\Framework\Attributes\Test;
use WyriHaximus\TestUtilities\TestCase;

final class ProbeTest extends TestCase
{
    #[Test]
    public function matchesValue(): void
    {
        $type = ProbeType::StartUp;

        $route = new Probe($type);

        self::assertSame($type, $route->type);
    }
}
