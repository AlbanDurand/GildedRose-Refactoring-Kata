<?php

declare(strict_types=1);

namespace GildedRose\Item\Specification;

use GildedRose\Item\ItemInfo;

class SellableSpecification implements SpecificationInterface
{
    public function isSatisfiedBy(ItemInfo $info): bool
    {
        return $info->getName() !== 'Sulfuras, Hand of Ragnaros';
    }
}
