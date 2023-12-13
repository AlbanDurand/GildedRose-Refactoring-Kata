<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Modifier\Provider;

use GildedRose\Item\ItemInfo;

class FixedProvider implements ProviderInterface
{
    public function __construct(
        private int $modifier
    ) {
    }

    public function provideQualityModifierBasedOnItemInfo(ItemInfo $info): int
    {
        return $this->modifier;
    }
}
