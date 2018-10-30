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
			if($result === 2){
				$message = $this->getConfig()->get("Message");
				$player->transfer($ip3, $port3, $message);
				$bcast = $this->getConfig()->get("broadcast");
				$bcast = $this->getConfig()->get("broadcast");
                $name = $player->getName();
				$color = $this->getConfig()->get("Color");
				$server = $this->getConfig()->get("Server-3");
				$this->getServer()->broadcastMessage("$prefix $color $name $bcast $server");
            }
			if($result === 3){
				$message = $this->getConfig()->get("Message");
				$player->transfer($ip4, $port4, $message);
				$bcast = $this->getConfig()->get("broadcast");
				$bcast = $this->getConfig()->get("broadcast");
                $name = $player->getName();
				$color = $this->getConfig()->get("Color");
				$server = $this->getConfig()->get("Server-4");
				$this->getServer()->broadcastMessage("$prefix $color $name $bcast $server");
            }
			if($result === 4){
				$message = $this->getConfig()->get("Message");
				$player->transfer($ip5, $port5, $message);
				$bcast = $this->getConfig()->get("broadcast");
				$bcast = $this->getConfig()->get("broadcast");
                $name = $player->getName();
				$color = $this->getConfig()->get("Color");
				$server = $this->getConfig()->get("Server-5");
				$this->getServer()->broadcastMessage("$prefix $color $name $bcast $server");
            }
			if($result === 5){
				$message = $this->getConfig()->get("Message");
				$player->transfer($ip6, $port6, $message);
				$bcast = $this->getConfig()->get("broadcast");
				$bcast = $this->getConfig()->get("broadcast");
                $name = $player->getName();
				$color = $this->getConfig()->get("Color");
				$server = $this->getConfig()->get("Server-6");
				$this->getServer()->broadcastMessage("$prefix $color $name $bcast $server");
            }
			if($result === 6){
				$message = $this->getConfig()->get("Message");
				$player->transfer($ip7, $port7, $message);
				$bcast = $this->getConfig()->get("broadcast");
				$bcast = $this->getConfig()->get("broadcast");
                $name = $player->getName();
				$color = $this->getConfig()->get("Color");
				$server = $this->getConfig()->get("Server-7");
				$this->getServer()->broadcastMessage("$prefix $color $name $bcast $server");
            }
			if($result === 7){
				$message = $this->getConfig()->get("Message");
				$player->transfer($ip8, $port8, $message);
				$bcast = $this->getConfig()->get("broadcast");
				$bcast = $this->getConfig()->get("broadcast");
                $name = $player->getName();
				$color = $this->getConfig()->get("Color");
				$server = $this->getConfig()->get("Server-8");
				$this->getServer()->broadcastMessage("$prefix $color $name $bcast $server");
            }
			if($result === 8){
				$message = $this->getConfig()->get("Message");
				$player->transfer($ip9, $port9, $message);
				$bcast = $this->getConfig()->get("broadcast");
				$bcast = $this->getConfig()->get("broadcast");
                $name = $player->getName();
				$color = $this->getConfig()->get("Color");
				$server = $this->getConfig()->get("Server-9");
				$this->getServer()->broadcastMessage("$prefix $color $name $bcast $server");
            }
			if($result === 9){
				$message = $this->getConfig()->get("Message");
				$player->transfer($ip10, $port10, $message);
				$bcast = $this->getConfig()->get("broadcast");
				$bcast = $this->getConfig()->get("broadcast");
                $name = $player->getName();
				$color = $this->getConfig()->get("Color");
				$server = $this->getConfig()->get("Server-10");
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
		if ($number === 2){
			$name1 = $this->getConfig()->get("Server-1");
			$name2 = $this->getConfig()->get("Server-2");
			$form->addButton($name1);
			$form->addButton($name2);
			$form->sendToPlayer($player);
		}
		if ($number === 3){
			$name1 = $this->getConfig()->get("Server-1");
			$name2 = $this->getConfig()->get("Server-2");
			$name3 = $this->getConfig()->get("Server-3");
			$form->addButton($name1);
			$form->addButton($name2);
			$form->addButton($name3);
			$form->sendToPlayer($player);
		}
		if ($number === 4){
			$name1 = $this->getConfig()->get("Server-1");
			$name2 = $this->getConfig()->get("Server-2");
			$name3 = $this->getConfig()->get("Server-3");
			$name4 = $this->getConfig()->get("Server-4");
			$form->addButton($name1);
			$form->addButton($name2);
			$form->addButton($name3);
			$form->addButton($name4);
			$form->sendToPlayer($player);
		}
		if ($number === 5){
			$name1 = $this->getConfig()->get("Server-1");
			$name2 = $this->getConfig()->get("Server-2");
			$name3 = $this->getConfig()->get("Server-3");
			$name4 = $this->getConfig()->get("Server-4");
			$name5 = $this->getConfig()->get("Server-5");
			$form->addButton($name1);
			$form->addButton($name2);
			$form->addButton($name3);
			$form->addButton($name4);
			$form->addButton($name5);
			$form->sendToPlayer($player);
		}
		if ($number === 6){
			$name1 = $this->getConfig()->get("Server-1");
			$name2 = $this->getConfig()->get("Server-2");
			$name3 = $this->getConfig()->get("Server-3");
			$name4 = $this->getConfig()->get("Server-4");
			$name5 = $this->getConfig()->get("Server-5");
			$name6 = $this->getConfig()->get("Server-6");
			$form->addButton($name1);
			$form->addButton($name2);
			$form->addButton($name3);
			$form->addButton($name4);
			$form->addButton($name5);
			$form->addButton($name6);
			$form->sendToPlayer($player);
		}
		if ($number === 7){
			$name1 = $this->getConfig()->get("Server-1");
			$name2 = $this->getConfig()->get("Server-2");
			$name3 = $this->getConfig()->get("Server-3");
			$name4 = $this->getConfig()->get("Server-4");
			$name5 = $this->getConfig()->get("Server-5");
			$name6 = $this->getConfig()->get("Server-6");
			$name7 = $this->getConfig()->get("Server-7");
			$form->addButton($name1);
			$form->addButton($name2);
			$form->addButton($name3);
			$form->addButton($name4);
			$form->addButton($name5);
			$form->addButton($name6);
			$form->addButton($name7);
			$form->sendToPlayer($player);
		}
		if ($number === 8){
			$name1 = $this->getConfig()->get("Server-1");
			$name2 = $this->getConfig()->get("Server-2");
			$name3 = $this->getConfig()->get("Server-3");
			$name4 = $this->getConfig()->get("Server-4");
			$name5 = $this->getConfig()->get("Server-5");
			$name6 = $this->getConfig()->get("Server-6");
			$name7 = $this->getConfig()->get("Server-7");
			$name8 = $this->getConfig()->get("Server-8");
			$form->addButton($name1);
			$form->addButton($name2);
			$form->addButton($name3);
			$form->addButton($name4);
			$form->addButton($name5);
			$form->addButton($name6);
			$form->addButton($name7);
			$form->addButton($name8);
			$form->sendToPlayer($player);
		}
		if ($number === 9){
			$name1 = $this->getConfig()->get("Server-1");
			$name2 = $this->getConfig()->get("Server-2");
			$name3 = $this->getConfig()->get("Server-3");
			$name4 = $this->getConfig()->get("Server-4");
			$name5 = $this->getConfig()->get("Server-5");
			$name6 = $this->getConfig()->get("Server-6");
			$name7 = $this->getConfig()->get("Server-7");
			$name8 = $this->getConfig()->get("Server-8");
			$name9 = $this->getConfig()->get("Server-9");
			$form->addButton($name1);
			$form->addButton($name2);
			$form->addButton($name3);
			$form->addButton($name4);
			$form->addButton($name5);
			$form->addButton($name6);
			$form->addButton($name7);
			$form->addButton($name8);
			$form->addButton($name9);
			$form->sendToPlayer($player);
		}
		if ($number === 10){
			$name1 = $this->getConfig()->get("Server-1");
			$name2 = $this->getConfig()->get("Server-2");
			$name3 = $this->getConfig()->get("Server-3");
			$name4 = $this->getConfig()->get("Server-4");
			$name5 = $this->getConfig()->get("Server-5");
			$name6 = $this->getConfig()->get("Server-6");
			$name7 = $this->getConfig()->get("Server-7");
			$name8 = $this->getConfig()->get("Server-8");
			$name9 = $this->getConfig()->get("Server-9");
			$name10 = $this->getConfig()->get("Server-10");
			$form->addButton($name1);
			$form->addButton($name2);
			$form->addButton($name3);
			$form->addButton($name4);
			$form->addButton($name5);
			$form->addButton($name6);
			$form->addButton($name7);
			$form->addButton($name8);
			$form->addButton($name9);
			$form->addButton($name10);
			$form->sendToPlayer($player);
		}
    }
	public function Food(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			if ($result === 0){
				$price = $this->getConfig()->get("Steak-Price");
				$id = 364;
				$no = 0;
				$num = 32;
				$this->BuySell($player);
			}
		});
		$form->setTitle("Food");
		$form->addButton("Steak");
		$form->sendToPlayer($player);
	}
	public function BuySell(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			if ($result === 0){
				$player->getInventory()->addItem(Item::get($id, $no, $num));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get($price));
					
			}
			if ($result === 0){
				$player->getInventory()->removeItem(Item::get($id, $no, $num));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get($price));
			}
		});
		$form->setTitle("Buy/Sell");
		$form->addButton("Buy!");
		$form->addButton("Sell");
		$form->sendToPlayer($player);
	}
}