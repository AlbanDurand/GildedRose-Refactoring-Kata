<?php

declare(strict_types=1);

namespace GildedRose\Item\Specification;

use GildedRose\Item\ItemInfo;

class UnsellableSpecification implements SpecificationInterface
{
    public function isSatisfiedBy(ItemInfo $info): bool
    {
        return (new SellableSpecification())->isSatisfiedBy($info) === false;
    }
}
