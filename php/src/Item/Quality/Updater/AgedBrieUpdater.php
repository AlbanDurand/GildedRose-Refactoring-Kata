<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Updater;

use GildedRose\Item\Quality\Corrector\GenericCorrector;
use GildedRose\Item\Quality\Modifier\Mutator\PositiveMutator;
use GildedRose\Item\Quality\Modifier\Provider\GenericProvider;
use GildedRose\Item\Quality\Modifier\Provider\MutableProvider;

class AgedBrieUpdater extends ProgrammaticUpdater
{
    public function __construct()
    {
        parent::__construct(
            new MutableProvider(
                new PositiveMutator(),
                new GenericProvider()
            ),
            new GenericCorrector()
        );
    }
}
