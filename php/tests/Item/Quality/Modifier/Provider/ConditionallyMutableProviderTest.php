<?php

declare(strict_types=1);

namespace Tests\Item\Quality\Modifier\Provider;

use GildedRose\Item;
use GildedRose\Item\ItemInfo;
use GildedRose\Item\Quality\Modifier\Provider\ConditionallyMutableProvider;
use GildedRose\Item\Quality\Modifier\Provider\FixedProvider;
use GildedRose\Item\Quality\Modifier\Mutator\MultiplicableMutator;
use GildedRose\Item\Specification\NonExpiredSpecification;
use GildedRose\Item\Specification\ExpiredSpecification;
use PHPUnit\Framework\TestCase;

class ConditionallyMutableCalculcatorTest extends TestCase
{
    public function testProvidedModifierIsMutatedWhenSpecificationIsSatisfied(): void
    {
        $info = new ItemInfo(
            new Item(
                'Sonic screwdriver',
                10,
                2
            )
        );

        $provider = new ConditionallyMutableProvider(
            new NonExpiredSpecification(),
            new MultiplicableMutator(2),
            new FixedProvider(1)
        );

        self::assertEquals(2, $provider->provideQualityModifierBasedOnItemInfo($info));
    }

    public function testProvidedModifierIsUnchangedWhenSpecificationIsNotSatisfied(): void
    {
        $info = new ItemInfo(
            new Item(
                'Sonic screwdriver',
                10,
                2
            )
        );

        $provider = new ConditionallyMutableProvider(
            new ExpiredSpecification(),
            new MultiplicableMutator(-2),
            new FixedProvider(1)
        );

        self::assertEquals(1, $provider->provideQualityModifierBasedOnItemInfo($info));
    }
}
