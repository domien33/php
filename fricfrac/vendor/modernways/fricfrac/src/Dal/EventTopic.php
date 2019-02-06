<?php
namespace ModernWays\FricFrac\Dal;

class EventTopic extends Base {
    
    public static function delete($id) {
        $success = 0;
        if (self::connect()) {
            $Id = \ModernWays\Helpers::escape($id);
      
              try {
                $sql = 'DELETE FROM EventTopic WHERE Id = :Id';
                $statement = self::$connection->prepare($sql);
                $statement->bindParam(':Id', $Id);
                $statement->execute();
                $success = $statement->rowCount();
                if ($success == 0) {
                    self::$message = "De rij met id $id bestaat niet!";
                } else {
                    self::$message = "De rij met id $id is gedeleted!";
                    
                }
            } catch (\PDOException $exception) {
                self::$message = $exception->getMessage();
                self::$message = "Fout: verwijderen mislukt!";
            }
         
        }
        return $success;
    }
    
    public static function create($post) {
        $success = false;
        if (self::connect()) {
            $newEventTopic = array(
                'Name' => \ModernWays\Helpers::escape($post['Name']),
            );
            try {
                $sql = sprintf("INSERT INTO %s (%s) VALUES (:%s)", 'EventTopic', 
                    implode(', ', array_keys($newEventTopic)), 
                    implode(', :', array_keys($newEventTopic)));
                $statement = self::$connection->prepare($sql);
                $statement->execute($newEventTopic);
                self::$message = 'Rij is toegevoegd!';
                $success = true;
            } catch (\PDOException $exception) {
                self::$message = $exception->getMessage();
                self::$message = "Rij is niet toegevoegd!";
            }
        }
        return $success;
    }
    
    public static function readOneByName($name) {
        $success = 0;
        if (self::connect()) {
            $Name = \ModernWays\Helpers::escape($name);
            try {
                $sql = 'SELECT * FROM EventTopic WHERE Name = :Name';
                $statement = self::$connection->prepare($sql);
                $statement->bindParam(':Name', $name, \PDO::PARAM_STR);
                $statement->execute();
                $result = $statement->fetchAll();
                $success = $statement->rowCount();
                if ($success == 0) {
                    self::$message = "Geen EventTopic met de naam $name gevonden.";
                } else {
                    self::$message = "Alle EventTopic met de naam $name is gevonden.";
                }
            } catch (\PDOException $exception) {
               self::$message = "Syntax fout in SQL: {$exception->getMessage()}";
             }
        } 
        return $success;
    }
    
    public static function readOneById($id) {
        if (self::connect()) {
            $Name = \ModernWays\Helpers::escape($id);
            try {
                $sql = 'SELECT * FROM EventTopic WHERE Id = :Id';
                $statement = self::$connection->prepare($sql);
                $statement->bindParam(':Id', $id, \PDO::PARAM_STR);
                $statement->execute();
                $result = $statement->fetch(\PDO::FETCH_ASSOC);
                if ($result) {
                    self::$message = "De rij met de id $id is ingelezen.";
                } else {
                   self::$message = "De rij met de id $id is niet ingelezen.";
                }
            } catch (\PDOException $exception) {
                self::$message = $exception->getMessage();
                self::$message = "Geen EventTopic met de id $id gevonden.";
            }
        } 
        return $result;
    }
    
    public static function readAll() {
        $result = null;
        if (self::connect()) {
            try {
                $sql = 'SELECT * FROM EventTopic';
                $statement = self::$connection->prepare($sql);
                $statement->execute();
                $result = $statement->fetchAll();
                self::$message = "Alle rijen van EventTopic zijn ingelezen.";
            } catch (\PDOException $exception) {
                self::$message = $exception->getMessage();
                self::$message = "De tabel EventTopic is leeg.";
            }
        } 
        return $result;
    }
    
    public static function Update($post) {
        $success = 0;
        if (self::connect()) {
            $updateEventTopic= array(
                'Id'=> \ModernWays\Helpers::escape($post['Id']),
                'Name'=> \ModernWays\Helpers::escape($post['Name'])
            );

            try {
                $sql= 'UPDATE EventTopic SET Name = :Name
                    WHERE Id = :Id';
                $statement= self::$connection->prepare($sql);
                $statement -> bindParam(':Id', $updateEventTopic['Id']);
                $statement -> bindParam(':Name', $updateEventTopic['Name']);
                
                $statement->execute($updateEventTopic);
                $success = $statement->rowCount();
                if ($success == 0) {
                self::$message = "Het EventTopic met de naam {$updateEventTopic['Name']} is niet gevonden.";
                } else {
                self::$message = "Het EventTopic met de naam {$updateEventTopic['Name']} is ge�pdated.";
                }
            } catch (\PDOException $exception) {
                self::$message = "Het EventTopic met de naam {$updateEventTopic['Name']} is niet ge�pdated. Syntax error: {$exception->getMessage()}";
            }
        }    
        return $success;
    }
}