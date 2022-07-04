<?php

declare(strict_types=1);

namespace Framework;

class AbstractCollection
{
    protected $childs = [];

    public function getItem($id){
        if(array_key_exists($id, $this->childs))
            return $this->childs[$id];
        else
            return false;
    }

    public function getAllItems(){
        if(!empty($this->childs))
            return $this->childs;
        else
            return null;
    }
}
