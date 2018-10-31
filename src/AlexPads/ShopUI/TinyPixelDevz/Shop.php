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
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			if ($result === 0 ){
				$this->Food($player);
			}
			if($result === 1){
			}
        });
        $form->setTitle($this->getConfig()->get("Title"));
		$form->addButton($this->getConfig()->get("Food"));
		$form->sendToPlayer($player);
		}
	public function Food(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			if ($result === 0){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Food1ID"), $this->getConfig()->get("Food1Met"), $this->getConfig()->get("Food1Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Food1Price"));
			}
			if ($result === 1){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Food2ID"), $this->getConfig()->get("Food2Met"), $this->getConfig()->get("Food2Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Food2Price"));
			}
			if ($result === 2){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Food3ID"), $this->getConfig()->get("Food3Met"), $this->getConfig()->get("Food3Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Food3Price"));
			}
			if ($result === 3){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Food4ID"), $this->getConfig()->get("Food4Met"), $this->getConfig()->get("Food4Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Food4Price"));
			}
		});
		$form->setTitle("Food");
		$form->addButton($this->getConfig()->get("Food1Name"));
		$form->addButton($this->getConfig()->get("Food2Name"));
		$form->addButton($this->getConfig()->get("Food3Name"));
		$form->addButton($this->getConfig()->get("Food4Name"));
		$form->sendToPlayer($player);
	}
}
