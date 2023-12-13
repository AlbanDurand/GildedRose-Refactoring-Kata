<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Item\UpdateQuality\Updater\Factory\FactoryInterface as UpdaterFactoryInterface;

final class GildedRose
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private UpdaterFactoryInterface $updaterFactory,
        private array $items
    ) {
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $updater = $this->updaterFactory->createUpdater($item);
            $updater->updateItemQuality($item);
        }
    }
}
