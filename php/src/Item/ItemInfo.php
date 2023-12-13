<?php

declare(strict_types=1);

namespace GildedRose\Item;

use GildedRose\Item;

/**
 * As we don't have the ownership of the "Item" class,
 * it is better to wrap it in our own class to mitigate the number of corrections
 * we'd have to make to our code if the "Item" class would be to change in
 * the future.
 */
class ItemInfo
{
    public function __construct(private Item $item)
    {
    }

    public function getQuality(): int
    {
        return $this->item->quality;
    }

    public function setQuality(int $quality): void
    {
        $this->item->quality = $quality;
    }

    public function getDaysBeforeExpiration(): int
    {
        return $this->item->sellIn;
    }

    public function setRemainingDaysForSelling(int $remainingDays): void
    {
        $this->item->sellIn = $remainingDays;
    }

    public function getName(): string
    {
        return $this->item->name;
    }
}
