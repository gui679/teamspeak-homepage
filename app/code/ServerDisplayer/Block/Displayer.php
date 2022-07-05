<?php

declare(strict_types=1);

namespace ServerDisplayer\Block;

use Framework\View;
use Framework\Model\VirtualServer;
use Framework\Model\Channel\Collection as ChannelCollection;
use Framework\Model\Client\Collection as ClientCollection;

class Displayer extends View
{
    protected $server;
    protected $channelCollection;
    protected $clientCollection;

    public function __construct(){
        $this->server = new VirtualServer();
    }

    public function getChannelCollection(){
        if(!$this->channelCollection)
            $this->channelCollection = new ChannelCollection();
        return $this->channelCollection;
    }

    public function getClientCollection(){
        if(!$this->clientCollection)
            $this->clientCollection = new ClientCollection();
        return $this->clientCollection;
    }
}