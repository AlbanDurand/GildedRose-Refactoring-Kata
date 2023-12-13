<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Corrector;

interface CorrectorInterface
{
    public function getCorrectedQuality(int $quality): int;
}
