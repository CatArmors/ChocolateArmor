<?php

namespace unnyancat\chocolatearmor;

use pocketmine\item\ArmorTypeInfo;
use pocketmine\item\ItemIdentifier;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use Refaltor\Natof\CustomItem\CustomItem;

class Main extends PluginBase {
    public static Main $instance;

    protected function onEnable(): void
    {
        $this->getServer()->getLogger()->info("Chocolat Armor get §aInjected");
    }

    public function loadItems() {
        if (Server::getInstance()->getPluginManager()->getPlugin("CustomItem") != null) {

            $helmet = CustomItem::createHelmetItem(new ItemIdentifier(2032, 0), new ArmorTypeInfo(10, 500, 0), "chocolate helmet");
            $helmet->setTexture('chocolate_helmet');

            $chestplate = CustomItem::createChestPlateItem(new ItemIdentifier(2033, 0), new ArmorTypeInfo(10, 500, 1), "chocolate chestplate");
            $chestplate->setTexture('chocolate_chestplate');

            $leggings = CustomItem::createLeggingsItem(new ItemIdentifier(2034, 0), new ArmorTypeInfo(10, 500, 2), "chocolate leggings");
            $leggings->setTexture('chocolate_leggings');

            $boots = CustomItem::createBootsItem(new ItemIdentifier(2035, 0), new ArmorTypeInfo(10, 500, 3), "chocolate boots");
            $boots->setTexture('chocolate_boots');

            $items = [$chestplate, $helmet, $leggings, $boots];
            foreach ($items as $item) {
                CustomItem::registerItem($item);
            }
        }
    }

    protected function onDisable(): void
    {
        $this->getServer()->getLogger()->info("§cLe test de unnyancat s'arrête");
    }

    protected function onLoad(): void {
        $this->loadItems();
    }
}