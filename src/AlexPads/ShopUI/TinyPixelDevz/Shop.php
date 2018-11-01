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
                    $this->Form($sender);
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
			if ($result === 0 ){
				$this->Food($player);
			}
			if($result === 1){
				$this->Blocks($player);
			}
			if($result === 2){
				$this->Raiding($player);
			}
			if($result === 3){
				$this->Misc($player);
			}
			if($result === 4){
				$this->Blocks($player);
			}
			if($result === 5){
				$this->Blocks($player);
			}
        });
        $form->setTitle($this->getConfig()->get("Title"));
		$form->addButton($this->getConfig()->get("Food"));
		$form->addButton($this->getConfig()->get("Blocks"));
		$form->addButton($this->getConfig()->get("Raiding"));
		$form->addButton($this->getConfig()->get("Misc"));
		$form->sendToPlayer($player);
		}
	public function Food(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			if ($result === 0){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Food1ID"), $this->getConfig()->get("Food1Met"), $this->getConfig()->get("Food1Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Food1Price"));
				$this->Form($player);
			}
			if ($result === 1){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Food2ID"), $this->getConfig()->get("Food2Met"), $this->getConfig()->get("Food2Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Food2Price"));
				$this->Form($player);
			}
			if ($result === 2){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Food3ID"), $this->getConfig()->get("Food3Met"), $this->getConfig()->get("Food3Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Food3Price"));
				$this->Form($player);
			}
			if ($result === 3){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Food4ID"), $this->getConfig()->get("Food4Met"), $this->getConfig()->get("Food4Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Food4Price"));
				$this->Form($player);
			}
		});
		$form->setTitle("Food");
		$form->addButton($this->getConfig()->get("Food1Name"));
		$form->addButton($this->getConfig()->get("Food2Name"));
		$form->addButton($this->getConfig()->get("Food3Name"));
		$form->addButton($this->getConfig()->get("Food4Name"));
		$form->sendToPlayer($player);
	}
	public function Blocks(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			if ($result === 0){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block1"), $this->getConfig()->get("BlockMeta1"), $this->getConfig()->get("Amount1")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price1"));
				$this->Form($player);
			}
			if ($result === 1){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block2"), $this->getConfig()->get("BlockMeta2"), $this->getConfig()->get("Amount2")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price2"));
				$this->Form($player);
			}
			if ($result === 2){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block3"), $this->getConfig()->get("BlockMeta3"), $this->getConfig()->get("Amount3")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price3"));
				$this->Form($player);
			}
			if ($result === 3){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block4"), $this->getConfig()->get("BlockMeta4"), $this->getConfig()->get("Amount4")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price4"));
				$this->Form($player);
			}
			if ($result === 4){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block5"), $this->getConfig()->get("BlockMeta5"), $this->getConfig()->get("Amount5")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price5"));
			}
			if ($result === 5){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block6"), $this->getConfig()->get("BlockMeta6"), $this->getConfig()->get("Amount6")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price6"));
				$this->Form($player);
			}
			if ($result === 6){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block7"), $this->getConfig()->get("BlockMeta7"), $this->getConfig()->get("Amount7")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price7"));
				$this->Form($player);
			}
			if ($result === 7){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block8"), $this->getConfig()->get("BlockMeta8"), $this->getConfig()->get("Amount8")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price8"));
				$this->Form($player);
			}
			if ($result === 8){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block9"), $this->getConfig()->get("BlockMeta9"), $this->getConfig()->get("Amount9")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price9"));
				$this->Form($player);
			}
			if ($result === 9){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block10"), $this->getConfig()->get("BlockMeta10"), $this->getConfig()->get("Amount10")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price10"));
				$this->Form($player);
			}
			if ($result === 10){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block11"), $this->getConfig()->get("BlockMeta11"), $this->getConfig()->get("Amount11")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price11"));
				$this->Form($player);
			}
			if ($result === 11){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block12"), $this->getConfig()->get("BlockMeta12"), $this->getConfig()->get("Amount12")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price12"));
				$this->Form($player);
			}
			if ($result === 12){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block13"), $this->getConfig()->get("BlockMeta13"), $this->getConfig()->get("Amount13")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price13"));
				$this->Form($player);
			}
			if ($result === 13){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block14"), $this->getConfig()->get("BlockMeta14"), $this->getConfig()->get("Amount14")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price14"));
				$this->Form($player);
			}
			if ($result === 14){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block15"), $this->getConfig()->get("BlockMeta15"), $this->getConfig()->get("Amount15")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price15"));
				$this->Form($player);
			}
			if ($result === 15){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Block16"), $this->getConfig()->get("BlockMeta16"), $this->getConfig()->get("Amount16")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Price16"));
				$this->Form($player);
			}
		});
		$form->setTitle($this->getConfig()->get("Blocks"));
		$form->addButton($this->getConfig()->get("Name1"));
		$form->addButton($this->getConfig()->get("Name2"));
		$form->addButton($this->getConfig()->get("Name3"));
		$form->addButton($this->getConfig()->get("Name4"));
		$form->addButton($this->getConfig()->get("Name5"));
		$form->addButton($this->getConfig()->get("Name6"));
		$form->addButton($this->getConfig()->get("Name7"));
		$form->addButton($this->getConfig()->get("Name8"));
		$form->addButton($this->getConfig()->get("Name9"));
		$form->addButton($this->getConfig()->get("Name10"));
		$form->addButton($this->getConfig()->get("Name11"));
		$form->addButton($this->getConfig()->get("Name12"));
		$form->addButton($this->getConfig()->get("Name13"));
		$form->addButton($this->getConfig()->get("Name14"));
		$form->addButton($this->getConfig()->get("Name15"));
		$form->sendToPlayer($player);
	}
	public function Raiding(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			if ($result === 0){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("ItemID1"), $this->getConfig()->get("ItemMeta1"), $this->getConfig()->get("ItemAmmount1")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("ItemPrice1"));
				$this->Form($player);
			}
			if ($result === 1){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("ItemID2"), $this->getConfig()->get("ItemMeta2"), $this->getConfig()->get("ItemAmmount2")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("ItemPrice2"));
				$this->Form($player);
			}
			if ($result === 2){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("ItemID3"), $this->getConfig()->get("ItemMeta3"), $this->getConfig()->get("ItemAmmount3")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("ItemPrice3"));
				$this->Form($player);
			}
			if ($result === 3){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("ItemID4"), $this->getConfig()->get("ItemMeta4"), $this->getConfig()->get("Food4Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("ItemPrice4"));
				$this->Form($player);
			}
			if ($result === 4){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("ItemID5"), $this->getConfig()->get("ItemMeta5"), $this->getConfig()->get("ItemAmmount5")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("ItemPrice5"));
				$this->Form($player);
			}
			if ($result === 5){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("ItemID6"), $this->getConfig()->get("ItemMeta6"), $this->getConfig()->get("ItemAmmount6")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("ItemPrice6"));
				$this->Form($player);
			}
			if ($result === 6){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("ItemID7"), $this->getConfig()->get("ItemMeta7"), $this->getConfig()->get("ItemAmmount7")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("ItemPrice7"));
				$this->Form($player);
			}
			if ($result === 7){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("ItemID8"), $this->getConfig()->get("ItemMeta8"), $this->getConfig()->get("ItemAmmount8")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("ItemPrice8"));
				$this->Form($player);
			}
		});
		$form->setTitle($this->getConfig()->get("Raiding"));
		$form->addButton($this->getConfig()->get("Item1"));
		$form->addButton($this->getConfig()->get("Item2"));
		$form->addButton($this->getConfig()->get("Item3"));
		$form->addButton($this->getConfig()->get("Item4"));
		$form->addButton($this->getConfig()->get("Item5"));
		$form->addButton($this->getConfig()->get("Item6"));
		$form->addButton($this->getConfig()->get("Item7"));
		$form->addButton($this->getConfig()->get("Item8"));
		$form->sendToPlayer($player);
	}
	public function Misc(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			if ($result === 0){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid1"), $this->getConfig()->get("MM1"), $this->getConfig()->get("Ammount1")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp1"));
				$this->Form($player);
			}
			if ($result === 1){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid2"), $this->getConfig()->get("MM2"), $this->getConfig()->get("Ammount2")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp2"));
				$this->Form($player);
			}
			if ($result === 2){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid3"), $this->getConfig()->get("MM3"), $this->getConfig()->get("Ammount3")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp3"));
				$this->Form($player);
			}
			if ($result === 3){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid4"), $this->getConfig()->get("MM4"), $this->getConfig()->get("4Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp4"));
				$this->Form($player);
			}
			if ($result === 4){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid5"), $this->getConfig()->get("MM5"), $this->getConfig()->get("Ammount5")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp5"));
				$this->Form($player);
			}
			if ($result === 5){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid6"), $this->getConfig()->get("MM6"), $this->getConfig()->get("Ammount6")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp6"));
				$this->Form($player);
			}
			if ($result === 6){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid7"), $this->getConfig()->get("MM7"), $this->getConfig()->get("Ammount7")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp7"));
				$this->Form($player);
			}
			if ($result === 7){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid8"), $this->getConfig()->get("MM8"), $this->getConfig()->get("Ammount8")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp8"));
				$this->Form($player);
			}
			if ($result === 8){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid9"), $this->getConfig()->get("MM9"), $this->getConfig()->get("Ammount9")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp9"));
				$this->Form($player);
			}
			if ($result === 9){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Mid10"), $this->getConfig()->get("MM10"), $this->getConfig()->get("Ammount10")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Mp10"));
				$this->Form($player);
			}
		});
		$form->setTitle($this->getConfig()->get("Misc"));
		$form->addButton($this->getConfig()->get("M1"));
		$form->addButton($this->getConfig()->get("M2"));
		$form->addButton($this->getConfig()->get("M3"));
		$form->addButton($this->getConfig()->get("M4"));
		$form->addButton($this->getConfig()->get("M5"));
		$form->addButton($this->getConfig()->get("M6"));
		$form->addButton($this->getConfig()->get("M7"));
		$form->addButton($this->getConfig()->get("M8"));
		$form->addButton($this->getConfig()->get("M9"));
		$form->addButton($this->getConfig()->get("M10"));
		$form->sendToPlayer($player);
	}
	public function Armor(Player $player) : void{
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function(Player $player, int $data = null){
            $result = $data;
			if ($result === 0){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid1"), $this->getConfig()->get("Am1"), $this->getConfig()->get("Aa1")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap1"));
				$this->Form($player);
			}
			if ($result === 1){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid2"), $this->getConfig()->get("Am2"), $this->getConfig()->get("Aa2")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap2"));
				$this->Form($player);
			}
			if ($result === 2){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid3"), $this->getConfig()->get("Am3"), $this->getConfig()->get("Aa3")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap3"));
				$this->Form($player);
			}
			if ($result === 3){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid4"), $this->getConfig()->get("Am4"), $this->getConfig()->get("4Num")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap4"));
				$this->Form($player);
			}
			if ($result === 4){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid5"), $this->getConfig()->get("Am5"), $this->getConfig()->get("Aa5")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap5"));
				$this->Form($player);
			}
			if ($result === 5){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid6"), $this->getConfig()->get("Am6"), $this->getConfig()->get("Aa6")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap6"));
				$this->Form($player);
			}
			if ($result === 6){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid7"), $this->getConfig()->get("Am7"), $this->getConfig()->get("Aa7")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap7"));
				$this->Form($player);
			}
			if ($result === 7){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid8"), $this->getConfig()->get("Am8"), $this->getConfig()->get("Aa8")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap8"));
				$this->Form($player);
			}
			if ($result === 8){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid9"), $this->getConfig()->get("Am9"), $this->getConfig()->get("Aa9")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap9"));
				$this->Form($player);
			}
			if ($result === 9){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid10"), $this->getConfig()->get("Am10"), $this->getConfig()->get("Aa10")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap10"));
				$this->Form($player);
			}
			if ($result === 10){
				$player->getInventory()->addItem(Item::get($this->getConfig()->get("Aid11"), $this->getConfig()->get("Am11"), $this->getConfig()->get("Aa11")));
				$this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($player->getName(), $this->getConfig()->get("Ap11"));
				$this->Form($player);
			}
		});
		$form->setTitle($this->getConfig()->get("Armor"));
		$form->addButton($this->getConfig()->get("A1"));
		$form->addButton($this->getConfig()->get("A2"));
		$form->addButton($this->getConfig()->get("A3"));
		$form->addButton($this->getConfig()->get("A4"));
		$form->addButton($this->getConfig()->get("A5"));
		$form->addButton($this->getConfig()->get("A6"));
		$form->addButton($this->getConfig()->get("A7"));
		$form->addButton($this->getConfig()->get("A8"));
		$form->addButton($this->getConfig()->get("A9"));
		$form->addButton($this->getConfig()->get("A10"));
		$form->addButton($this->getConfig()->get("A11"));
		$form->sendToPlayer($player);
	}
}
