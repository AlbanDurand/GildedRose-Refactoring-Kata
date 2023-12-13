<?php

declare(strict_types=1);

namespace Tests\Item\Quality\Modifier\Provider;

use GildedRose\Item;
use GildedRose\Item\ItemInfo;
use GildedRose\Item\Quality\Modifier\Provider\ObsoleteProvider;
use PHPUnit\Framework\TestCase;

class ObsoleteProviderTest extends TestCase
{
    public function testCalculatedModifierIsOppositeNumberOfCurrentItemQuality(): void
    {
        $info = new ItemInfo(
            new Item(
                'Sonic screwdriver',
                10,
                2
            )
        );

        $provider = new ObsoleteProvider();

        self::assertEquals(-2, $provider->provideQualityModifierBasedOnItemInfo($info));
    }
}
