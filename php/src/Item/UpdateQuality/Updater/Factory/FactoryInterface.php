<?php

declare(strict_types=1);

namespace GildedRose\Item\UpdateQuality\Updater\Factory;

use GildedRose\Item\ItemInfo;
use GildedRose\Item\UpdateQuality\Updater\UpdaterInterface;

interface FactoryInterface
{
    public function createUpdater(ItemInfo $info): UpdaterInterface;
}
