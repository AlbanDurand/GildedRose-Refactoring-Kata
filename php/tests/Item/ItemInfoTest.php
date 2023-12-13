<?php

declare(strict_types=1);

namespace Tests\Item;

use GildedRose\Item;
use GildedRose\Item\ItemInfo;
use PHPUnit\Framework\TestCase;

class ItemInfoTest extends TestCase
{
    public function testWrappedItemDataAreUnchanged(): void
    {
        $info = new ItemInfo(
            new Item(
                'Sonic screwdriver',
                10,
                2
            )
        );

        self::assertEquals('Sonic screwdriver', $info->getName());
        self::assertEquals(10, $info->getRemainingDaysForSelling());
        self::assertEquals(2, $info->getQuality());
    }

    public function testUpdatingQualitySucceeds(): void
    {
        $info = new ItemInfo(
            new Item(
                'Sonic screwdriver',
                10,
                2
            )
        );

        $info->updateQuality(3);

        self::assertEquals(3, $info->getQuality());
    }
}
