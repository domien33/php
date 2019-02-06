<?php
namespace ModernWays\FricFrac\Dal;

class EventCategory extends Base {
    
    public static function delete($id) {
        $success = 0;
        if (self::connect()) {
            $Id = \ModernWays\Helpers::escape($id);
      
              try {
                $sql = 'DELETE FROM EventCategory WHERE Id = :Id';
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
            $newEventCategory = array(
                'Name' => \ModernWays\Helpers::escape($post['Name']),
            );
            try {
                $sql = sprintf("INSERT INTO %s (%s) VALUES (:%s)", 'EventCategory', 
                    implode(', ', array_keys($newEventCategory)), 
                    implode(', :', array_keys($newEventCategory)));
                $statement = self::$connection->prepare($sql);
                $statement->execute($newEventCategory);
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
                $sql = 'SELECT * FROM EventCategory WHERE Name = :Name';
                $statement = self::$connection->prepare($sql);
                $statement->bindParam(':Name', $name, \PDO::PARAM_STR);
                $statement->execute();
                $result = $statement->fetchAll();
                $success = $statement->rowCount();
                if ($success == 0) {
                    self::$message = "Geen EventCategory met de naam $name gevonden.";
                } else {
                    self::$message = "Alle EventCategories met de naam $name is gevonden.";
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
                $sql = 'SELECT * FROM EventCategory WHERE Id = :Id';
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
                self::$message = "Geen EventCategory met de id $id gevonden.";
            }
        } 
        return $result;
    }
    
    public static function readAll() {
        $result = null;
        if (self::connect()) {
            try {
                $sql = 'SELECT * FROM EventCategory';
                $statement = self::$connection->prepare($sql);
                $statement->execute();
                $result = $statement->fetchAll();
                self::$message = "Alle rijen van EventCategory zijn ingelezen.";
            } catch (\PDOException $exception) {
                self::$message = $exception->getMessage();
                self::$message = "De tabel EventCategory is leeg.";
            }
        } 
        return $result;
    }
    
    public static function Update($post) {
        $success = 0;
        if (self::connect()) {
            $updateEventCategory= array(
                'Id'=> \ModernWays\Helpers::escape($post['Id']),
                'Name'=> \ModernWays\Helpers::escape($post['Name'])
            );
            

            try {
                $sql= 'UPDATE EventCategory SET Name = :Name
                    WHERE Id = :Id';
                $statement= self::$connection->prepare($sql);
                $statement -> bindParam(':Id', $updateEventCategory['Id']);
                $statement -> bindParam(':Name', $updateEventCategory['Name']);
                
                $statement->execute($updateEventCategory);
                $success = $statement->rowCount();
                if ($success == 0) {
                self::$message = "Het EventCategory met de naam {$updateEventCategory['Name']} is niet gevonden.";
                } else {
                self::$message = "Het EventCategory met de naam {$updateEventCategory['Name']} is ge�pdated.";
                }
            } catch (\PDOException $exception) {
                self::$message = "Het EventCategory met de naam {$updateEventCategory['Name']} is niet ge�pdated. Syntax error: {$exception->getMessage()}";
            }
        }    
        return $success;
    }
}