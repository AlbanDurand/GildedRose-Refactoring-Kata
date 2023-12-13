<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Updater\Factory;

use GildedRose\Item\ItemInfo;
use GildedRose\Item\Quality\Updater\GenericUpdater;
use GildedRose\Item\Quality\Updater\Updater;
use GildedRose\Item\Quality\Updater\UpdaterInterface;

class Factory implements FactoryInterface
{
    public function createUpdater(ItemInfo $info): UpdaterInterface
    {
        if (false === in_array(
            $info->getName(),
            [
                'Aged Brie',
                'Backstage passes to a TAFKAL80ETC concert',
                'Sulfuras, Hand of Ragnaros'
            ]
        )) {
            return new GenericUpdater();
        }

        return new Updater();
    }
}
