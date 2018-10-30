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

class Shop extends PluginBase implements Listener{
	

    public function onEnable(){
              $this->getServer()->getPluginManager()->registerEvents($this, $this);
              $this->getLogger()->info(TF::GREEN . "Enabled");	
			  @mkdir($this->getDataFolder());
    }
    public function onDisable(){
              $this->getLogger()->info(TF::RED . "Disabled");
    }
	
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        switch($command->getName()){
            case "shop":
                if($sender instanceof Player){
                    $this->openMyForm($sender);
					$message = $this->getConfig()->get("Message");
                    $sender->sendMessage(TF::GREEN . $message);
                }else{
                    $sender->sendMessage(TF::RED . "Please run this command in-game");
                }
                break;
        }
        return true;
    }

    public function openMyForm(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$ip1 = $this->getConfig()->get("IP1");
			$ip2 = $this->getConfig()->get("IP2");
			$ip3 = $this->getConfig()->get("IP3");
			$ip4 = $this->getConfig()->get("IP4");
			$ip5 = $this->getConfig()->get("IP5");
			$ip6 = $this->getConfig()->get("IP6");
			$ip7 = $this->getConfig()->get("IP7");
			$ip8 = $this->getConfig()->get("IP8");
			$ip9 = $this->getConfig()->get("IP9");
			$ip10 = $this->getConfig()->get("IP10");
			$port1 = $this->getConfig()->get("Port1");
			$port2 = $this->getConfig()->get("Port2");
			$port3 = $this->getConfig()->get("Port3");
			$port4 = $this->getConfig()->get("Port4");
			$port5 = $this->getConfig()->get("Port5");
			$port6 = $this->getConfig()->get("Port6");
			$port7 = $this->getConfig()->get("Port7");
			$port8 = $this->getConfig()->get("Port8");
			$port9 = $this->getConfig()->get("Port9");
			$port10 = $this->getConfig()->get("Port10");
			$number = $this->getConfig()->get("Servers");
			$prefix = $this->getConfig()->get("Prefix");
            if($result === null){
                return;
            }
			if ($result === 0 ){
				$this->Food($player);
			}
			if($result === 1){
				$message = $this->getConfig()->get("Message");
				$player->transfer($ip2, $port2, $message);
				$bcast = $this->getConfig()->get("broadcast");
				$bcast = $this->getConfig()->get("broadcast");
                $name = $player->getName();
				$color = $this->getConfig()->get("Color");
				$server = $this->getConfig()->get("Server-2");
				$this->getServer()->broadcastMessage("$prefix $color $name $bcast $server");
			}
        });
		$title = $this->getConfig()->get("Title");
		$number = $this->getConfig()->get("Servers");
        $form->setTitle($title);
		if ($number === 1){
			$name1 = $this->getConfig()->get("Food");
			$form->addButton($name1);
			$form->sendToPlayer($player);
		}
    }
	public function Food(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			if ($result === 0){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Food1ID"), $this->getConfig()->get("Food1Met"), $this->getConfig()->get("Food1Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->removeMoney($player->getName(), $this->getConfig()->get("Food1-Price"));
			}
			if ($result === 1){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Food2ID"), $this->getConfig()->get("Food2Met"), $this->getConfig()->get("Food2Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->removeMoney($player->getName(), $this->getConfig()->get("Food2-Price"));
			}
		});
		$form->setTitle("Food");
		$form->addButton("Steak");
		$form->sendToPlayer($player);
	}
}
