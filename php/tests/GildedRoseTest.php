<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use GildedRose\Item\UpdateQuality\Updater\Factory\Factory as UpdaterFactory;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testItemNameRemainsUnchangedWhenUpdatingQuality(): void
    {
        // Arrange
        $items = [new Item('foo', 0, 0)];
        $gildedRose = new GildedRose(new UpdaterFactory(), $items);

        // Act
        $gildedRose->updateQuality();

        // Assert
        $this->assertSame('foo', $items[0]->name);
    }
}
