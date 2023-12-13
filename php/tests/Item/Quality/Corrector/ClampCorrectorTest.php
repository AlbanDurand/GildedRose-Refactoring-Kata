<?php

declare(strict_types=1);

namespace Tests\Item\Quality\Corrector;

use GildedRose\Item\Quality\Corrector\ClampCorrector;
use PHPUnit\Framework\TestCase;

class ClampCorrectorTest extends TestCase
{
    public function testTooHighValueIsSetToAuthorisedMax(): void
    {
        $corrector = new ClampCorrector(4, 12);

        self::assertEquals(12, $corrector->getCorrectedQuality(20));
    }

    public function testTooLowValueIsSetToAuthorisedMin(): void
    {
        $corrector = new ClampCorrector(4, 12);

        self::assertEquals(4, $corrector->getCorrectedQuality(2));
    }

    public function testValueBetweenLimitsIsUnchanged(): void
    {
        $corrector = new ClampCorrector(4, 12);

        self::assertEquals(6, $corrector->getCorrectedQuality(6));
    }

    public function testValueOnLimitIsUnchanged(): void
    {
        $corrector = new ClampCorrector(4, 12);

        self::assertEquals(4, $corrector->getCorrectedQuality(4));
    }
}
