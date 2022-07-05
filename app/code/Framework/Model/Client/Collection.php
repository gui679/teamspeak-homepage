<?php

declare(strict_types=1);

namespace Framework\Model\Client;

use Framework\AbstractCollection;
use Framework\Model\Client;
use Framework\Connector;

class Collection extends AbstractCollection
{    
    public function __construct(
        array $data = null
    ) {
        if(!$data){
            $conn = new Connector();
            $data = $conn->send('clientlist', 1);
        }
        foreach($data as $child){
            $this->childs[$child['clid']] = new Client($child);
        }
    }
}
