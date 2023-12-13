<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Modifier\Provider;

use GildedRose\Item\ItemInfo;
use GildedRose\Item\Quality\Modifier\Mutator\MutatorInterface;
use GildedRose\Item\Specification\SpecificationInterface;

class ConditionallyMutableProvider implements ProviderInterface
{
    public function __construct(
        private SpecificationInterface $specification,
        private MutatorInterface $mutator,
        private ProviderInterface $provider,
    ) {}

    public function provideQualityModifierBasedOnItemInfo(ItemInfo $info): int
    {
        $modifier = $this->getInitialQualityModifier($info);

        if ($this->isQualityModifierMutationAuthorised($info)) {
            $modifier = $this->mutator->getMutatedQualityModifier($modifier);
        }

        return $modifier;
    }

    private function getInitialQualityModifier(ItemInfo $info): int
    {
        return $this->provider->provideQualityModifierBasedOnItemInfo($info);
    }

    private function isQualityModifierMutationAuthorised(ItemInfo $info): bool
    {
        return $this->specification->isSatisfiedBy($info);
    }
}
