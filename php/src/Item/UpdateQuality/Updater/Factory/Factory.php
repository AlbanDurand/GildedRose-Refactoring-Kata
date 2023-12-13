<?php

declare(strict_types=1);

namespace GildedRose\Item\UpdateQuality\Updater\Factory;

use GildedRose\Item;
use GildedRose\Item\UpdateQuality\Updater\Updater;
use GildedRose\Item\UpdateQuality\Updater\UpdaterInterface;

class Factory implements FactoryInterface
{
    public function createUpdater(Item $item): UpdaterInterface
    {
        return new Updater();
    }
}
