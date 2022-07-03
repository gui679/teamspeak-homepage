<?php

Class Connector {
    const LOGIN = "serveradmin";
    const PASSWORD = "hiromaldito2469";
    const HOST = "localhost";
    const PORT = "10011";

    function send($cmd){
        return shell_exec("nc -q1 ".self::HOST." ".self::PORT. "<<EOF\n".
        "login " . self::LOGIN . " " . self::PASSWORD . "\n" .
        $cmd . "\n" .
        "EOF"
        );
    }
}