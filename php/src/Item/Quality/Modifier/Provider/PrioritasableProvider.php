<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Modifier\Provider;

use GildedRose\Item\ItemInfo;
use GildedRose\Item\Specification\SpecificationInterface;

/**
 * If the item info matches the specification, we get the quality modifier
 * with the current provider, otherwise we try with the next one
 */
class PrioritasableProvider implements ProviderInterface
{
    public function __construct(
        private SpecificationInterface $specification,
        private ProviderInterface $currentProvider,
        private ProviderInterface $nextProvider
    ) {
    }

    public function provideQualityModifierBasedOnItemInfo(ItemInfo $info): int
    {
        if ($this->isPrioritasableAccordingToItemInfo($info)) {
            return $this->executeCurrentProvider($info);
        }

        return $this->executeNextProvider($info);
    }

    private function executeProvider(
        ProviderInterface $provider,
        ItemInfo $info
    ): int {
        return $provider->provideQualityModifierBasedOnItemInfo($info);
    }

    private function executeCurrentProvider(ItemInfo $info): int
    {
        return $this->executeProvider($this->currentProvider, $info);
    }

    private function executeNextProvider(ItemInfo $info): int
    {
        return $this->executeProvider($this->nextProvider, $info);
    }

    private function isPrioritasableAccordingToItemInfo(ItemInfo $info): bool
    {
        return $this->specification->isSatisfiedBy($info);
    }
}
