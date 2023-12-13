<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Corrector;

class ClampCorrector implements CorrectorInterface
{
    public function __construct(
        private int $min,
        private int $max
    ) {}

    public function getCorrectedQuality(int $quality): int
    {
        return max(min($quality, $this->max), $this->min);
    }
}
