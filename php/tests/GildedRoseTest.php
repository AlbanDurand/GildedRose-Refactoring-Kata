<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testItemNameRemainsUnchangedWhenUpdatingQuality(): void
    {
        // Arrange
        $items = [new Item('foo', 0, 0)];
        $gildedRose = new GildedRose($items);

        // Act
        $gildedRose->updateQuality();

        // Assert
        $this->assertSame('foo', $items[0]->name);
    }
}
