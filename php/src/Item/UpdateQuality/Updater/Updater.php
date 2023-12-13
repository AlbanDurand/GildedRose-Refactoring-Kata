<?php

declare(strict_types=1);

namespace GildedRose\Item\UpdateQuality\Updater;

use GildedRose\Item;
use GildedRose\Item\ItemInfo;

class Updater implements UpdaterInterface
{
    public function updateItemQuality(Item $item): void
    {
        $info = new ItemInfo($item);

        if ($info->getName() != 'Aged Brie' and $info->getName() != 'Backstage passes to a TAFKAL80ETC concert') {
            if ($info->getQuality() > 0) {
                if ($info->getName() != 'Sulfuras, Hand of Ragnaros') {
                    $info->updateQuality($info->getQuality() - 1);
                }
            }
        } else {
            if ($info->getQuality() < 50) {
                $info->updateQuality($info->getQuality() + 1);
                if ($info->getName() == 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($item->sellIn < 11) {
                        if ($info->getQuality() < 50) {
                            $info->updateQuality($info->getQuality() + 1);
                        }
                    }
                    if ($item->sellIn < 6) {
                        if ($info->getQuality() < 50) {
                            $info->updateQuality($info->getQuality() + 1);
                        }
                    }
                }
            }
        }

        if ($info->getName() != 'Sulfuras, Hand of Ragnaros') {
            $item->sellIn = $item->sellIn - 1;
        }

        if ($item->sellIn < 0) {
            if ($info->getName() != 'Aged Brie') {
                if ($info->getName() != 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($info->getQuality() > 0) {
                        if ($info->getName() != 'Sulfuras, Hand of Ragnaros') {
                            $info->updateQuality($info->getQuality() - 1);
                        }
                    }
                } else {
                    $info->updateQuality($info->getQuality() - $info->getQuality());
                }
            } else {
                if ($info->getQuality() < 50) {
                    $info->updateQuality($info->getQuality() + 1);
                }
            }
        }
    }
}
