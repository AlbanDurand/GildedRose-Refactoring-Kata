<?php

declare(strict_types=1);

namespace Tests\Item\Quality\Modifier\Provider;

use GildedRose\Item;
use GildedRose\Item\ItemInfo;
use GildedRose\Item\Quality\Modifier\Provider\FixedProvider;
use PHPUnit\Framework\TestCase;

class FixedProviderTest extends TestCase
{
    public function testProvidedModifierIsUnchanged(): void
    {
        $modifier = random_int(-1_000_000, 1_000_000);
        $provider = new FixedProvider($modifier);
        $info = new ItemInfo(
            new Item(
                'Sonic screwdriver',
                10,
                2
            )
        );

        self::assertEquals(
            $modifier,
            $provider->provideQualityModifierBasedOnItemInfo($info)
        );
    }
}
