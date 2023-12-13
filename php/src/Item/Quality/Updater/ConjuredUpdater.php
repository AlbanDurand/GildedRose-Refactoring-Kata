<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Updater;

use GildedRose\Item\Quality\Corrector\GenericCorrector;
use GildedRose\Item\Quality\Modifier\Mutator\MultiplicableMutator;
use GildedRose\Item\Quality\Modifier\Provider\GenericProvider;
use GildedRose\Item\Quality\Modifier\Provider\MutableProvider;

class ConjuredUpdater extends ProgrammaticUpdater
{
    public function __construct()
    {
        parent::__construct(
            new MutableProvider(
                new MultiplicableMutator(2),
                new GenericProvider()
            ),
            new GenericCorrector()
        );
    }
}
