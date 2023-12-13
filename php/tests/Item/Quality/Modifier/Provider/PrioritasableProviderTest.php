<?php

declare(strict_types=1);

namespace Tests\Item\Quality\Modifier\Provider;

use GildedRose\Item;
use GildedRose\Item\ItemInfo;
use GildedRose\Item\Quality\Modifier\Provider\FixedProvider;
use GildedRose\Item\Quality\Modifier\Provider\PrioritasableProvider;
use GildedRose\Item\Specification\NonExpiredSpecification;
use GildedRose\Item\Specification\ExpiredSpecification;
use PHPUnit\Framework\TestCase;

class PrioritasableProviderTest extends TestCase
{
    public function testCurrentProviderIsExecutedWhenSpecificationIsSatisfied(): void
    {
        $provider = new PrioritasableProvider(
            new NonExpiredSpecification(),
            new FixedProvider(1),
            new FixedProvider(2)
        );

        $info = new ItemInfo(
            new Item(
                'Sonic screwdriver',
                10,
                2
            )
        );

        self::assertEquals(1, $provider->provideQualityModifierBasedOnItemInfo($info));
    }

    public function testNextProviderIsExecutedWhenSpecificationIsNotSatisfied(): void
    {
        $provider = new PrioritasableProvider(
            new ExpiredSpecification(),
            new FixedProvider(1),
            new FixedProvider(2)
        );

        $info = new ItemInfo(
            new Item(
                'Sonic screwdriver',
                10,
                2
            )
        );

        self::assertEquals(2, $provider->provideQualityModifierBasedOnItemInfo($info));
    }
}
