<?php

declare(strict_types=1);

namespace Framework\Model;

use Framework\Connector;

class VirtualServer extends AbstractVirtualServer
{
    private $conn;
    
    public function __construct($response = null)
    {   
        if(!$response){
            $this->conn = new Connector();
            $response = $this->conn->send("serverlist");
        }
        $this->id = intval($response['virtualserver_id']);
        $this->port = intval($response['virtualserver_port']);
        $this->status = $response['virtualserver_status'];
        $this->clientsonline = intval($response['virtualserver_clientsonline']);
        $this->queryclientsonline = intval($response['virtualserver_queryclientsonline']);
        $this->maxclients = intval($response['virtualserver_maxclients']);
        $this->uptime = intval($response['virtualserver_uptime']);
        $this->name = $response['virtualserver_name'];
        $this->autostart = intval($response['virtualserver_autostart']);
        $this->machine_id = intval($response['virtualserver_machine_id']);
    }
}
