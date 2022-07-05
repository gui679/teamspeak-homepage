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
}
