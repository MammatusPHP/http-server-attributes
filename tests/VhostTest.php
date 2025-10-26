<?php

declare(strict_types=1);

namespace Mammatus\Tests\Http\Server\Attributes;

use Mammatus\Http\Server\Attributes\Vhost;
use PHPUnit\Framework\Attributes\Test;
use WyriHaximus\TestUtilities\TestCase;

final class VhostTest extends TestCase
{
    #[Test]
    public function matchesValue(): void
    {
        $vhostName = 'health';

        $vhost = new Vhost($vhostName);

        self::assertSame($vhostName, $vhost->vhost);
    }
}
