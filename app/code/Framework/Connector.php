<?php

declare(strict_types=1);

namespace Framework;

class Connector
{
    protected $configs = [];

    function __construct()
    {        
        $this->configs = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config.ini');
    }

    function send($cmd, $use = null, $is_list = false)
    {
        $return = shell_exec(
            "nc -q1 " . (($_SERVER['HTTP_HOST'] == $this->configs['ts_domain']) ? $this->configs['localhost'] : $this->configs['ts_ip']) .
                " " . $this->configs['ts_port'] . "<<EOF\n" .
                "login " . $this->configs['ts_admin_login'] . " " . $this->configs['ts_admin_password'] . "\n" .
                ($use ? "use " . $use . "\n" : "") .
                $cmd . "\n" .
                "EOF"
        );

        if ($return) {
            if ($pos = strpos($return, "error id=0 msg=ok")) {
                $return = substr($return, $pos);
                $return = str_replace("error id=0 msg=ok", "", $return);
                $return = str_replace("\n", "", $return);
                $return = trim($return);
                if (strpos($return, "|") || $is_list) {
                    $arrList = explode("|", $return);
                    $arr2 = [];
                    foreach($arrList as $itemList){
                        $arr2[] = $this->organizeArray($itemList);
                    }
                    return $arr2;
                } else {
                    return $this->organizeArray($return);
                }
            }
        }
        return false;
    }

    private function organizeArray($return)
    {
        $arr1 = explode(" ", $return);
        $arr2 = [];
        foreach ($arr1 as $row) {
            $equal = strpos($row, "=");
            if ($equal)
                $arr2[substr($row, 0, $equal)] = str_replace("\s", " ", substr($row, $equal + 1));
            else {
                $arr2[$row] = "0";
            }
        }
        return $arr2;
    }
}
