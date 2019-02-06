<?php
namespace ModernWays\FricFrac\Dal;

class Country extends Base {
    
    public static function delete($id) {
        $success = 0;
        if (self::connect()) {
            $Id = \ModernWays\Helpers::escape($id);
      
              try {
                $sql = 'DELETE FROM Country WHERE Id = :Id';
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
            $newCountry = array(
                'Name' => \ModernWays\Helpers::escape($post['Name']),
                'Code' => \ModernWays\Helpers::escape($post['Code']),
            );
            try {
                $sql = sprintf("INSERT INTO %s (%s) VALUES (:%s)", 'Country', 
                    implode(', ', array_keys($newCountry)), 
                    implode(', :', array_keys($newCountry)));
                $statement = self::$connection->prepare($sql);
                $statement->execute($newCountry);
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
                $sql = 'SELECT * FROM Country WHERE Name = :Name';
                $statement = self::$connection->prepare($sql);
                $statement->bindParam(':Name', $name, \PDO::PARAM_STR);
                $statement->execute();
                $result = $statement->fetchAll();
                $success = $statement->rowCount();
                if ($success == 0) {
                    self::$message = "Geen land met de naam $name gevonden.";
                } else {
                    self::$message = "Alle landen met de naam $name is gevonden.";
                }
            } catch (\PDOException $exception) {
               self::$message = "Syntax fout in SQL: {$exception->getMessage()}";
             }
        } 
        return $success;
    }

    public static function readOneById($id) {
        $success = 0;
        if (self::connect()) {
            $Name = \ModernWays\Helpers::escape($id);
            try {
                $sql = 'SELECT * FROM Country WHERE Id = :Id';
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
                self::$message = "Geen land met de id $id gevonden.";
            }
        }
        return $result;
    }
    
    public static function readAll() {
        $result = null;
        if (self::connect()) {
            try {
                $sql = 'SELECT * FROM Country';
                $statement = self::$connection->prepare($sql);
                $statement->execute();
                $result = $statement->fetchAll();
                self::$message = "Alle rijen van Country zijn ingelezen.";
            } catch (\PDOException $exception) {
                self::$message = $exception->getMessage();
                self::$message = "De tabel Country is leeg.";
            }
        } 
        return $result;
    }
    public static function Update($post) {
        $success = 0;
        if (self::connect()) {
            $updateCountry= array(
                'Id'=> \ModernWays\Helpers::escape($post['Id']),
                'Name'=> \ModernWays\Helpers::escape($post['Name']),
                'Code'=> \ModernWays\Helpers::escape($post['Code'])
            );

            try {
                $sql= 'UPDATE Country SET Name = :Name, Code = :Code
                    WHERE Id = :Id';
                $statement= self::$connection->prepare($sql);
                $statement -> bindParam(':Id', $updateCountry['Id']);
                $statement -> bindParam(':Name', $updateCountry['Name']);
                $statement -> bindParam(':Code', $updateCountry['Code']);
                $statement->execute($updateCountry);
                $success = $statement->rowCount();
                if ($success == 0) {
                self::$message = "Het land met de naam {$updateCountry['Name']} is niet gevonden.";
                } else {
                self::$message = "Het land met de naam {$updateCountry['Name']} is geüpdated.";
                }
            } catch (\PDOException $exception) {
                self::$message = "Het land met de naam {$updateCountry['Name']} is niet geüpdated. Syntax error: { $exception->getMessage()}";
            }
        }    
        return $success;
    }
}