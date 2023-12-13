<?php

declare(strict_types=1);

namespace GildedRose\Item\UpdateQuality\Updater;

use GildedRose\Item;

interface UpdaterInterface
{
    public function updateItemQuality(Item $item): void;
}
