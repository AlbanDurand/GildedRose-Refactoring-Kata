<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Updater;

use GildedRose\Item\Quality\Corrector\GenericCorrector;
use GildedRose\Item\Quality\Modifier\Provider\GenericProvider;

/**
 * Quality updater used for most items
 */
class GenericUpdater extends ProgrammaticUpdater
{
    public function __construct()
    {
        parent::__construct(new GenericProvider(), new GenericCorrector());
    }
}
