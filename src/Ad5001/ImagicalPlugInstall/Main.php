<?php
namespace Ad5001\ImagicalPlugInstaller;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{
  public function onEnable(){
	  $this->getLogger()->info("Enabled!");
  }
  public function onLoad(){
	  $this->getLogger()->info("Loaded!");
  }
  public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
    switch($cmd->getName()){
		case "installpl":
		if(empty($args)) {
			return false;
		} else {
			copy("http://plugins.ad5001.ga/list/" . $args[0] . ".phar", $this->getServer()->getDataPath() . "plugins/" . $args[0] . ".phar");
			if(!file_exists($this->getServer()->getDataPath() . "plugins/" . $args[0] . ".phar")) {
				$sender->sendMessage("No plugin found with name $args[0]");
			} else {
			$sender->sendMessage($args[0] . " has been insalled (if this is an invalid plugin name, it won't load.) restart/reload your server and enjoy!");
			}
			return true;
			break;
		}
    }
    return false;
  }
}
