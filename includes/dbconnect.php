<?php

class DBconnect
{
    // Alapvető csatlakozási paraméterek megadása.
    private $servername;
    private $username;
    private $password;
    private $dbname;

    protected function connect()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "employees";

        // Csatlakozás az adatbázishoz.
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        return $conn;
    }
}
