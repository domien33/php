<?php
namespace ModernWays\FricFrac\Dal;

class Event extends Base {
    
    public static function delete($id) {
        $success = 0;
        if (self::connect()) {
            $Id = \ModernWays\Helpers::escape($id);
      
              try {
                $sql = 'DELETE FROM Event WHERE Id = :Id';
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
            $newEvent = array(
                'Name' => \ModernWays\Helpers::escape($post['Name']),
                'Location' => \ModernWays\Helpers::escape($post['Location']),
                'Starts' => \ModernWays\Helpers::escape($post['Starts']),
                'Ends' => \ModernWays\Helpers::escape($post['Ends']),
                'Image' => \ModernWays\Helpers::escape($post['Image']),
                'Description' => \ModernWays\Helpers::escape($post['Description']),
                'OrganiserName' => \ModernWays\Helpers::escape($post['OrganiserName']),
                'OrganiserDescription' => \ModernWays\Helpers::escape($post['OrganiserDescription']),
                'EventCategoryId' => \ModernWays\Helpers::escape($post['EventCategoryId']),
                'EventTopicId' => \ModernWays\Helpers::escape($post['EventTopicId']),
        );
            try {
                $sql = sprintf("INSERT INTO %s (%s) VALUES (:%s)", 'Event', 
                    implode(', ', array_keys($newEvent)), 
                    implode(', :', array_keys($newEvent)));
                $statement = self::$connection->prepare($sql);
                $statement->execute($newEvent);
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
            $name = \ModernWays\Helpers::escape($name);
            try {
                $sql = 'SELECT * FROM Event WHERE Name = :Name';
                $statement = self::$connection->prepare($sql);
                $statement->bindParam(':Name', $name, \PDO::PARAM_STR);
                $statement->execute();
                $result = $statement->fetchAll();
                $success = $statement->rowCount();
                if ($success == 0) {
                    self::$message = "Geen event met de naam $name gevonden.";
                } else {
                    self::$message = "Alle events met de naam $name is gevonden.";
                }
            } catch (\PDOException $exception) {
               self::$message = "Syntax fout in SQL: {$exception->getMessage()}";
             }
        } 
        return $success;
    }
    
    public static function readOneById($id) {
        if (self::connect()) {
            $id = \ModernWays\Helpers::escape($id);
            try {
                $sql = 'SELECT * FROM Event WHERE Id = :Id';
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
                self::$message = "Geen event met de id $id gevonden.";
            }
        } 
        return $result;
    }
    
    public static function readAll() {
        $result = null;
        if (self::connect()) {
            try {
                $sql = 'SELECT Name, Id, Starts FROM Event ORDER By Starts, Name';
                $statement = self::$connection->prepare($sql);
                $statement->execute();
                $result = $statement->fetchAll();
                self::$message = "Alle rijen van event zijn ingelezen.";
            } catch (\PDOException $exception) {
                self::$message = $exception->getMessage();
                self::$message = "De tabel event is leeg.";
            }
        } 
        return $result;
    }
    
    public static function Update($post) {
        $success = 0;
        if (self::connect()) {
            $updateEvent = array(
                'Id'=> \ModernWays\Helpers::escape($post['Id']),
                'Name' => \ModernWays\Helpers::escape($post['Name']),
                'Location' => \ModernWays\Helpers::escape($post['Location']),
                'Starts' => \ModernWays\Helpers::escape($post['Starts']),
                'Ends' => \ModernWays\Helpers::escape($post['Ends']),
                'Image' => \ModernWays\Helpers::escape($post['Image']),
                'Description' => \ModernWays\Helpers::escape($post['Description']),
                'OrganiserName' => \ModernWays\Helpers::escape($post['OrganiserName']),
                'OrganiserDescription' => \ModernWays\Helpers::escape($post['OrganiserDescription']),
                'EventCategoryId' => \ModernWays\Helpers::escape($post['EventCategoryId']),
                'EventTopicId' => \ModernWays\Helpers::escape($post['EventTopicId']),
        );


            try {
                $sql= 'UPDATE Event SET Name = :Name, Location = :Location, Starts = :Starts, Ends = :Ends, Image = :Image, Description = :Description, OrganiserName = :OrganiserName, OrganiserDescription = :OrganiserDescription, EventCategoryId = :EventCategoryId, EventTopicId = :EventTopicId WHERE Id = :Id';
                //var_dump($updateEvent);
                //var_dump($sql);
                $statement= self::$connection->prepare($sql);

                $statement->execute($updateEvent);
                $success = $statement->rowCount();
                if ($success == 0) {
                self::$message = "Het event met de naam {$updateEvent['Name']} is niet gevonden.";
                } else {
                self::$message = "Het event met de naam {$updateEvent['Name']} is geupdated.";
                }
            } catch (\PDOException $exception) {
                var_dump($exception);
                self::$message = "Het event met de naam {$updateEvent['Name']} is niet geupdated. Syntax error: {$exception->getMessage()}";
            }
        }    
        return $success;
    }
}