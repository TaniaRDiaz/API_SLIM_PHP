<?php namespace App\Config;
use PDO;
use App\Config\config;

class dbconn
{

    protected  $pdo;

    protected function __construct()
    {
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ];

        $dsn = "mysql:host=" . config::host . ";dbname=" . config::database . ";charset=" . config::charset;
        $this->pdo = new PDO($dsn, config::user, config::password, $opt);

    } 
}
