<?php

declare(strict_types=1);

namespace GildedRose\Item\Quality\Updater\Factory;

use GildedRose\Item\ItemInfo;
use GildedRose\Item\Quality\Updater\AgedBrieUpdater;
use GildedRose\Item\Quality\Updater\BackstagePassesUpdater;
use GildedRose\Item\Quality\Updater\ConjuredUpdater;
use GildedRose\Item\Quality\Updater\GenericUpdater;
use GildedRose\Item\Quality\Updater\SulfurasUpdater;
use GildedRose\Item\Quality\Updater\UpdaterInterface;

class Factory implements FactoryInterface
{
    public function createUpdater(ItemInfo $info): UpdaterInterface
    {
        switch ($info->getName()) {
            case 'Backstage passes to a TAFKAL80ETC concert':
                $updater = new BackstagePassesUpdater();
                break;

            case 'Aged Brie':
                $updater = new AgedBrieUpdater();
                break;

            case 'Sulfuras, Hand of Ragnaros':
                $updater = new SulfurasUpdater();
                break;

            case 'Conjured Mana Cake':
                $updater = new ConjuredUpdater();
                break;

            default:
                $updater = new GenericUpdater();
        }

        return $updater;
    }
}
