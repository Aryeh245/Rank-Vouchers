<?php

namespace RankVoucher;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat as TF;

class Main extends PluginBase implements Listener {

	public function onLoad() {
		
		$this->getServer()->getLogger()->notice("Rank Voucher Enabled");
	}
	
	public function onEnable() {
		
		$this->getServer()->getLogger()->notice("Rank Voucher has been enabled! Made by MonkleeGamer");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);	
	}

	public function onDisable() {
		
		$this->getServer()->getLogger()->notice("Rank Voucher Disabled");
	}
	
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
		
		if(strtolower($command->getName()) === "voucher") {
			
			if(count($args) < 2) {
			
				$sender->sendMessage(TF::GRAY . "§9Please use: §e/voucher (player) (rank)");
				$sender->sendMessage(TF::GRAY . "§9Available Ranks:");
				$sender->sendMessage(TF::GRAY . "§Titan, lord, OverLord, Mythic");
				$sender->sendMessage(TF::GRAY . "§9Plugin Made by MonkleeGamer");
				return true;
			}
			if($sender->hasPermission("voucher.command") || $sender->isOp()){
				
				if(isset($args[0])) {
				
					$player = $sender->getServer()->getPlayer($args[0]);
					
					if(isset($args[1])) {
						
						switch($args[1]) {
							
							case 1:
							case "Titan":
							$book1 = Item::get(Item::BOOK, 101, 1);
							$book1->setCustomName(TF::RED . "§l§aTitan Voucher" . PHP_EOL . 
							TF::DARK_GRAY . " §9Click to redeem the §aTitan§9 Rank Voucher");
							
							$player->getInventory()->addItem($book1);
							
							break;
							
							case 2:
							case "Lord":
							$book2 = Item::get(Item::BOOK, 102, 1);
							$book2->setCustomName(TF::RED . "§l§bLord Voucher" . PHP_EOL . 
							TF::DARK_GRAY . " §9Click to redeem the §bLord§9 Rank Voucher");
							
							$player->getInventory()->addItem($book2);
							
							break;
							
							case 3:
							case "OverLord":
							$book3 = Item::get(Item::BOOK, 103, 1);
							$book3->setCustomName(TF::RED . "§l§cOverLord Voucher" . PHP_EOL . 
							TF::DARK_GRAY . " §9Click to redeem the §cOverLord§9 Rank Voucher");
							
							$player->getInventory()->addItem($book3);
							
							break;
							
							case 4:
							case "Omega":
							$book4 = Item::get(Item::BOOK, 104, 1);
							$book4->setCustomName(TF::RED . "§l§dOmega Voucher" . PHP_EOL . 
							TF::DARK_GRAY . " §9Click to redeem the §9Omega§9 Rank Voucher");
							
							$player->getInventory()->addItem($book4);
							
							break;
							
							case 5:
							case "Mythic":
							$book5= Item::get(Item::BOOK, 105, 1);
							$book5->setCustomName(TF::RED . "§l§eMythic Voucher" . PHP_EOL . 
							TF::DARK_GRAY . " §9Click to redeem the §eMythic§9 Rank Voucher");
							
							$player->getInventory()->addItem($book5);
							
							break;
						}
					}
				}
			}
			
			if(!$sender->hasPermission("voucher.command")) {
				
				$sender->sendMessage(TF::GRAY . "§9You don't have permission to use this command.");
				
			}
			
			else {
				
				$sender->sendMessage(TF::GRAY . "§9You have been given a Rank Voucher");
				
			}
		}
		
		return true;
		
	}
	
	public function onInteract(PlayerInteractEvent $event) {
		
		$player = $event->getPlayer();
		
		if($event->getItem()->getId() === 340) {
		
			$damage = $event->getItem()->getDamage();
			
			switch($damage) {
				
				case 101:
                                case Titan:
				
				$book1 = Item::get(Item::BOOK, 101, 1);

				$pperms = $this->getServer()->getPluginManager()->getPlugin("PurePerms");

                                $group = $pperms->getGroup("Titan");
                                $pperms->setGroup($player, $group);

				$player->sendMessage(TF::BOLD . TF::DARK_GRAY . "§9You have redeemed the §aTitan§9 Rank Voucher");
				$player->getInventory()->removeItem($book1);
				
				break;
				
				case 102:
                                case Lord:
				
				$book2 = Item::get(Item::BOOK, 102, 1);

				$pperms = $this->getServer()->getPluginManager()->getPlugin("PurePerms");

                                $group = $pperms->getGroup("Lord");
                                $pperms->setGroup($player, $group);

				$player->sendMessage(TF::BOLD . TF::DARK_GRAY . "§9You have redeemed the §bLord§9 Rank Voucher");
				$player->getInventory()->removeItem($book2);
				
				break;
				
				case 103:
                                case OverLord:
				
				$book3 = Item::get(Item::BOOK, 103, 1);

				$pperms = $this->getServer()->getPluginManager()->getPlugin("PurePerms");

                                $group = $pperms->getGroup("OverLord");
                                $pperms->setGroup($player, $group);

				$player->sendMessage(TF::BOLD . TF::DARK_GRAY . "§9You have redeemed the §cOverLord§9 Rank Voucher");
				$player->getInventory()->removeItem($book3);
				
				break;

				
				case 104:
                                case Omega:
				
				$book4 = Item::get(Item::BOOK, 104, 1);

				$pperms = $this->getServer()->getPluginManager()->getPlugin("PurePerms");

                                $group = $pperms->getGroup("Omega");
                                $pperms->setGroup($player, $group);

				$player->sendMessage(TF::BOLD . TF::DARK_GRAY . "§9You have redeemed the §dOmega§9 Rank Voucher");
				$player->getInventory()->removeItem($book4);
				
				break;

				
				case 105:
                                case Mythic:
				
				$book5 = Item::get(Item::BOOK, 105, 1);

				$pperms = $this->getServer()->getPluginManager()->getPlugin("PurePerms");

                                $group = $pperms->getGroup("Mythic");
                                $pperms->setGroup($player, $group);

				$player->sendMessage(TF::BOLD . TF::DARK_GRAY . "§9You have redeemed the §eMythic§9 Rank Voucher");
				$player->getInventory()->removeItem($book5);
				
				break;
				
			}
		}
	}
}		
