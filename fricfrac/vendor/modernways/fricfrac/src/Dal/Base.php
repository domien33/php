<?php
namespace ModernWays\FricFrac\Dal;

class Base {
    /**
     * @var The main connection to the database
     */
    protected static $connection;
    protected static $configLocation = "config.ini";
    protected static $message;
    
    public static function getMessage() {
        return self::$message;
    }
    
    public static function connect($connectionName='local')
    {
        $success = false;
        $options = array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        );
        if (self::$connection !== null) {
            self::$message = 'Connectie is al gemaakt.';
            $success = true;
        } else {
            // true want we willen secties inlezen
            // met dank aan Sam Wouters voor het idee om
            // een ini bestand te gebruiken!!!!!            
            $config = parse_ini_file(self::$configLocation, true);
            try {
                $database = $config[$connectionName]['database'];
                $userName = $config[$connectionName]['username'];
                $password = $config[$connectionName]['password'];
                $driver = $config[$connectionName]['driver'];
                $host = $config[$connectionName]['host'];
                $port = $config[$connectionName]['port'];
                $dsn = "{$driver}:host={$host}:{$port};dbname={$database}";
                self::$connection = new \PDO($dsn, $userName, $password, $options);
                self::$message = "Connectie met $database is gemaakt. <br>";
                $success = true;
            } catch (\PDOException $e) {
                self::$message = $e->getMessage();
            }
        }
        return $success;
    }
}