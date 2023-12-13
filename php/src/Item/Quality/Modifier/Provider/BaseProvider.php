<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Modifier\Provider;

class BaseProvider extends FixedProvider
{
    public function __construct()
    {
        parent::__construct(-1);
    }
}
