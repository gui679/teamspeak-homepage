<?php

declare(strict_types=1);

namespace Framework\Model;

class VirtualServer
{
    public $id;
    public $port;
    public $status;
    public $clientsonline;
    public $queryclientsonline;
    public $maxclients;
    public $uptime;
    public $name;
    public $autostart;
    public $machine_id;

    public function __construct(
        int $id,
        int $port,
        string $status,
        int $clientsonline,
        int $queryclientsonline,
        int $maxclients,
        int $uptime,
        string $name,
        int $autostart,
        int $machine_id
    ) {
        $this->id = $id;
        $this->port = $port;
        $this->status = $status;
        $this->clientsonline = $clientsonline;
        $this->queryclientsonline = $queryclientsonline;
        $this->maxclients = $maxclients;
        $this->uptime = $uptime;
        $this->name = $name;
        $this->autostart = $autostart;
        $this->machine_id = $machine_id;
    }

}
