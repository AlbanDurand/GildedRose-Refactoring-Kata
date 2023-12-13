<?php

declare(strict_types=1);

namespace Tests\Item\Quality\Modifier\Mutator;

use GildedRose\Item\Quality\Modifier\Mutator\PositiveMutator;
use PHPUnit\Framework\TestCase;

class PositiveMutatorTest extends TestCase
{
    /**
     * @dataProvider modifierBecomesOrRemainsPositiveProvider
     */
    public function testModifierBecomesOrRemainsPositive(
        int $modifier,
        int $mutatedModifier
    ): void {
        $mutator = new PositiveMutator();

        self::assertEquals(
            $mutatedModifier,
            $mutator->getMutatedQualityModifier($modifier)
        );
    }

    public function modifierBecomesOrRemainsPositiveProvider(): array
    {
        return [
            [4, 4],
            [0, 0],
            [-5, 5]
        ];
    }
}
