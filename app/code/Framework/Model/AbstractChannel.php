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

    /*additional data*/
    public $topic;
    public $description;
    protected $password;
    public $codec;
    public $codec_quality;
    public $maxclients;
    public $maxfamilyclients;
    public $flag_permanent;
    public $flag_semi_permanent;
    public $flag_default;
    public $flag_password;
    public $codec_latency_factor;
    public $codec_is_unencrypted;
    public $security_salt;
    public $delete_delay;
    public $unique_identifier;
    public $flag_maxclients_unlimited;
    public $flag_maxfamilyclients_unlimited;
    public $flag_maxfamilyclients_inherited;
    public $filepath;
    public $needed_talk_power;
    public $forced_silence;
    public $name_phonetic;
    public $icon_id;
    public $banner_gfx_url;
    public $banner_mode;
    public $seconds_empty;



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

    public function toString(){
        return serialize($this->toArray());
    }

    public function toArray(){
        return [
            "id" => $this->id,
            "pid" => $this->pid,
            "order" => $this->order,
            "name" => $this->name,
            "total_clients" => $this->total_clients,
            "needed_subscribe_power" => $this->needed_subscribe_power
        ];

    }

    public function getAdditionalData(){
        $conn = new \Framework\Connector();
        $response = $conn->send("channelinfo cid=".$this->id, 1);
        foreach($response as $key => $value){
            $key = str_replace("channel_", "", $key);
            $this->{$key} = $value;
        }
    }
}
