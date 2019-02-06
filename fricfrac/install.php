<?php
require "config.php";

try {
    $connection = new PDO($host, $username, $password, $options);
    $sql = file_get_contents("data/sqlscripts/init.sql");
    $connection->exec($sql);

    echo "Database and table Users created successfully.";
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}