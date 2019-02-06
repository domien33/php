<?php
namespace ModernWays\FricFrac\Dal;

class Role extends Base {
    
    public static function delete($id) {
        $success = 0;
        if (self::connect()) {
            $id = \ModernWays\Helpers::escape($id);
      
              try {
                $sql = 'DELETE FROM Role WHERE Id = :Id';
                $statement = self::$connection->prepare($sql);
                $statement->bindParam(':Id', $id);
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
            $newRole = array(
                'Address1' => \ModernWays\Helpers::escape($post['Address1']),
            );
            try {
                $sql = sprintf("INSERT INTO %s (%s) VALUES (:%s)", 'Role', 
                    implode(', ', array_keys($newRole)), 
                    implode(', :', array_keys($newRole)));
                $statement = self::$connection->prepare($sql);
                $statement->execute($newRole);
                self::$message = 'Rij is toegevoegd!';
                $success = true;
            } catch (\PDOException $exception) {
                self::$message = $exception->getMessage();
                self::$message = "Rij is niet toegevoegd!";
            }
        }
        return $success;
    }
    
    public static function readOneByName($address1) {
        $success = 0;
        if (self::connect()) {
            $address1 = \ModernWays\Helpers::escape($address1);
            try {
                $sql = 'SELECT * FROM Role WHERE Address1 = :Address1';
                $statement = self::$connection->prepare($sql);
                $statement->bindParam(':Address1', $address1, \PDO::PARAM_STR);
                $statement->execute();
                $result = $statement->fetchAll();
                $success = $statement->rowCount();
                if ($success == 0) {
                    self::$message = "Geen Role met de naam $address1 gevonden.";
                } else {
                    self::$message = "Alle Role met de naam $address1 is gevonden.";
                }
            } catch (\PDOException $exception) {
               self::$message = "Syntax fout in SQL: {$exception->getMessage()}";
             }
        } 
        return $success;
    }
    
    public static function readOneById($id) {
        if (self::connect()) {
            $name = \ModernWays\Helpers::escape($id);
            try {
                $sql = 'SELECT * FROM Role WHERE Id = :Id';
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
                self::$message = "Geen Role met de id $id gevonden.";
            }
        } 
        return $result;
    }
    
    public static function readAll() {
        $result = null;
        if (self::connect()) {
            try {
                $sql = 'SELECT * FROM Role';
                $statement = self::$connection->prepare($sql);
                $statement->execute();
                $result = $statement->fetchAll();
                self::$message = "Alle rijen van Role zijn ingelezen.";
            } catch (\PDOException $exception) {
                self::$message = $exception->getMessage();
                self::$message = "De tabel Role is leeg.";
            }
        } 
        return $result;
    }
    
    public static function Update($post) {
        $success = 0;
        if (self::connect()) {
            $updateRole= array(
                'Id'=> \ModernWays\Helpers::escape($post['Id']),
                'Address1'=> \ModernWays\Helpers::escape($post['Address1'])
            );

            try {
                $sql= 'UPDATE Role SET Address1 = :Address1 
                    WHERE Id = :Id';
                $statement= self::$connection->prepare($sql);
                $statement -> bindParam(':Id', $updateRole['Id']);
                $statement -> bindParam(':Address1', $updateRole['Address1']);

                $statement->execute($updateRole);
                $success = $statement->rowCount();
                if ($success == 0) {
                self::$message = "Het Role met de naam {$updateRole['Address1']} is niet gevonden.";
                } else {
                self::$message = "Het Role met de naam {$updateRole['Address1']} is ge�pdated.";
                }
            } catch (\PDOException $exception) {
                self::$message = "Het Role met de naam {$updateRole['Address1']} is niet ge�pdated. Syntax error: {$exception->getMessage()}";
            }
        }    
        return $success;
    }
}