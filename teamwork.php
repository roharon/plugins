<?php

/*
__PocketMine Plugin__
name=teamwork
description=do teamwork
version=1.0
author=ashead1
class=teamwork
apiversion=10,11,12
*/

/* 

If you want to tweet to ashead1
@shdkfhs98

E-MAIL : roharon@naver.com 

( -> = next   => = modify )
==TEAM-WORK plug-in logged==
 -1.0-
 died->all players be died
 all died with broadcast to issuer
 
 -2.0-
  all died with broadcast to issuer => broadcast to everyone.
  player.gamemode.change -> everyone have been gamemode to survival(also, issuer too)
 
 */

    class teamwork implements plugin{

    private $api;

    public function __construct(ServerAPI $api, $server = false){

		$this->api = $api;

	}

	public function init(){

    $this->api->addHandler("player.death", array($this, "eventHandler"), 100);
	$this->api->addHandler("player.gamemode.change", array($this, "eventHandler"), 100);

    }
       public function eventHandler($data, $event)
    {
 
 switch($event)
    {
        case 'player.death':
        
            $this->api->console->run("kill @all");	
			 $this->api->chat->broadcast("Do TEAM-WORK");
		case 'player.gamemode.change':
			
			$this->api->chat->broadcast("Everybody change to survival");
			$this->api->console->run("gamemode 0 @all");
			
        
        break;
		
    }
    }

    public function __destruct(){

    }

}

