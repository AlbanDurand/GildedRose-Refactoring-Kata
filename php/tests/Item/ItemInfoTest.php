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
        self::assertEquals(10, $info->getDaysBeforeExpiration());
        self::assertEquals(2, $info->getQuality());
    }

    public function testSettingQualitySucceeds(): void
    {
        $info = new ItemInfo(
            new Item(
                'Sonic screwdriver',
                10,
                2
            )
        );

        $info->setQuality(3);

        self::assertEquals(3, $info->getQuality());
    }

    public function testSettingRemainingDaysForSellingSucceeds(): void
    {
        $info = new ItemInfo(
            new Item(
                'Sonic screwdriver',
                10,
                2
            )
        );

        $info->setDaysBeforeExpiration(9);

        self::assertEquals(9, $info->getDaysBeforeExpiration());
    }
}
