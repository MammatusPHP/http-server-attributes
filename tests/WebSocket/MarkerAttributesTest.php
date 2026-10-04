<?php

declare(strict_types=1);

namespace Mammatus\Tests\Http\Server\Attributes\WebSocket;

use Mammatus\Http\Server\Attributes\WebSocket\ServeClientAsset;
use Mammatus\Tests\Http\Server\Attributes\WebSocket\Fixtures\AnnotatedWithServeClientAsset;
use PHPUnit\Framework\Attributes\Test;
use ReflectionClass;
use WyriHaximus\TestUtilities\TestCase;

require_once __DIR__ . '/Fixtures/AnnotatedWithServeClientAsset.php';

final class MarkerAttributesTest extends TestCase
{
    #[Test]
    public function serveClientAssetAttributeOnClass(): void
    {
        $reflection = new ReflectionClass(AnnotatedWithServeClientAsset::class);

        self::assertCount(1, $reflection->getAttributes(ServeClientAsset::class));
    }
}
