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

    class teamwork implements plugin{

    private $api;

    public function __construct(ServerAPI $api, $server = false){

		$this->api = $api;

	}

	public function init(){

    $this->api->addHandler("player.death", array($this, "eventHandler"), 100);

    }
       public function eventHandler($data, $event)
    {
 
 switch($event)
    {
        case 'player.death':
        
            $this->api->console->run("kill @all");
			       

            $data['player']->sendChat("Do TEAM-WORK");

        
        break;
		
    }
    }

    public function __destruct(){

    }

}

