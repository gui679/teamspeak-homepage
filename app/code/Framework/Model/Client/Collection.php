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
        if (!$data) {
            $conn = new Connector();
            $data = $conn->send('clientlist -voice -country -groups', 1, true);
        }
        if (!empty($data)) {            
            foreach ($data as $child) {
                if ($child['client_nickname'] != "serveradmin") {
                    $this->childs[$child['clid']] = new Client($child);
                }
            }
        }
    }
}
