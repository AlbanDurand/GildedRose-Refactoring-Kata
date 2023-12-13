<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Updater;

use GildedRose\Item\ItemInfo;

interface UpdaterInterface
{
    public function updateItemQuality(ItemInfo $info): void;
}
