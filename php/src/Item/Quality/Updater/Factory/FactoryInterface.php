<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Updater\Factory;

use GildedRose\Item\ItemInfo;
use GildedRose\Item\Quality\Updater\UpdaterInterface;

interface FactoryInterface
{
    public function createUpdater(ItemInfo $info): UpdaterInterface;
}
