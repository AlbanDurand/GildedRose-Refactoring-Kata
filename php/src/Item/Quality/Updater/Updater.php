<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Updater;

use GildedRose\Item\ItemInfo;
use GildedRose\Item\Quality\Modifier\Provider\ObsoleteProvider;

class Updater implements UpdaterInterface
{
    public function updateItemQuality(ItemInfo $info): void
    {
        if ($info->getName() != 'Aged Brie' and $info->getName() != 'Backstage passes to a TAFKAL80ETC concert') {
            if ($info->getQuality() > 0) {
                if ($info->getName() != 'Sulfuras, Hand of Ragnaros') {
                    $info->setQuality($info->getQuality() - 1);
                }
            }
        } else {
            if ($info->getQuality() < 50) {
                $info->setQuality($info->getQuality() + 1);
                if ($info->getName() == 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($info->getDaysBeforeExpiration() < 11) {
                        if ($info->getQuality() < 50) {
                            $info->setQuality($info->getQuality() + 1);
                        }
                    }
                    if ($info->getDaysBeforeExpiration() < 6) {
                        if ($info->getQuality() < 50) {
                            $info->setQuality($info->getQuality() + 1);
                        }
                    }
                }
            }
        }

        if ($info->getName() != 'Sulfuras, Hand of Ragnaros') {
            $info->setDaysBeforeExpiration($info->getDaysBeforeExpiration() - 1);
        }

        if ($info->getDaysBeforeExpiration() < 0) {
            if ($info->getName() != 'Aged Brie') {
                if ($info->getName() != 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($info->getQuality() > 0) {
                        if ($info->getName() != 'Sulfuras, Hand of Ragnaros') {
                            $info->setQuality($info->getQuality() - 1);
                        }
                    }
                } else {
                    $info->setQuality(
                        $info->getQuality()
                        + (new ObsoleteProvider())->provideQualityModifierBasedOnItemInfo(
                            $info
                        )
                    );
                }
            } else {
                if ($info->getQuality() < 50) {
                    $info->setQuality($info->getQuality() + 1);
                }
            }
        }
    }
}
