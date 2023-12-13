<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Updater;

use GildedRose\Item\Quality\Corrector\ClampCorrector;
use GildedRose\Item\Quality\Modifier\Provider\FixedProvider;

class SulfurasUpdater extends ProgrammaticUpdater
{
    public function __construct()
    {
        parent::__construct(
            new FixedProvider(0),
            new ClampCorrector(80, 80)
        );
    }
}
