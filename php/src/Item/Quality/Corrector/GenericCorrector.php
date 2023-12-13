<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Corrector;

/**
 * Quality corrector that is used for most items
 */
class GenericCorrector extends ClampCorrector
{
    public function __construct()
    {
        parent::__construct(0, 50);
    }
}
