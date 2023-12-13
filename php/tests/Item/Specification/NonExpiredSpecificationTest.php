<?php

declare(strict_types=1);

namespace Tests\Item\Specification;

use GildedRose\Item;
use GildedRose\Item\ItemInfo;
use GildedRose\Item\Specification\NonExpiredSpecification;
use PHPUnit\Framework\TestCase;

class NonExpiredSpecificationTest extends TestCase
{
    public function testIsNotSatisfiedByItemWithNegativeRemainingDays(): void
    {
        $info = new ItemInfo(
            new Item(
                'Sonic screwdriver',
                -1,
                2
            )
        );

        $specification = new NonExpiredSpecification();

        self::assertFalse($specification->isSatisfiedBy($info));
    }

    public function testIsNotSatisfiedByItemWithZeroRemainingDays(): void
    {
        $info = new ItemInfo(
            new Item(
                'Sonic screwdriver',
                0,
                2
            )
        );

        $specification = new NonExpiredSpecification();

        self::assertFalse($specification->isSatisfiedBy($info));
    }

    public function testIsSatisfiedByItemWithPositiveRemainingDays(): void
    {
        $info = new ItemInfo(
            new Item(
                'Sonic screwdriver',
                1,
                2
            )
        );

        $specification = new NonExpiredSpecification();

        self::assertTrue($specification->isSatisfiedBy($info));
    }
}
