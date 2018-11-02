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
	
	public $id;
	public $Price;
	public $Ammount;
	public $Meta;
	public $sell;
	public $command;
	

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
                    $this->Question($sender);
					$message = $this->getConfig()->get("Message");
                    $sender->sendMessage(TF::GREEN . $message);
                }else{
                    $sender->sendMessage(TF::RED . "Please run this command in-game");
                }
                break;
        }
        return true;
    }

    public function Form(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($result === 0 ){
				$this->Food($player);
			}
			if($result === 1){
				$this->Blocks($player);
			}
			if ($result === 2){
				$this->Ores($player);
			}
			if($result === 3){
				$this->Raiding($player);
			}
			if($result === 4){
				$this->Misc($player);
			}
			if($result === 5){
				$this->Armor($player);
			}
			if($result === 6){
				$this->Keys($player);
			}
			if($result === 7){
				$this->Enchants($player);
			}
        });
        $form->setTitle($this->getConfig()->get("Title"));
		if ($this->getConfig()->get("Enabled-Food") === true){
			$form->addButton($this->getConfig()->get("Food"));
			if ($this->getConfig()->get("Enabled-Blocks") === true){
				$form->addButton($this->getConfig()->get("Blocks"));
			if ($this->getConfig()->get("Enabled-Ores") === true){
				$form->addButton($this->getConfig()->get("Ores"));
			if ($this->getConfig()->get("Enabled-Raiding") === true){
				$form->addButton($this->getConfig()->get("Raiding"));
			if ($this->getConfig()->get("Enabled-Misc") === true){
				$form->addButton($this->getConfig()->get("Misc"));
			if ($this->getConfig()->get("Enabled-Armor") === true){
				$form->addButton($this->getConfig()->get("Armor"));
			if ($this->getConfig()->get("Enabled-Keys") === true){
				$form->addButton($this->getConfig()->get("Keys"));
			if ($this->getConfig()->get("Enabled-Enchants") === true){
				$form->addButton($this->getConfig()->get("Enchants"));
									}
								}
							}
						}
					}
				}
			}
		}
		$form->sendToPlayer($player);
	}
	public function Food(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($result === 0){
				if($money < $this->getConfig()->get("Food1Price")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Food1ID"), $this->getConfig()->get("Food1Met"), $this->getConfig()->get("Food1Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Food1Price"));
				$this->Form($player);
			}}
			if ($result === 1){
				if($money < $this->getConfig()->get("Food2Price")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Food2ID"), $this->getConfig()->get("Food2Met"), $this->getConfig()->get("Food2Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Food2Price"));
				$this->Form($player);
			}}
			if ($result === 2){
				if($money < $this->getConfig()->get("Food3Price")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Food3ID"), $this->getConfig()->get("Food3Met"), $this->getConfig()->get("Food3Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Food3Price"));
				$this->Form($player);
			}}
			if ($result === 3){
				if($money < $this->getConfig()->get("Food4Price")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Food4ID"), $this->getConfig()->get("Food4Met"), $this->getConfig()->get("Food4Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Food4Price"));
				$this->Form($player);
			}}
		});
		$form->setTitle($this->getConfig()->get("Food"));
		$form->setContent($this->getConfig()->get("Setup"));
		$form->addButton($this->getConfig()->get("Food1Name"). " ". $this->getConfig()->get("Food1Num"). " ". $this->getConfig()->get("Food1-Price"). "$");
		$form->addButton($this->getConfig()->get("Food2Name"). " ". $this->getConfig()->get("Food2Num"). " ". $this->getConfig()->get("Food2Price"). "$");
		$form->addButton($this->getConfig()->get("Food3Name"). " ". $this->getConfig()->get("Food3Num"). " ". $this->getConfig()->get("Food3Price"). "$");
		$form->addButton($this->getConfig()->get("Food4Name"). " ". $this->getConfig()->get("Food4Num"). " ". $this->getConfig()->get("Food4Price"). "$");
		$form->sendToPlayer($player);
	}
	public function Ores(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($result === 0){
				if($money < $this->getConfig()->get("OrePrice1")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("OreID1"), $this->getConfig()->get("OreMeta1"), $this->getConfig()->get("OreAmmount1")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("OrePrice1"));
				$this->Form($player);
			}}
			if ($result === 1){
				if($money < $this->getConfig()->get("OrePrice2")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("OreID2"), $this->getConfig()->get("OreMeta2"), $this->getConfig()->get("OreAmmount2")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("OrePrice2"));
				$this->Form($player);
			}}
			if ($result === 2){
				if($money < $this->getConfig()->get("OrePrice3")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("OreID3"), $this->getConfig()->get("OreMeta3"), $this->getConfig()->get("OreAmmount3")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("OrePrice3"));
				$this->Form($player);
			}}
			if ($result === 3){
				if($money < $this->getConfig()->get("OrePrice4")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("OreID4"), $this->getConfig()->get("OreMeta5"), $this->getConfig()->get("OreAmmount4")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("OrePrice4"));
				$this->Form($player);
			}}
		});
		$form->setTitle($this->getConfig()->get("Ores"));
		$form->setContent($this->getConfig()->get("Setup"));
		$form->addButton($this->getConfig()->get("OreName1"). " ". $this->getConfig()->get("OreAmmount1"). " ". $this->getConfig()->get("OrePrice1"). "$");
		$form->addButton($this->getConfig()->get("OreName2"). " ". $this->getConfig()->get("OreAmmount2"). " ". $this->getConfig()->get("OrePrice2"). "$");
		$form->addButton($this->getConfig()->get("OreName3"). " ". $this->getConfig()->get("OreAmmount3"). " ". $this->getConfig()->get("OrePrice3"). "$");
		$form->addButton($this->getConfig()->get("OreName4"). " ". $this->getConfig()->get("OreAmmount4"). " ". $this->getConfig()->get("OrePrice4"). "$");
		$form->sendToPlayer($player);
	}
	public function Blocks(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($result === 0){
				if($money < $this->getConfig()->get("Price1")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block1"), $this->getConfig()->get("BlockMeta1"), $this->getConfig()->get("Amount1")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price1"));
				$this->Form($player);
			}}
			if ($result === 1){
				if($money < $this->getConfig()->get("Price2")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block2"), $this->getConfig()->get("BlockMeta2"), $this->getConfig()->get("Amount2")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price2"));
				$this->Form($player);
			}}
			if ($result === 2){
				if($money < $this->getConfig()->get("Price3")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block3"), $this->getConfig()->get("BlockMeta3"), $this->getConfig()->get("Amount3")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price3"));
				$this->Form($player);
			}}
			if ($result === 3){
				if($money < $this->getConfig()->get("Price4")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block4"), $this->getConfig()->get("BlockMeta4"), $this->getConfig()->get("Amount4")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price4"));
				$this->Form($player);
			}}
			if ($result === 4){
				if($money < $this->getConfig()->get("Price5")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block5"), $this->getConfig()->get("BlockMeta5"), $this->getConfig()->get("Amount5")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price5"));
			}}
			if ($result === 5){
				if($money < $this->getConfig()->get("Price6")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block6"), $this->getConfig()->get("BlockMeta6"), $this->getConfig()->get("Amount6")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price6"));
				$this->Form($player);
			}}
			if ($result === 6){
				if($money < $this->getConfig()->get("Price7")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block7"), $this->getConfig()->get("BlockMeta7"), $this->getConfig()->get("Amount7")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price7"));
				$this->Form($player);
			}}
			if ($result === 7){
				if($money < $this->getConfig()->get("Price8")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block8"), $this->getConfig()->get("BlockMeta8"), $this->getConfig()->get("Amount8")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price8"));
				$this->Form($player);
			}}
			if ($result === 8){
				if($money < $this->getConfig()->get("Price9")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block9"), $this->getConfig()->get("BlockMeta9"), $this->getConfig()->get("Amount9")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price9"));
				$this->Form($player);
			}}
			if ($result === 9){
				if($money < $this->getConfig()->get("Price10")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block10"), $this->getConfig()->get("BlockMeta10"), $this->getConfig()->get("Amount10")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price10"));
				$this->Form($player);
			}}
			if ($result === 10){
				if($money < $this->getConfig()->get("Price11")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block11"), $this->getConfig()->get("BlockMeta11"), $this->getConfig()->get("Amount11")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price11"));
				$this->Form($player);
			}}
			if ($result === 11){
				if($money < $this->getConfig()->get("Price12")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block12"), $this->getConfig()->get("BlockMeta12"), $this->getConfig()->get("Amount12")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price12"));
				$this->Form($player);
			}}
			if ($result === 12){
				if($money < $this->getConfig()->get("Price13")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block13"), $this->getConfig()->get("BlockMeta13"), $this->getConfig()->get("Amount13")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price13"));
				$this->Form($player);
			}}
			if ($result === 13){
				if($money < $this->getConfig()->get("Price14")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block14"), $this->getConfig()->get("BlockMeta14"), $this->getConfig()->get("Amount14")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price14"));
				$this->Form($player);
			}}
			if ($result === 14){
				if($money < $this->getConfig()->get("Price15")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block15"), $this->getConfig()->get("BlockMeta15"), $this->getConfig()->get("Amount15")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price15"));
				$this->Form($player);
			}}
			if ($result === 15){
				if($money < $this->getConfig()->get("Preice16")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block16"), $this->getConfig()->get("BlockMeta16"), $this->getConfig()->get("Amount16")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price16"));
				$this->Form($player);
			}}
		});
		$form->setTitle($this->getConfig()->get("Blocks"));
		$form->setContent($this->getConfig()->get("Setup"));
		$form->addButton($this->getConfig()->get("Name1"). " ". $this->getConfig()->get("Amount1"). " ". $this->getConfig()->get("Price1"). "$");
		$form->addButton($this->getConfig()->get("Name2"). " ". $this->getConfig()->get("Amount2"). " ". $this->getConfig()->get("Price2"). "$");
		$form->addButton($this->getConfig()->get("Name3"). " ". $this->getConfig()->get("Amount3"). " ". $this->getConfig()->get("Price3"). "$");
		$form->addButton($this->getConfig()->get("Name4"). " ". $this->getConfig()->get("Amount4"). " ". $this->getConfig()->get("Price4"). "$");
		$form->addButton($this->getConfig()->get("Name5"). " ". $this->getConfig()->get("Amount5"). " ". $this->getConfig()->get("Price5"). "$");
		$form->addButton($this->getConfig()->get("Name6"). " ". $this->getConfig()->get("Amount6"). " ". $this->getConfig()->get("Price6"). "$");
		$form->addButton($this->getConfig()->get("Name7"). " ". $this->getConfig()->get("Amount7"). " ". $this->getConfig()->get("Price7"). "$");
		$form->addButton($this->getConfig()->get("Name8"). " ". $this->getConfig()->get("Amount8"). " ". $this->getConfig()->get("Price8"). "$");
		$form->addButton($this->getConfig()->get("Name9"). " ". $this->getConfig()->get("Amount9"). " ". $this->getConfig()->get("Price9"). "$");
		$form->addButton($this->getConfig()->get("Name10"). " ". $this->getConfig()->get("Amount10"). " ". $this->getConfig()->get("Price10"). "$");
		$form->addButton($this->getConfig()->get("Name11"). " ". $this->getConfig()->get("Amount11"). " ". $this->getConfig()->get("Price11"). "$");
		$form->addButton($this->getConfig()->get("Name12"). " ". $this->getConfig()->get("Amount12"). " ". $this->getConfig()->get("Price12"). "$");
		$form->addButton($this->getConfig()->get("Name13"). " ". $this->getConfig()->get("Amount13"). " ". $this->getConfig()->get("Price13"). "$");
		$form->addButton($this->getConfig()->get("Name14"). " ". $this->getConfig()->get("Amount14"). " ". $this->getConfig()->get("Price14"). "$");
		$form->addButton($this->getConfig()->get("Name15"). " ". $this->getConfig()->get("Amount15"). " ". $this->getConfig()->get("Price15"). "$");
		$form->sendToPlayer($player);
	}
	public function Raiding(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($result === 0){
				if($money < $this->getConfig()->get("ItemPrice1")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("ItemID1"), $this->getConfig()->get("ItemMeta1"), $this->getConfig()->get("ItemAmmount1")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("ItemPrice1"));
				$this->Form($player);
			}}
			if ($result === 1){
				if($money < $this->getConfig()->get("ItemPrice2")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("ItemID2"), $this->getConfig()->get("ItemMeta2"), $this->getConfig()->get("ItemAmmount2")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("ItemPrice2"));
				$this->Form($player);
			}}
			if ($result === 2){
				if($money < $this->getConfig()->get("ItemPrice3")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("ItemID3"), $this->getConfig()->get("ItemMeta3"), $this->getConfig()->get("ItemAmmount3")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("ItemPrice3"));
				$this->Form($player);
			}}
			if ($result === 3){
				if($money < $this->getConfig()->get("ItemPrice4")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("ItemID4"), $this->getConfig()->get("ItemMeta4"), $this->getConfig()->get("Food4Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("ItemPrice4"));
				$this->Form($player);
			}}
			if ($result === 4){
				if($money < $this->getConfig()->get("ItemPrice5")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("ItemID5"), $this->getConfig()->get("ItemMeta5"), $this->getConfig()->get("ItemAmmount5")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("ItemPrice5"));
				$this->Form($player);
			}}
			if ($result === 5){
				if($money < $this->getConfig()->get("ItemPrice6")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("ItemID6"), $this->getConfig()->get("ItemMeta6"), $this->getConfig()->get("ItemAmmount6")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("ItemPrice6"));
				$this->Form($player);
			}}
			if ($result === 6){
				if($money < $this->getConfig()->get("ItemPrice7")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("ItemID7"), $this->getConfig()->get("ItemMeta7"), $this->getConfig()->get("ItemAmmount7")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("ItemPrice7"));
				$this->Form($player);
			}}
			if ($result === 7){
				if($money < $this->getConfig()->get("ItemPrice8")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("ItemID8"), $this->getConfig()->get("ItemMeta8"), $this->getConfig()->get("ItemAmmount8")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("ItemPrice8"));
				$this->Form($player);
			}}
		});
		$form->setTitle($this->getConfig()->get("Raiding"));
		$form->setContent($this->getConfig()->get("Setup"));
		$form->addButton($this->getConfig()->get("Item1"). " ". $this->getConfig()->get("ItemAmmount1"). " ". $this->getConfig()->get("ItemPrice1"). "$");
		$form->addButton($this->getConfig()->get("Item2"). " ". $this->getConfig()->get("ItemAmmount2"). " ". $this->getConfig()->get("ItemPrice2"). "$");
		$form->addButton($this->getConfig()->get("Item3"). " ". $this->getConfig()->get("ItemAmmount3"). " ". $this->getConfig()->get("ItemPrice3"). "$");
		$form->addButton($this->getConfig()->get("Item4"). " ". $this->getConfig()->get("ItemAmmount4"). " ". $this->getConfig()->get("ItemPrice4"). "$");
		$form->addButton($this->getConfig()->get("Item5"). " ". $this->getConfig()->get("ItemAmmount5"). " ". $this->getConfig()->get("ItemPrice5"). "$");
		$form->addButton($this->getConfig()->get("Item6"). " ". $this->getConfig()->get("ItemAmmount6"). " ". $this->getConfig()->get("ItemPrice6"). "$");
		$form->addButton($this->getConfig()->get("Item7"). " ". $this->getConfig()->get("ItemAmmount7"). " ". $this->getConfig()->get("ItemPrice7"). "$");
		$form->addButton($this->getConfig()->get("Item8"). " ". $this->getConfig()->get("ItemAmmount8"). " ". $this->getConfig()->get("ItemPrice8"). "$");
		$form->sendToPlayer($player);
	}
	public function Misc(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($result === 0){
				if($money < $this->getConfig()->get("Mp1")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid1"), $this->getConfig()->get("MM1"), $this->getConfig()->get("Ammount1")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp1"));
				$this->Form($player);
			}}
			if ($result === 1){
				if($money < $this->getConfig()->get("Mp2")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid2"), $this->getConfig()->get("MM2"), $this->getConfig()->get("Ammount2")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp2"));
				$this->Form($player);
			}}
			if ($result === 2){
				if($money < $this->getConfig()->get("Mp3")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid3"), $this->getConfig()->get("MM3"), $this->getConfig()->get("Ammount3")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp3"));
				$this->Form($player);
			}}
			if ($result === 3){
				if($money < $this->getConfig()->get("Mp4")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid4"), $this->getConfig()->get("MM4"), $this->getConfig()->get("4Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp4"));
				$this->Form($player);
			}}
			if ($result === 4){
				if($money < $this->getConfig()->get("Mp5")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid5"), $this->getConfig()->get("MM5"), $this->getConfig()->get("Ammount5")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp5"));
				$this->Form($player);
			}}
			if ($result === 5){
				if($money < $this->getConfig()->get("Mp6")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid6"), $this->getConfig()->get("MM6"), $this->getConfig()->get("Ammount6")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp6"));
				$this->Form($player);
			}}
			if ($result === 6){
				if($money < $this->getConfig()->get("Mp7")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid7"), $this->getConfig()->get("MM7"), $this->getConfig()->get("Ammount7")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp7"));
				$this->Form($player);
			}}
			if ($result === 7){
				if($money < $this->getConfig()->get("Mp8")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid8"), $this->getConfig()->get("MM8"), $this->getConfig()->get("Ammount8")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp8"));
				$this->Form($player);
			}}
			if ($result === 8){
				if($money < $this->getConfig()->get("Mp9")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid9"), $this->getConfig()->get("MM9"), $this->getConfig()->get("Ammount9")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp9"));
				$this->Form($player);
			}}
			if ($result === 9){
				if($money < $this->getConfig()->get("Mp10")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid10"), $this->getConfig()->get("MM10"), $this->getConfig()->get("Ammount10")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp10"));
				$this->Form($player);
			}}
		});
		$form->setTitle($this->getConfig()->get("Misc"));
		$form->setContent($this->getConfig()->get("Setup"));
		$form->addButton($this->getConfig()->get("M1"). " ". $this->getConfig()->get("Ammount1"). " ". $this->getConfig()->get("Mp1"). "$");
		$form->addButton($this->getConfig()->get("M2"). " ". $this->getConfig()->get("Ammount2"). " ". $this->getConfig()->get("Mp2"). "$");
		$form->addButton($this->getConfig()->get("M3"). " ". $this->getConfig()->get("Ammount3"). " ". $this->getConfig()->get("Mp3"). "$");
		$form->addButton($this->getConfig()->get("M4"). " ". $this->getConfig()->get("Ammount4"). " ". $this->getConfig()->get("Mp4"). "$");
		$form->addButton($this->getConfig()->get("M5"). " ". $this->getConfig()->get("Ammount5"). " ". $this->getConfig()->get("Mp5"). "$");
		$form->addButton($this->getConfig()->get("M6"). " ". $this->getConfig()->get("Ammount6"). " ". $this->getConfig()->get("Mp6"). "$");
		$form->addButton($this->getConfig()->get("M7"). " ". $this->getConfig()->get("Ammount7"). " ". $this->getConfig()->get("Mp7"). "$");
		$form->addButton($this->getConfig()->get("M8"). " ". $this->getConfig()->get("Ammount8"). " ". $this->getConfig()->get("Mp8"). "$");
		$form->addButton($this->getConfig()->get("M9"). " ". $this->getConfig()->get("Ammount9"). " ". $this->getConfig()->get("Mp9"). "$");
		$form->addButton($this->getConfig()->get("M10"). " ". $this->getConfig()->get("Ammount10"). " ". $this->getConfig()->get("Mp10"). "$");
		
		$form->sendToPlayer($player);
	}
	public function Armor(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($result === 0){
				if($money < $this->getConfig()->get("Ap1")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid1"), $this->getConfig()->get("Am1"), $this->getConfig()->get("Aa1")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap1"));
				$this->Form($player);
			}}
			if ($result === 1){
				if($money < $this->getConfig()->get("Ap2")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid2"), $this->getConfig()->get("Am2"), $this->getConfig()->get("Aa2")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap2"));
				$this->Form($player);
			}}
			if ($result === 2){
				if($money < $this->getConfig()->get("Ap3")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid3"), $this->getConfig()->get("Am3"), $this->getConfig()->get("Aa3")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap3"));
				$this->Form($player);
			}}
			if ($result === 3){
				if($money < $this->getConfig()->get("Ap4")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid4"), $this->getConfig()->get("Am4"), $this->getConfig()->get("4Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap4"));
				$this->Form($player);
			}}
			if ($result === 4){
				if($money < $this->getConfig()->get("Ap5")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid5"), $this->getConfig()->get("Am5"), $this->getConfig()->get("Aa5")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap5"));
				$this->Form($player);
			}}
			if ($result === 5){
			if($money < $this->getConfig()->get("Ap6")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid6"), $this->getConfig()->get("Am6"), $this->getConfig()->get("Aa6")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap6"));
				$this->Form($player);
			}}
			if ($result === 6){
				if($money < $this->getConfig()->get("Ap7")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid7"), $this->getConfig()->get("Am7"), $this->getConfig()->get("Aa7")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap7"));
				$this->Form($player);
			}}
			if ($result === 7){
				if($money < $this->getConfig()->get("Ap8")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid8"), $this->getConfig()->get("Am8"), $this->getConfig()->get("Aa8")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap8"));
				$this->Form($player);
			}}
			if ($result === 8){
				if($money < $this->getConfig()->get("Ap9")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid9"), $this->getConfig()->get("Am9"), $this->getConfig()->get("Aa9")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap9"));
				$this->Form($player);
			}}
			if ($result === 9){
				if($money < $this->getConfig()->get("Ap10")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid10"), $this->getConfig()->get("Am10"), $this->getConfig()->get("Aa10")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap10"));
				$this->Form($player);
			}}
			if ($result === 10){
				if($money < $this->getConfig()->get("Ap11")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid11"), $this->getConfig()->get("Am11"), $this->getConfig()->get("Aa11")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap11"));
				$this->Form($player);
			}}
		});
		$form->setTitle($this->getConfig()->get("Armor"));
		$form->setContent($this->getConfig()->get("Setup"));
		$form->addButton($this->getConfig()->get("A1"). " ". $this->getConfig()->get("Aa1"). " ". $this->getConfig()->get("Ap1"). "$");
		$form->addButton($this->getConfig()->get("A2"). " ". $this->getConfig()->get("Aa2"). " ". $this->getConfig()->get("Ap2"). "$");
		$form->addButton($this->getConfig()->get("A3"). " ". $this->getConfig()->get("Aa3"). " ". $this->getConfig()->get("Ap3"). "$");
		$form->addButton($this->getConfig()->get("A4"). " ". $this->getConfig()->get("Aa4"). " ". $this->getConfig()->get("Ap4"). "$");
		$form->addButton($this->getConfig()->get("A5"). " ". $this->getConfig()->get("Aa5"). " ". $this->getConfig()->get("Ap5"). "$");
		$form->addButton($this->getConfig()->get("A6"). " ". $this->getConfig()->get("Aa6"). " ". $this->getConfig()->get("Ap6"). "$");
		$form->addButton($this->getConfig()->get("A7"). " ". $this->getConfig()->get("Aa7"). " ". $this->getConfig()->get("Ap3"). "$");
		$form->addButton($this->getConfig()->get("A8"). " ". $this->getConfig()->get("Aa8"). " ". $this->getConfig()->get("Ap8"). "$");
		$form->addButton($this->getConfig()->get("A9"). " ". $this->getConfig()->get("Aa9"). " ". $this->getConfig()->get("Ap9"). "$");
		$form->addButton($this->getConfig()->get("A10"). " ". $this->getConfig()->get("Aa10"). " ". $this->getConfig()->get("Ap10"). "$");
		$form->addButton($this->getConfig()->get("A11"). " ". $this->getConfig()->get("Aa11"). " ". $this->getConfig()->get("Ap11"). "$");
		$form->sendToPlayer($player);
	}
	public function Keys(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($result === 0){
				if($money < $this->getConfig()->get("CommonPrice")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "key Common".$player->getName()."2");
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("CommonPrice"));
				$this->Form($player);
			}}
			if ($result === 1){
				if($money < $this->getConfig()->get("CommonvPrice")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "mb add". $player->getName(). "common 1");
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("CommonvPrice"));
				$this->Form($player);
			}}
			if ($result === 2){
				if($money < $this->getConfig()->get("UncommonPrice")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "mb add". $player->getName(). "uncommon 1");
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("UncommonPrice"));
				$this->Form($player);
			}}
			if ($result === 3){
				if($money < $this->getConfig()->get("LegendPrice")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "mb add". $player->getName(). "legend 1");
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("LegendPrice"));
				$this->Form($player);
			}}
			if ($result === 4){
				if($money < $this->getConfig()->get("MythicPrice")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "mb add". $player->getName(). "TP 1");
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("MythicPrice"));
				$this->Form($player);
			}}
		});
		$form->setTitle($this->getConfig()->get("Keys"));
		$form->setContent($this->getConfig()->get("Setup"));
		$form->addButton("Common Key 2 2000");
		$form->addButton("Virtual Common Key 1 5000");
		$form->addButton("Virtual unCommon Key 1 10000");
		$form->addButton("Virtual legend Key 1 20000");
		$form->addButton("Virtual Mythic Key 1 50000");
		$form->sendToPlayer($player);
	}
	public function Enchants(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($result === 0){
				if($money < $this->getConfig()->get("UnbreakingPrice1")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "enchant ". $player->getName(). " unbreaking 1");
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("UnbreakingPrice1"));
				$this->Form($player);
			}}
			if ($result === 1){
				if($money < $this->getConfig()->get("UnbreakingPrice2")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "enchant ". $player->getName(). " unbreaking 2");
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("UnbreakingPrice2"));
				$this->Form($player);
			}}
			if ($result === 2){
				if($money < $this->getConfig()->get("UnbreakingPrice5")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$this->getServer()->dispatchCommand(new ConsoleCommandSender(), "enchant ". $player->getName(). " unbreaking 5");
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("UnbreakingPrice5"));
				$this->Form($player);
			}}
		});
		$form->setTitle($this->getConfig()->get("Enchants"));
		$form->setContent($this->getConfig()->get("Setup"));
		$form->addButton("Unbreaking I");
		$form->addButton("Unbreaking II");
		$form->addButton("Unbreaking V");
		$form->sendToPlayer($player);
	}
	public function Question(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($result === 0){
				$this->Form($player);
			}
			if ($result === 1){
				$this->sellForm($player);
			}
		});
		$form->setTitle($this->getConfig()->get("Buy-Sell"));
		$form->setContent($this->getConfig()->get("Buy-Sell-question"));
		$form->addButton($this->getConfig()->get("Buy"));
		$form->addButton($this->getConfig()->get("Sell"));
		$form->sendToPlayer($player);
	}
	public function SellForm(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($result === 0 ){
				$this->SellFood($player);
			}
			if($result === 1){
				$this->SellBlocks($player);
			}
			if ($result === 2){
				$this->SellOres($player);
			}
			if($result === 3){
				$this->SellRaiding($player);
			}
			if($result === 4){
				$this->SellMisc($player);
			}
			if($result === 5){
				$this->SellArmor($player);
			}
        });
        $form->setTitle($this->getConfig()->get("Title"));
		if ($this->getConfig()->get("Enabled-Food") === true){
			$form->addButton($this->getConfig()->get("Food"));
			if ($this->getConfig()->get("Enabled-Blocks") === true){
				$form->addButton($this->getConfig()->get("Blocks"));
			if ($this->getConfig()->get("Enabled-Ores") === true){
				$form->addButton($this->getConfig()->get("Ores"));
			if ($this->getConfig()->get("Enabled-Raiding") === true){
				$form->addButton($this->getConfig()->get("Raiding"));
			if ($this->getConfig()->get("Enabled-Misc") === true){
				$form->addButton($this->getConfig()->get("Misc"));
			if ($this->getConfig()->get("Enabled-Armor") === true){
				$form->addButton($this->getConfig()->get("Armor"));
							}
						}
					}
				}
			}
		}
		$form->sendToPlayer($player);
	}
	public function SellFood(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($result === 0){
				if($money < $this->getConfig()->get("Food1Price")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Food1ID"), $this->getConfig()->get("Food1Met"), $this->getConfig()->get("Food1Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Food1Price"));
				$this->Question($player);
			}}
			if ($result === 1){
				if($money < $this->getConfig()->get("Food2Price")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Food2ID"), $this->getConfig()->get("Food2Met"), $this->getConfig()->get("Food2Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Food2Price"));
				$this->Question($player);
			}}
			if ($result === 2){
				if($money < $this->getConfig()->get("Food3Price")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Food3ID"), $this->getConfig()->get("Food3Met"), $this->getConfig()->get("Food3Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Food3Price"));
				$this->Question($player);
			}}
			if ($result === 3){
				if($money < $this->getConfig()->get("Food4Price")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Food4ID"), $this->getConfig()->get("Food4Met"), $this->getConfig()->get("Food4Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Food4Price"));
				$this->Question($player);
			}}
		});
		$form->setTitle($this->getConfig()->get("Food"));
		$form->setContent($this->getConfig()->get("Setup"));
		$form->addButton($this->getConfig()->get("Food1Name"). " ". $this->getConfig()->get("Food1Num"). " ". $this->getConfig()->get("Food1-Price"). "$");
		$form->addButton($this->getConfig()->get("Food2Name"). " ". $this->getConfig()->get("Food2Num"). " ". $this->getConfig()->get("Food2Price"). "$");
		$form->addButton($this->getConfig()->get("Food3Name"). " ". $this->getConfig()->get("Food3Num"). " ". $this->getConfig()->get("Food3Price"). "$");
		$form->addButton($this->getConfig()->get("Food4Name"). " ". $this->getConfig()->get("Food4Num"). " ". $this->getConfig()->get("Food4Price"). "$");
		$form->sendToPlayer($player);
	}
	public function SellOres(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($result === 0){
				if($money < $this->getConfig()->get("OrePrice1")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("OreID1"), $this->getConfig()->get("OreMeta1"), $this->getConfig()->get("OreAmmount1")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("OreSell1"));
				$this->Question($player);
			}}
			if ($result === 1){
				if($money < $this->getConfig()->get("OrePrice2")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("OreID2"), $this->getConfig()->get("OreMeta2"), $this->getConfig()->get("OreAmmount2")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("OreSell2"));
				$this->Question($player);
			}}
			if ($result === 2){
				if($money < $this->getConfig()->get("OrePrice3")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("OreID3"), $this->getConfig()->get("OreMeta3"), $this->getConfig()->get("OreAmmount3")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("OreSell3"));
				$this->Question($player);
			}}
			if ($result === 3){
				if($money < $this->getConfig()->get("OrePrice4")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("OreID4"), $this->getConfig()->get("OreMeta5"), $this->getConfig()->get("OreAmmount4")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("OreSell4"));
				$this->Question($player);
			}}
		});
		$form->setTitle($this->getConfig()->get("Ores"));
		$form->setContent($this->getConfig()->get("Setup"));
		$form->addButton($this->getConfig()->get("OreName1"). " ". $this->getConfig()->get("OreAmmount1"). " ". $this->getConfig()->get("OrePrice1"). "$");
		$form->addButton($this->getConfig()->get("OreName2"). " ". $this->getConfig()->get("OreAmmount2"). " ". $this->getConfig()->get("OrePrice2"). "$");
		$form->addButton($this->getConfig()->get("OreName3"). " ". $this->getConfig()->get("OreAmmount3"). " ". $this->getConfig()->get("OrePrice3"). "$");
		$form->addButton($this->getConfig()->get("OreName4"). " ". $this->getConfig()->get("OreAmmount4"). " ". $this->getConfig()->get("OrePrice4"). "$");
		$form->sendToPlayer($player);
	}
	public function SellBlocks(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($result === 0){
				if($money < $this->getConfig()->get("Price1")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Block1"), $this->getConfig()->get("BlockMeta1"), $this->getConfig()->get("Amount1")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Price1"));
				$this->Question($player);
			}}
			if ($result === 1){
				if($money < $this->getConfig()->get("Price2")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Block2"), $this->getConfig()->get("BlockMeta2"), $this->getConfig()->get("Amount2")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Price2"));
				$this->Question($player);
			}}
			if ($result === 2){
				if($money < $this->getConfig()->get("Price3")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Block3"), $this->getConfig()->get("BlockMeta3"), $this->getConfig()->get("Amount3")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Price3"));
				$this->Question($player);
			}}
			if ($result === 3){
				if($money < $this->getConfig()->get("Price4")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Block4"), $this->getConfig()->get("BlockMeta4"), $this->getConfig()->get("Amount4")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Price4"));
				$this->Question($player);
			}}
			if ($result === 4){
				if($money < $this->getConfig()->get("Price5")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Block5"), $this->getConfig()->get("BlockMeta5"), $this->getConfig()->get("Amount5")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Price5"));
			}}
			if ($result === 5){
				if($money < $this->getConfig()->get("Price6")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Block6"), $this->getConfig()->get("BlockMeta6"), $this->getConfig()->get("Amount6")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Price6"));
				$this->Question($player);
			}}
			if ($result === 6){
				if($money < $this->getConfig()->get("Price7")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Block7"), $this->getConfig()->get("BlockMeta7"), $this->getConfig()->get("Amount7")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Price7"));
				$this->Question($player);
			}}
			if ($result === 7){
				if($money < $this->getConfig()->get("Price8")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Block8"), $this->getConfig()->get("BlockMeta8"), $this->getConfig()->get("Amount8")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Price8"));
				$this->Question($player);
			}}
			if ($result === 8){
				if($money < $this->getConfig()->get("Price9")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Block9"), $this->getConfig()->get("BlockMeta9"), $this->getConfig()->get("Amount9")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Price9"));
				$this->Question($player);
			}}
			if ($result === 9){
				if($money < $this->getConfig()->get("Price10")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Block10"), $this->getConfig()->get("BlockMeta10"), $this->getConfig()->get("Amount10")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Price10"));
				$this->Question($player);
			}}
			if ($result === 10){
				if($money < $this->getConfig()->get("Price11")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Block11"), $this->getConfig()->get("BlockMeta11"), $this->getConfig()->get("Amount11")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Price11"));
				$this->Question($player);
			}}
			if ($result === 11){
				if($money < $this->getConfig()->get("Price12")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Block12"), $this->getConfig()->get("BlockMeta12"), $this->getConfig()->get("Amount12")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Price12"));
				$this->Question($player);
			}}
			if ($result === 12){
				if($money < $this->getConfig()->get("Price13")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Block13"), $this->getConfig()->get("BlockMeta13"), $this->getConfig()->get("Amount13")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Price13"));
				$this->Question($player);
			}}
			if ($result === 13){
				if($money < $this->getConfig()->get("Price14")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Block14"), $this->getConfig()->get("BlockMeta14"), $this->getConfig()->get("Amount14")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Price14"));
				$this->Question($player);
			}}
			if ($result === 14){
				if($money < $this->getConfig()->get("Price15")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Block15"), $this->getConfig()->get("BlockMeta15"), $this->getConfig()->get("Amount15")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Price15"));
				$this->Question($player);
			}}
			if ($result === 15){
				if($money < $this->getConfig()->get("Preice16")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Block16"), $this->getConfig()->get("BlockMeta16"), $this->getConfig()->get("Amount16")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Price16"));
				$this->Question($player);
			}}
		});
		$form->setTitle($this->getConfig()->get("Blocks"));
		$form->setContent($this->getConfig()->get("Setup"));
		$form->addButton($this->getConfig()->get("Name1"). " ". $this->getConfig()->get("Amount1"). " ". $this->getConfig()->get("Price1"). "$");
		$form->addButton($this->getConfig()->get("Name2"). " ". $this->getConfig()->get("Amount2"). " ". $this->getConfig()->get("Price2"). "$");
		$form->addButton($this->getConfig()->get("Name3"). " ". $this->getConfig()->get("Amount3"). " ". $this->getConfig()->get("Price3"). "$");
		$form->addButton($this->getConfig()->get("Name4"). " ". $this->getConfig()->get("Amount4"). " ". $this->getConfig()->get("Price4"). "$");
		$form->addButton($this->getConfig()->get("Name5"). " ". $this->getConfig()->get("Amount5"). " ". $this->getConfig()->get("Price5"). "$");
		$form->addButton($this->getConfig()->get("Name6"). " ". $this->getConfig()->get("Amount6"). " ". $this->getConfig()->get("Price6"). "$");
		$form->addButton($this->getConfig()->get("Name7"). " ". $this->getConfig()->get("Amount7"). " ". $this->getConfig()->get("Price7"). "$");
		$form->addButton($this->getConfig()->get("Name8"). " ". $this->getConfig()->get("Amount8"). " ". $this->getConfig()->get("Price8"). "$");
		$form->addButton($this->getConfig()->get("Name9"). " ". $this->getConfig()->get("Amount9"). " ". $this->getConfig()->get("Price9"). "$");
		$form->addButton($this->getConfig()->get("Name10"). " ". $this->getConfig()->get("Amount10"). " ". $this->getConfig()->get("Price10"). "$");
		$form->addButton($this->getConfig()->get("Name11"). " ". $this->getConfig()->get("Amount11"). " ". $this->getConfig()->get("Price11"). "$");
		$form->addButton($this->getConfig()->get("Name12"). " ". $this->getConfig()->get("Amount12"). " ". $this->getConfig()->get("Price12"). "$");
		$form->addButton($this->getConfig()->get("Name13"). " ". $this->getConfig()->get("Amount13"). " ". $this->getConfig()->get("Price13"). "$");
		$form->addButton($this->getConfig()->get("Name14"). " ". $this->getConfig()->get("Amount14"). " ". $this->getConfig()->get("Price14"). "$");
		$form->addButton($this->getConfig()->get("Name15"). " ". $this->getConfig()->get("Amount15"). " ". $this->getConfig()->get("Price15"). "$");
		$form->sendToPlayer($player);
	}
	public function SellRaiding(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($result === 0){
				if($money < $this->getConfig()->get("ItemPrice1")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("ItemID1"), $this->getConfig()->get("ItemMeta1"), $this->getConfig()->get("ItemAmmount1")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("ItemPrice1"));
				$this->Question($player);
			}}
			if ($result === 1){
				if($money < $this->getConfig()->get("ItemPrice2")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("ItemID2"), $this->getConfig()->get("ItemMeta2"), $this->getConfig()->get("ItemAmmount2")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("ItemPrice2"));
				$this->Question($player);
			}}
			if ($result === 2){
				if($money < $this->getConfig()->get("ItemPrice3")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("ItemID3"), $this->getConfig()->get("ItemMeta3"), $this->getConfig()->get("ItemAmmount3")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("ItemPrice3"));
				$this->Question($player);
			}}
			if ($result === 3){
				if($money < $this->getConfig()->get("ItemPrice4")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("ItemID4"), $this->getConfig()->get("ItemMeta4"), $this->getConfig()->get("Food4Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("ItemPrice4"));
				$this->Question($player);
			}}
			if ($result === 4){
				if($money < $this->getConfig()->get("ItemPrice5")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("ItemID5"), $this->getConfig()->get("ItemMeta5"), $this->getConfig()->get("ItemAmmount5")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("ItemPrice5"));
				$this->Question($player);
			}}
			if ($result === 5){
				if($money < $this->getConfig()->get("ItemPrice6")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("ItemID6"), $this->getConfig()->get("ItemMeta6"), $this->getConfig()->get("ItemAmmount6")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("ItemPrice6"));
				$this->Question($player);
			}}
			if ($result === 6){
				if($money < $this->getConfig()->get("ItemPrice7")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("ItemID7"), $this->getConfig()->get("ItemMeta7"), $this->getConfig()->get("ItemAmmount7")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("ItemPrice7"));
				$this->Question($player);
			}}
			if ($result === 7){
				if($money < $this->getConfig()->get("ItemPrice8")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("ItemID8"), $this->getConfig()->get("ItemMeta8"), $this->getConfig()->get("ItemAmmount8")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("ItemPrice8"));
				$this->Question($player);
			}}
		});
		$form->setTitle($this->getConfig()->get("Raiding"));
		$form->setContent($this->getConfig()->get("Setup"));
		$form->addButton($this->getConfig()->get("Item1"). " ". $this->getConfig()->get("ItemAmmount1"). " ". $this->getConfig()->get("ItemPrice1"). "$");
		$form->addButton($this->getConfig()->get("Item2"). " ". $this->getConfig()->get("ItemAmmount2"). " ". $this->getConfig()->get("ItemPrice2"). "$");
		$form->addButton($this->getConfig()->get("Item3"). " ". $this->getConfig()->get("ItemAmmount3"). " ". $this->getConfig()->get("ItemPrice3"). "$");
		$form->addButton($this->getConfig()->get("Item4"). " ". $this->getConfig()->get("ItemAmmount4"). " ". $this->getConfig()->get("ItemPrice4"). "$");
		$form->addButton($this->getConfig()->get("Item5"). " ". $this->getConfig()->get("ItemAmmount5"). " ". $this->getConfig()->get("ItemPrice5"). "$");
		$form->addButton($this->getConfig()->get("Item6"). " ". $this->getConfig()->get("ItemAmmount6"). " ". $this->getConfig()->get("ItemPrice6"). "$");
		$form->addButton($this->getConfig()->get("Item7"). " ". $this->getConfig()->get("ItemAmmount7"). " ". $this->getConfig()->get("ItemPrice7"). "$");
		$form->addButton($this->getConfig()->get("Item8"). " ". $this->getConfig()->get("ItemAmmount8"). " ". $this->getConfig()->get("ItemPrice8"). "$");
		$form->sendToPlayer($player);
	}
	public function SellMisc(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($result === 0){
				if($money < $this->getConfig()->get("Mp1")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Mid1"), $this->getConfig()->get("MM1"), $this->getConfig()->get("Ammount1")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Mp1"));
				$this->Question($player);
			}}
			if ($result === 1){
				if($money < $this->getConfig()->get("Mp2")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Mid2"), $this->getConfig()->get("MM2"), $this->getConfig()->get("Ammount2")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Mp2"));
				$this->Question($player);
			}}
			if ($result === 2){
				if($money < $this->getConfig()->get("Mp3")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Mid3"), $this->getConfig()->get("MM3"), $this->getConfig()->get("Ammount3")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Mp3"));
				$this->Question($player);
			}}
			if ($result === 3){
				if($money < $this->getConfig()->get("Mp4")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Mid4"), $this->getConfig()->get("MM4"), $this->getConfig()->get("4Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Mp4"));
				$this->Question($player);
			}}
			if ($result === 4){
				if($money < $this->getConfig()->get("Mp5")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Mid5"), $this->getConfig()->get("MM5"), $this->getConfig()->get("Ammount5")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Mp5"));
				$this->Question($player);
			}}
			if ($result === 5){
				if($money < $this->getConfig()->get("Mp6")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Mid6"), $this->getConfig()->get("MM6"), $this->getConfig()->get("Ammount6")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Mp6"));
				$this->Question($player);
			}}
			if ($result === 6){
				if($money < $this->getConfig()->get("Mp7")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Mid7"), $this->getConfig()->get("MM7"), $this->getConfig()->get("Ammount7")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Mp7"));
				$this->Question($player);
			}}
			if ($result === 7){
				if($money < $this->getConfig()->get("Mp8")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Mid8"), $this->getConfig()->get("MM8"), $this->getConfig()->get("Ammount8")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Mp8"));
				$this->Question($player);
			}}
			if ($result === 8){
				if($money < $this->getConfig()->get("Mp9")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Mid9"), $this->getConfig()->get("MM9"), $this->getConfig()->get("Ammount9")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Mp9"));
				$this->Question($player);
			}}
			if ($result === 9){
				if($money < $this->getConfig()->get("Mp10")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Mid10"), $this->getConfig()->get("MM10"), $this->getConfig()->get("Ammount10")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Mp10"));
				$this->Question($player);
			}}
		});
		$form->setTitle($this->getConfig()->get("Misc"));
		$form->setContent($this->getConfig()->get("Setup"));
		$form->addButton($this->getConfig()->get("M1"). " ". $this->getConfig()->get("Ammount1"). " ". $this->getConfig()->get("Mp1"). "$");
		$form->addButton($this->getConfig()->get("M2"). " ". $this->getConfig()->get("Ammount2"). " ". $this->getConfig()->get("Mp2"). "$");
		$form->addButton($this->getConfig()->get("M3"). " ". $this->getConfig()->get("Ammount3"). " ". $this->getConfig()->get("Mp3"). "$");
		$form->addButton($this->getConfig()->get("M4"). " ". $this->getConfig()->get("Ammount4"). " ". $this->getConfig()->get("Mp4"). "$");
		$form->addButton($this->getConfig()->get("M5"). " ". $this->getConfig()->get("Ammount5"). " ". $this->getConfig()->get("Mp5"). "$");
		$form->addButton($this->getConfig()->get("M6"). " ". $this->getConfig()->get("Ammount6"). " ". $this->getConfig()->get("Mp6"). "$");
		$form->addButton($this->getConfig()->get("M7"). " ". $this->getConfig()->get("Ammount7"). " ". $this->getConfig()->get("Mp7"). "$");
		$form->addButton($this->getConfig()->get("M8"). " ". $this->getConfig()->get("Ammount8"). " ". $this->getConfig()->get("Mp8"). "$");
		$form->addButton($this->getConfig()->get("M9"). " ". $this->getConfig()->get("Ammount9"). " ". $this->getConfig()->get("Mp9"). "$");
		$form->addButton($this->getConfig()->get("M10"). " ". $this->getConfig()->get("Ammount10"). " ". $this->getConfig()->get("Mp10"). "$");
		
		$form->sendToPlayer($player);
	}
	public function SellArmor(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			$money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($player);
			if ($result === 0){
				if($money < $this->getConfig()->get("Ap1")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Aid1"), $this->getConfig()->get("Am1"), $this->getConfig()->get("Aa1")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Ap1"));
				$this->Question($player);
			}}
			if ($result === 1){
				if($money < $this->getConfig()->get("Ap2")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Aid2"), $this->getConfig()->get("Am2"), $this->getConfig()->get("Aa2")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Ap2"));
				$this->Question($player);
			}}
			if ($result === 2){
				if($money < $this->getConfig()->get("Ap3")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Aid3"), $this->getConfig()->get("Am3"), $this->getConfig()->get("Aa3")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Ap3"));
				$this->Question($player);
			}}
			if ($result === 3){
				if($money < $this->getConfig()->get("Ap4")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Aid4"), $this->getConfig()->get("Am4"), $this->getConfig()->get("4Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Ap4"));
				$this->Question($player);
			}}
			if ($result === 4){
				if($money < $this->getConfig()->get("Ap5")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Aid5"), $this->getConfig()->get("Am5"), $this->getConfig()->get("Aa5")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Ap5"));
				$this->Question($player);
			}}
			if ($result === 5){
			if($money < $this->getConfig()->get("Ap6")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Aid6"), $this->getConfig()->get("Am6"), $this->getConfig()->get("Aa6")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Ap6"));
				$this->Question($player);
			}}
			if ($result === 6){
				if($money < $this->getConfig()->get("Ap7")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Aid7"), $this->getConfig()->get("Am7"), $this->getConfig()->get("Aa7")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Ap7"));
				$this->Question($player);
			}}
			if ($result === 7){
				if($money < $this->getConfig()->get("Ap8")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Aid8"), $this->getConfig()->get("Am8"), $this->getConfig()->get("Aa8")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Ap8"));
				$this->Question($player);
			}}
			if ($result === 8){
				if($money < $this->getConfig()->get("Ap9")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Aid9"), $this->getConfig()->get("Am9"), $this->getConfig()->get("Aa9")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Ap9"));
				$this->Question($player);
			}}
			if ($result === 9){
				if($money < $this->getConfig()->get("Ap10")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Aid10"), $this->getConfig()->get("Am10"), $this->getConfig()->get("Aa10")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Ap10"));
				$this->Question($player);
			}}
			if ($result === 10){
				if($money < $this->getConfig()->get("Ap11")) {
					$player->sendMessage(TF::RED . $this->getConfig()->get("Money"));
				}else {
				$player->getInventory()->removeItem(Item::get($this->getConfig()->get("Aid11"), $this->getConfig()->get("Am11"), $this->getConfig()->get("Aa11")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player->getName(), $this->getConfig()->get("Ap11"));
				$this->Question($player);
			}}
		});
		$form->setTitle($this->getConfig()->get("Armor"));
		$form->setContent($this->getConfig()->get("Setup"));
		$form->addButton($this->getConfig()->get("A1"). " ". $this->getConfig()->get("Aa1"). " ". $this->getConfig()->get("Ap1"). "$");
		$form->addButton($this->getConfig()->get("A2"). " ". $this->getConfig()->get("Aa2"). " ". $this->getConfig()->get("Ap2"). "$");
		$form->addButton($this->getConfig()->get("A3"). " ". $this->getConfig()->get("Aa3"). " ". $this->getConfig()->get("Ap3"). "$");
		$form->addButton($this->getConfig()->get("A4"). " ". $this->getConfig()->get("Aa4"). " ". $this->getConfig()->get("Ap4"). "$");
		$form->addButton($this->getConfig()->get("A5"). " ". $this->getConfig()->get("Aa5"). " ". $this->getConfig()->get("Ap5"). "$");
		$form->addButton($this->getConfig()->get("A6"). " ". $this->getConfig()->get("Aa6"). " ". $this->getConfig()->get("Ap6"). "$");
		$form->addButton($this->getConfig()->get("A7"). " ". $this->getConfig()->get("Aa7"). " ". $this->getConfig()->get("Ap3"). "$");
		$form->addButton($this->getConfig()->get("A8"). " ". $this->getConfig()->get("Aa8"). " ". $this->getConfig()->get("Ap8"). "$");
		$form->addButton($this->getConfig()->get("A9"). " ". $this->getConfig()->get("Aa9"). " ". $this->getConfig()->get("Ap9"). "$");
		$form->addButton($this->getConfig()->get("A10"). " ". $this->getConfig()->get("Aa10"). " ". $this->getConfig()->get("Ap10"). "$");
		$form->addButton($this->getConfig()->get("A11"). " ". $this->getConfig()->get("Aa11"). " ". $this->getConfig()->get("Ap11"). "$");
		$form->sendToPlayer($player);
	}
}
