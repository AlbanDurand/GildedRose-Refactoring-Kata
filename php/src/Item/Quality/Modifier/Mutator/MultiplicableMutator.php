<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Modifier\Mutator;

class MultiplicableMutator implements MutatorInterface
{
    public function __construct(private int $multiplier)
    {
    }

    public function getMutatedQualityModifier(int $modifier): int
    {
        return $modifier * $this->multiplier;
    }
}
