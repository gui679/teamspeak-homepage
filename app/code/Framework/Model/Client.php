<?php

declare(strict_types=1);

namespace Framework\Model;

class Client extends AbstractClient
{
    protected $array;
    public function __construct(
        array $array
    ) {
        if($array['cid']){
            $this->id = $array['clid'];
            unset($array['clid']);
        }
        foreach($array as $key => $value){
            $key = str_replace("client_", "", $key);
            $this->{$key} = $value;
        }
    }
}
