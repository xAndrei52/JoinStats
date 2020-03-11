<?php

namespace JoinStats;


use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\TextFormat as C;
use jojoe777\FormAPI\SimpleForm;

class Main extends PluginBase implements Listener {
	 public function onEnable(){
		 $this->getServer()->getPluginManager()->registerEvents($this, $this);
		 $this->getLogger()->Info(C::GREEN. "JoinStats Enabled!";
     }
     
     public function onJoin(PlayerJoinEvent $event){
     	$player = $event->getPlayer();
         $this->MenuForm($player);
     }
     
     public function MenuForm($sender){
     	$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
         $form = $api->createSimpleForm(function (Player $sender, int $data = null) {
         	$result = $data;
             if($result === null){
             	return true;
             }
             switch($result){
             	case 0:
            $this->rulesForm($sender);
             break;
             case 1:
            $this->voteForm($sender);
             break;
            }
            
            
            });
            $form->setTitle("§l§eKP§bPE")
            $player = $sender->getName();
            $form->setContent("§rHi, §3$player! §bWelcome to §cour amazing server!\n§cSo you need to be respectful \n §6And to be, \n§eClick on Rules!");
            $form->addButton("§o§eRules");
            $form->addButton("§o§6Vote");
            
            $form->addButton("§1Ok, i understandoo!");
            $form->sendToPlayer($sender);
            return $form;
     }
     
     public function rulesForm($sender){
     	$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
         $form = $api->createSimpleForm(function (Player $sender, int $data = null) {
         	$result = $data;
             if($result === null){
             	return true;
             }
             switch($result){
             	case 0:
             $this->MenuForm($sender);
                 break;
              }
              
              
              });
              $form->setTitle("§7Server Rules");
              $player = $sender->getName();
              $form->setContent("§dRules are simple! : \n§cDon't scam\n§cDon't FLY In pvp with /fly!\n§cDon't swear\n§cBe respectful\n§cREPORT §lBugs or you will be \n§l§cPunished from server if you don't tell any staff!");
              
              $form->addButton("§l§eBack Page");
              $form->sendToPlayer($sender);
              return $form;
    }
    
    
   public function voteForm($sender){
   	$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
       $this = $api->createSimpleForm(function (Player $sender, int $data = null) {
       	$result = $data;
           if($result === null){
           	return true;
           }
           switch($result){
           	case 0:
           $this->MenuForm($sender);
              break;
           }
           
           
           });
           $form->setTitle("§7Vote");
           $player = $sender->getName();
           $form->setContent("§6Hey, §e$player \n\n\n§cSadly Vote,\n §cis not implemented now. But when\n§cWe will implement\n§cLink will be here!\n§cThanks!");
           
           $form->addButton("§eBack Page");
           $form->sendToPlayer($sender);
           return $form
    }
}
