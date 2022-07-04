<?php

declare(strict_types=1);

namespace Framework\Model;

class AbstractVirtualServer extends AbstractModel
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

    public function stringUptime(): string
    {
        $uptime = new \DateTime("@" . $this->uptime);
        $now = new \DateTime('@0');
        $times = explode(",", $now->diff($uptime)->format('%a,%h,%i,%s'));
        return $times[0]." dia".(intval($times[0]) > 1 ? "s" : "") . ", " . 
            $times[1]." hora".(intval($times[1]) > 1 ? "s" : "") . ", " .
            $times[2]." minuto".(intval($times[2]) > 1 ? "s" : "") . " e " .
            $times[3]." segundo".(intval($times[3]) > 1 ? "s" : "");
    }

    public function jsonUptime(): string
    {
        $uptime = new \DateTime("@" . $this->uptime);
        $now = new \DateTime('@0');
        $times = explode(",", $now->diff($uptime)->format('%a,%h,%i,%s'));
        $arr_times = array("days" => intval($times[0]), "hours" => intval($times[1]), "minutes" => intval($times[2]), "seconds" => intval($times[3]));
        return json_encode($arr_times);
    }
}
