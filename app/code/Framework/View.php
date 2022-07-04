<?php

declare(strict_types=1);

namespace Framework;

class View
{
    public function render($params = null){
        $class = explode("\\",get_class($this));
        $module = $class[0];
        $path = strtolower(end($class)).".phtml";

        $params['class'] = $this;

        $this->_render($module, $path, $params);
        
    }
    public function _render($module, $path, $params = null)
    {
        if($params)
            extract($params);

        ob_start();
        require "app/code/".$module."/View/layout/".$path;
        $content = ob_get_clean();

        echo $content;
    }
}
