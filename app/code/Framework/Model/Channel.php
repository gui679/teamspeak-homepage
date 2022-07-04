<?php

declare(strict_types=1);

namespace Framework\Model;

class Channel extends AbstractChannel
{
    protected $array;
    public function __construct(
        array $array
    ) {
        $this->id = $array['cid'];
        $this->pid = $array['pid'];
        $this->order = $array['channel_order'];
        $this->name = $array['channel_name'];
        $this->total_clients = $array['total_clients'];
        $this->needed_subscribe_power = $array['channel_needed_subscribe_power'];
    }
}
