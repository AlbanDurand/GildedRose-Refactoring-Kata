<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Modifier\Mutator;

class PositiveMutator implements MutatorInterface
{
    public function getMutatedQualityModifier(int $modifier): int
    {
        return abs($modifier);
    }
}
