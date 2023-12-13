<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Modifier\Mutator;

interface MutatorInterface
{
    public function getMutatedQualityModifier(int $modifier): int;
}
