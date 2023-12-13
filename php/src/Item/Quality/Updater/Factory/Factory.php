<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Updater\Factory;

use GildedRose\Item\ItemInfo;
use GildedRose\Item\Quality\Updater\Updater;
use GildedRose\Item\Quality\Updater\UpdaterInterface;

class Factory implements FactoryInterface
{
    public function createUpdater(ItemInfo $info): UpdaterInterface
    {
        return new Updater();
    }
}
