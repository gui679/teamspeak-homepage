<?php
declare(strict_types=1);

namespace Framework\Helper;

use Framework\Model\VirtualServer;

class Connector
{
    const LOGIN = "serveradmin";
    const PASSWORD = "hiromaldito2469";
    const HOST = "18.228.11.219";
    const DOMAIN = "ec2-18-228-11-219.sa-east-1.compute.amazonaws.com";
    const LOCALHOST = "localhost";
    const PORT = "10011";

    function send($cmd)
    {
        $return = shell_exec(
            "nc -q1 " . (($_SERVER['HTTP_HOST'] == self::DOMAIN) ? self::LOCALHOST : self::HOST) .
            " " . self::PORT . "<<EOF\n" .
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
                foreach ($arr1 as $row) {
                    $equal = strpos($row, "=");
                    if($equal)
                        $arr2[substr($row, 0, $equal)] = str_replace("\s", " ", substr($row, $equal + 1));
                    //else{
                    //    $arr2[$row] = "0";
                    //}
                }
                return $arr2;
            }
        }
        return false;
    }

    function serverList(){
        $response = $this->send("serverlist");
        return new VirtualServer(
            intval($response['virtualserver_id'] ?? 0),
            intval($response['virtualserver_port']),
            $response['virtualserver_status'],
            intval($response['virtualserver_clientsonline']),
            intval($response['virtualserver_queryclientsonline']),
            intval($response['virtualserver_maxclients']),
            intval($response['virtualserver_uptime']),
            $response['virtualserver_name'],
            intval($response['virtualserver_autostart']),
            intval($response['virtualserver_machine_id'] ?? 0));
    }
}
