<?php

declare(strict_types=1);

namespace Framework\Model\Channel;

use Framework\AbstractCollection;
use Framework\Model\Channel;
use Framework\Connector;

class Collection extends AbstractCollection
{
    public function __construct(
        array $data = null
    ) {
        if(!$data){
            $conn = new Connector();
            $data = $conn->send('channellist -topic -icon', 1);
        }
        foreach($data as $child){
            $this->childs[$child['cid']] = new Channel($child);
        }
    }
}
