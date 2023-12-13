<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Modifier\Provider;

use GildedRose\Item\Quality\Modifier\Mutator\MultiplicableMutator;
use GildedRose\Item\Specification\UnsellableSpecification;

/**
 * Quality modifier provider that is used for most items
 */
class GenericProvider extends ProgrammaticProvider
{
    public function __construct()
    {
        parent::__construct(
            new ConditionallyMutableProvider(
                new UnsellableSpecification(),
                new MultiplicableMutator(2),
                new BaseProvider()
            )
        );
    }
}
