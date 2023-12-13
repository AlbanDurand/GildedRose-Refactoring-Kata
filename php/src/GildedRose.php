<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Item\ItemInfo;
use GildedRose\Item\Quality\Updater\Factory\FactoryInterface as UpdaterFactoryInterface;
use GildedRose\Item\Specification\SpecificationInterface as ItemSpecificationInterface;

final class GildedRose
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private UpdaterFactoryInterface $updaterFactory,
        private ItemSpecificationInterface $sellableSpecification,
        private array $items
    ) {
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $info = new ItemInfo($item);

            $updater = $this->updaterFactory->createUpdater($info);
            $updater->updateItemQuality($info);

            if ($this->sellableSpecification->isSatisfiedBy($info)) {
                $info->setDaysBeforeExpiration($info->getDaysBeforeExpiration() - 1);
            }
        }
    }
}
