<?php

#   _______   _                   _____    _                 _   _____                       
#  |__   __| (_)                 |  __ \  (_)               | | |  __ \                      
#     | |     _   _ __    _   _  | |__) |  _  __  __   ___  | | | |  | |   ___  __   __  ____
#     | |    | | | '_ \  | | | | |  ___/  | | \ \/ /  / _ \ | | | |  | |  / _ \ \ \ / / |_  /
#     | |    | | | | | | | |_| | | |      | |  >  <  |  __/ | | | |__| | |  __/  \ V /   / / 
#     |_|    |_| |_| |_|  \__, | |_|      |_| /_/\_\  \___| |_| |_____/   \___|   \_/   /___|
#                          __/ |                                                             
#                         |___/    
#     
namespace AlexPads\ShopUI\TinyPixelDevz;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;

class Shop extends PluginBase implements Listener{

	public $items;
	public $category;
	public $allshop;
	public $name;

	public function onEnable(){
        foreach (['FormAPI', 'EconomyAPI'] as $depend) {
            $plugin = $this->getServer()->getPluginManager()->getPlugin($depend);
            $plugin = strtolower($depend);
            if (is_null($plugin)) {
                $this->getLogger()->error("The plugin" . $depend . " is required in order to use this plugin.");
                $this->setEnabled(false);
            }
        }
        $this->saveDefaultConfig();
		$this->getLogger()->info(TF::GREEN . "Enabled");	
    }
	public function onDisable(){
              $this->getLogger()->info(TF::RED . "Disabled");
    }
	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{
        switch ($cmd->getName()) {
            case "shop":
                if ($sender instanceof Player) {
                    $this->catForm($sender);
					return true;
                }
                $sender->sendMessage(TF::RED . "Please use this in-game.");
                break;
        }
        return true;
    }


	public function catForm(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$allshop = yaml_parse_file($this->getDataFolder(). "shop.yml");
			var_dump($allshop);
			foreach ($allshop as $category) {
			}
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			foreach ($allshop as $name => $content){
			var_dump($name);
			}
			if ($result < $name){
				$this->itemForm($sender);
			}
		});
		$form->setTitle($this->getConfig()->get("Title"));
		$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
		$allshop = yaml_parse_file($this->getDataFolder(). "shop.yml");
        foreach ($allshop as $name => $content){
			$form->addButton(ucfirst($name));
        }
		$form->sendToPlayer($player);
	}
	public function itemForm(Player $player, $allshop) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($data < count($this->$allshop)) {
                    $item = $this->$allshop[$data[0]];
                    $list = explode(":", $allshop);
                    $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
                    if ($money >= $list[4]) {
                        $player->getInventory()->addItem(Item::get($list[0], $list[1], $list[2])->setCustomName($list[3]));
                        $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player, $list[4]);
                        $message = $this->getConfig()->getNested("messages.paid-for");
                        $vars = ["{amount}" => $list[2], "{item}" => $list[3], "{cost}" => $list[4]];
                        foreach ($vars as $var => $replacement){
                            $message = str_replace($var, $replacement, $message);
                        }
                        $player->sendMessage($message);
                    } else {
                        $message = $this->getConfig()->getNested("messages.not-enough-money");
                        $tags = [
                            "{amount}" => $list[2],
                            "{name}" => $list[3],
                            "{missing}" => $list[4] - $money
                        ];
                        foreach ($tags as $tag => $replacement){
                            $message = str_replace($tag, $replacement, $message);
                        }
                        $player->sendMessage($message);                    }
                } else {
                    $this->catForm($player);
                }
		});
		$form->setTitle($this->getConfig()->get("Title"));
		$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
		$allshop = yaml_parse_file($this->getDataFolder(). "shop.yml");
		foreach ($allshop as $category){
		}
		foreach ($category as $item) {
			var_dump($item);
            $list = explode(":", $item);
            $form->addButton($list[3] . "  " . "$" . $list[4]);
        }
		$form->addButton(TF::RED . TF::BOLD . "Back");
		$form->sendToPlayer($player);
	}
	
	
	
}



