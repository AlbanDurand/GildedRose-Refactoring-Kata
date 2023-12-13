<?php

declare(strict_types=1);

namespace Tests\Item\Quality\Modifier\Mutator;

use GildedRose\Item\Quality\Modifier\Mutator\MultiplicableMutator;
use PHPUnit\Framework\TestCase;

class MultiplicableMutatorTest extends TestCase
{
    /**
     * @dataProvider modifierIsMultipliedProvider
     */
    public function testModifierIsMultiplied(
        int $multiplier,
        int $mutatedModifier
    ): void {
        $mutator = new MultiplicableMutator($multiplier);

        self::assertEquals(
            $mutatedModifier,
            $mutator->getMutatedQualityModifier(5)
        );
    }

    public function modifierIsMultipliedProvider(): array
    {
        return [
            [-4, -20],
            [0, 0],
            [3, 15],
        ];
    }
}
