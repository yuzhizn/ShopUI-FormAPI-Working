<?php

namespace AlexPads\ShopUI\SaltyPixelDevz\command;

use TinyPixelDevz\SkyBlock\AlexPads\islandui;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class sbcommand extends PluginCommand
{

	public function __construct(string $name, islandui $plugin)
	{
		parent::__construct($name, $plugin);
		$this->setDescription("Access the skyblock UI");
		$this->setPermission("sbui.command.access");
		$this->setUsage("/sb");
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args)
	{
		$plugin = $this->getPlugin();
		if ($plugin instanceof islandui) {
			if ($sender instanceof Player) {
				$plugin->islandForm($sender);
				return;
			}
			$sender->sendMessage(TextFormat::RED . "Please use this in-game.");
			return;
		}
	}
}