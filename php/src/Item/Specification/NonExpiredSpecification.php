<?php

declare(strict_types=1);

namespace GildedRose\Item\Specification;

class NonExpiredSpecification extends MoreThanGivenDaysForSellingSpecification
{
    public function __construct()
    {
        parent::__construct(0);
    }
}
