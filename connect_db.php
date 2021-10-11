<?php

/* 
 * Classe per fare connect al database.
 * e metodi read e save 
 */

    class Database 
    {
        private $hostname = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "easylearn";

        protected function connect(){
            try {
                //connessione al database mysql 
                $connection = new PDO('mysql:host=' . $this -> hostname . ';dbname=' . $this -> database, $this -> username, $this -> password);
                //Handling errori PDO
                $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                //echo "Database connected successfully";
                return $connection;

            } catch(PDOException $e) {
                echo "Impossibile connettersi al database: " . $e->getMessage();
            //     exit("Impossibile connettersi al database: " . $e->getMessage());
            }
        }

        function read($query){
            $result = $this -> connect()->query($query);

            return $result;
        }

        function delete($query, $id_utente){

            try {
                $statement = $this -> connect()->prepare($query);
                $statement->bindParam(':id', $id_utente, PDO::PARAM_INT);
                
                // execute the statement
                if ($statement->execute()) {
                    //echo 'id ' . $id_utente . ' was deleted successfully.';
                    $message = "L'utente è stato cancellato correttamente";
                    $result = [
                        "success" => "true",
                        "message" => $message
                    ];
                    return $result;
                }
            }catch(PDOException $e) {
                //echo "Impossibile connettersi al database: " . $e->getMessage();
                $message = "Non è stato possibile cancellare l'utente: " . $e->getMessage();
                $result = [
                    "success" => "false",
                    "message" => $message
                ];
                return $result;
            }
        }

        function save($query){
            
            $statement = $this->connect()->prepare($query);
            return $statement;
        }

    }

    // $hostname = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "easylearn";

    // try {
        
    //     $connection = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    //     //set the PDO error mode to exception
    //     $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     //$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //     //echo "Database connected successfully";
    // } catch(PDOException $e) {
    //     echo "Database connection failed: " . $e->getMessage();
    //      //     exit("Impossibile connettersi al database: " . $e->getMessage());
    // }


?>
