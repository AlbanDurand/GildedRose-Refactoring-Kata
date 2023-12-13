<?php

declare(strict_types=1);

namespace GildedRose\Item\Specification;

use GildedRose\Item\ItemInfo;

class MoreThanGivenDaysForSellingSpecification implements SpecificationInterface
{
    public function __construct(private int $days)
    {
    }

    public function isSatisfiedBy(ItemInfo $info): bool
    {
        return $info->getDaysBeforeExpiration() > $this->days;
    }
}
