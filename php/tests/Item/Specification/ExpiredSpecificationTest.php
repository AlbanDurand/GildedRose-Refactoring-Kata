<?php

declare(strict_types=1);

namespace Tests\Item\Specification;

use GildedRose\Item;
use GildedRose\Item\ItemInfo;
use GildedRose\Item\Specification\ExpiredSpecification;
use PHPUnit\Framework\TestCase;

class ExpiredSpecificationTest extends TestCase
{
    public function testIsNotSatisfiedByItemWithPositiveRemainingDays(): void
    {
        $info = new ItemInfo(
            new Item(
                'Sonic screwdriver',
                1,
                2
            )
        );

        $specification = new ExpiredSpecification();

        self::assertFalse($specification->isSatisfiedBy($info));
    }

    public function testIsSatisfiedByItemWithZeroRemainingDays(): void
    {
        $info = new ItemInfo(
            new Item(
                'Sonic screwdriver',
                0,
                2
            )
        );

        $specification = new ExpiredSpecification();

        self::assertTrue($specification->isSatisfiedBy($info));
    }

    public function testIsSatisfiedByItemWithNegativeRemainingDays(): void
    {
        $info = new ItemInfo(
            new Item(
                'Sonic screwdriver',
                -1,
                2
            )
        );

        $specification = new ExpiredSpecification();

        self::assertTrue($specification->isSatisfiedBy($info));
    }
}
