<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Modifier\Provider;

use GildedRose\Item\Quality\Modifier\Mutator\MutatorInterface;
use GildedRose\Item\Specification\AlwaysValidSpecification;

class MutableProvider extends ConditionallyMutableProvider
{
    public function __construct(
        MutatorInterface $mutator,
        ProviderInterface $provider,
    ) {
        parent::__construct(
            new AlwaysValidSpecification(),
            $mutator,
            $provider
        );
    }
}
