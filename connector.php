<?php

class Connector
{
    const LOGIN = "serveradmin";
    const PASSWORD = "hiromaldito2469";
    const HOST = "18.228.11.219";
    const LOCALHOST = "localhost";
    const PORT = "10011";

    function send($cmd)
    {
        $return = shell_exec(
            "nc -q1 " . self::HOST . " " . self::PORT . "<<EOF\n" .
                "login " . self::LOGIN . " " . self::PASSWORD . "\n" .
                $cmd . "\n" .
                "EOF"
        );

        if ($return) {
            if ($pos = strpos($return, "error id=0 msg=ok")) {
                $return = substr($return, $pos);
                $return = str_replace("error id=0 msg=ok", "", $return);
                $arr1 = explode(" ", $return);
                $arr2 = [];
                foreach($arr1 as $row){
                    $equal = strpos($row, "=");
                    $arr2[substr($row,0,$equal)] = str_replace("\s", " ",substr($row,$equal+1));
                }
                return $arr2;
            }
        }
        return false;
    }
}
