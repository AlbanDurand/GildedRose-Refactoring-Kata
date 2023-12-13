<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Updater;

use GildedRose\Item\Quality\Corrector\GenericCorrector;
use GildedRose\Item\Quality\Modifier\Mutator\PositiveMutator;
use GildedRose\Item\Quality\Modifier\Provider\BaseProvider;
use GildedRose\Item\Quality\Modifier\Provider\FixedProvider;
use GildedRose\Item\Quality\Modifier\Provider\MutableProvider;
use GildedRose\Item\Quality\Modifier\Provider\ObsoleteProvider;
use GildedRose\Item\Quality\Modifier\Provider\PrioritasableProvider;
use GildedRose\Item\Specification\MoreThanGivenDaysForSellingSpecification;
use GildedRose\Item\Specification\SellableSpecification;

class BackstagePassesUpdater extends ProgrammaticUpdater
{
    public function __construct()
    {
        parent::__construct(
            new PrioritasableProvider(
                new MoreThanGivenDaysForSellingSpecification(10),
                new MutableProvider(new PositiveMutator(), new BaseProvider()),
                new PrioritasableProvider(
                    new MoreThanGivenDaysForSellingSpecification(5),
                    new FixedProvider(2),
                    new PrioritasableProvider(
                        new SellableSpecification(),
                        new FixedProvider(3),
                        new ObsoleteProvider()
                    )
                )
            ),
            new GenericCorrector()
        );
    }
}
