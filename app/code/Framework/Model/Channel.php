<?php

declare(strict_types=1);

namespace Framework\Model;

class Channel extends AbstractChannel
{
    protected $array;
    public function __construct(
        array $array
    ) {
        if($array['cid']){
            $this->id = $array['cid'];
            unset($array['cid']);
        }
        foreach($array as $key => $value){
            $key = str_replace("channel_", "", $key);
            $this->{$key} = $value;
        }
    }

    public function getChildren($collection){
        $children = [];
        foreach($collection->getAllItems() as $channel){
            if($channel->pid == $this->id)
                $children[] = $channel;
        }
        if(!empty($children))
            return $children;
        else
            return false;
    }

    public function getClients($collection){
        $clients = [];
        foreach($collection->getAllItems() as $client){
            if($client->cid == $this->id)
                $children[] = $client;
        }
        if(!empty($children))
            return $children;
        else
            return false;
    }
}
