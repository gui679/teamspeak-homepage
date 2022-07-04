<?php

declare(strict_types=1);

namespace Framework\Model;

class AbstractChannel extends AbstractModel
{
    public $id;
    public $pid;
    public $order;
    public $name;
    public $total_clients;
    public $needed_subscribe_power;

    public function __construct(
        int $id,
        int $pid,
        int $order,
        string $name,
        int $total_clients,
        int $needed_subscribe_power
    ) {
        $this->id = $id;
        $this->pid = $pid;
        $this->order = $order;
        $this->name = $name;
        $this->total_clients = $total_clients;
        $this->needed_subscribe_power = $needed_subscribe_power;
    }
}
