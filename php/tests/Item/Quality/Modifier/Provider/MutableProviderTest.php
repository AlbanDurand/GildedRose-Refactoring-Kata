<?php

declare(strict_types=1);

namespace Tests\Item\Quality\Modifier\Provider;

use GildedRose\Item;
use GildedRose\Item\ItemInfo;
use GildedRose\Item\Quality\Modifier\Mutator\MultiplicableMutator;
use GildedRose\Item\Quality\Modifier\Provider\FixedProvider;
use GildedRose\Item\Quality\Modifier\Provider\MutableProvider;
use PHPUnit\Framework\TestCase;

class MutableProviderTest extends TestCase
{
    public function testProvidedModifierIsMutated(): void
    {
        $info = new ItemInfo(
            new Item(
                'Sonic screwdriver',
                10,
                2
            )
        );

        $provider = new MutableProvider(
            new MultiplicableMutator(4),
            new FixedProvider(2)
        );

        self::assertEquals(8, $provider->provideQualityModifierBasedOnItemInfo($info));
    }
}
