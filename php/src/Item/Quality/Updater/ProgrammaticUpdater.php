<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Updater;

use GildedRose\Item\ItemInfo;
use GildedRose\Item\Quality\Corrector\CorrectorInterface;
use GildedRose\Item\Quality\Modifier\Provider\ProviderInterface;

class ProgrammaticUpdater implements UpdaterInterface
{
    public function __construct(
        private ProviderInterface $calculator,
        private ?CorrectorInterface $corrector = null
    ) {
    }

    public function updateItemQuality(ItemInfo $info): void
    {
        $nextQuality = $info->getQuality() + $this->getQualityModifier($info);
        $nextQuality = $this->getCorrectedQuality($nextQuality);

        $info->setQuality($nextQuality);
    }

    private function getQualityModifier(ItemInfo $info): int
    {
        return $this->calculator->provideQualityModifierBasedOnItemInfo($info);
    }

    private function getCorrectedQuality(int $quality): int
    {
        return $this->corrector !== null
            ? $this->corrector->getCorrectedQuality($quality)
            : $quality;
    }
}
