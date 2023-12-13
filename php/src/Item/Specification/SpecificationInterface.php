<?php

declare(strict_types=1);

namespace GildedRose\Item\Specification;

use GildedRose\Item\ItemInfo;

interface SpecificationInterface
{
    public function isSatisfiedBy(ItemInfo $info): bool;
}
