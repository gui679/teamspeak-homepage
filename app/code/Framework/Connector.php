<?php

declare(strict_types=1);

namespace Framework;

class Connector
{
    const LOGIN = "serveradmin";
    const PASSWORD = "hiromaldito2469";
    const HOST = "18.228.11.219";
    const DOMAIN = "ec2-18-228-11-219.sa-east-1.compute.amazonaws.com";
    const LOCALHOST = "localhost";
    const PORT = "10011";

    function send($cmd, $use = null)
    {
        $return = shell_exec(
            "nc -q1 " . (($_SERVER['HTTP_HOST'] == self::DOMAIN) ? self::LOCALHOST : self::HOST) .
                " " . self::PORT . "<<EOF\n" .
                "login " . self::LOGIN . " " . self::PASSWORD . "\n" .
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
                if (strpos($return, "|")) {
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
