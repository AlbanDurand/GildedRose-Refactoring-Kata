<?php

declare(strict_types=1);

namespace GildedRose\Item\UpdateQuality\Updater\Factory;

use GildedRose\Item\ItemInfo;
use GildedRose\Item\UpdateQuality\Updater\Updater;
use GildedRose\Item\UpdateQuality\Updater\UpdaterInterface;

class Factory implements FactoryInterface
{
    public function createUpdater(ItemInfo $info): UpdaterInterface
    {
        return new Updater();
    }
}
