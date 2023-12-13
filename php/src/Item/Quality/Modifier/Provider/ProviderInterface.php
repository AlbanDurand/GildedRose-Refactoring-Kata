<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Modifier\Provider;

use GildedRose\Item\ItemInfo;

/**
 * In charge of calculating and returning the value that must be added
 * to the current quality of an item to update it
 */
interface ProviderInterface
{
    public function provideQualityModifierBasedOnItemInfo(ItemInfo $info): int;
}
