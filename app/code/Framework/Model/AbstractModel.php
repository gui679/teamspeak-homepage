<?php

declare(strict_types=1);

namespace Framework\Model;

class AbstractModel
{
    public function toString(){
        return serialize(get_defined_vars());
    }
}
