<?php

declare(strict_types=1);

namespace Mammatus\Tests\Http\Server\Attributes;

use Mammatus\Http\Server\Attributes\Bus;
use PHPUnit\Framework\Attributes\Test;
use WyriHaximus\TestUtilities\TestCase;

final class BusTest extends TestCase
{
    #[Test]
    public function matchesValue(): void
    {
        $busName = 'health';

        $bus = new Bus($busName);

        self::assertSame($busName, $bus->bus);
    }
}
