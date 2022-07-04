<?php

declare(strict_types=1);

namespace ServerDisplayer\Block;

use Framework\View;
use Framework\Model\VirtualServer;
use Framework\Model\Channel\Collection as ChannelCollection;

class Displayer extends View
{
    protected $server;

    public function __construct(){
        $this->server = new VirtualServer();
    }

    public function getChannelCollection(){
        return new ChannelCollection();
    }
}