<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Modifier\Provider;

use GildedRose\Item\ItemInfo;

class ObsoleteProvider implements ProviderInterface
{
    public function provideQualityModifierBasedOnItemInfo(ItemInfo $info): int
    {
        return -$info->getQuality();
    }
}
