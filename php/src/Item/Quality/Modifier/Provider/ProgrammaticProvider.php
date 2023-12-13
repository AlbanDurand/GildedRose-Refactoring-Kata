<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Modifier\Provider;

use GildedRose\Item\ItemInfo;

class ProgrammaticProvider implements ProviderInterface
{
    public function __construct(
        private ProviderInterface $provider
    ) {}

    public function provideQualityModifierBasedOnItemInfo(ItemInfo $info): int
    {
        return $this->provider->provideQualityModifierBasedOnItemInfo($info);
    }
}
