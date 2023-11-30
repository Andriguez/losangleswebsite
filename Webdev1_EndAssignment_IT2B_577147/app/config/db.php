<?php

class DB extends PDO
{
    private static DB $instance;

    private function __construct($dsn, $user, $password){
        parent::__construct($dsn, $user,$password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    }
    public static function getInstance(array $config): DB
    {
        if (empty(self::$instance)) {
            try {
                //$dbOptions = self::getConfig();

                $port = $config['port'];
                $host = $config['hostname'];
                $name = $config['name'];
                $user = $config['username'];
                $password = $config['password'];
                $charset = 'utf8mb4';

                $dsn = "mysql:host=$host;port=$port;dbname=$name;charset=$charset";

                self::$instance = new DB($dsn, $user, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
            } catch (PDOException $pdoe) {
                echo $pdoe->getMessage();
            }
        }
        return self::$instance;
    }
}