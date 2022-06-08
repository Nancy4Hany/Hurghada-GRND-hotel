
<?php
// Send a raw HTTP header

class DB{

    private static function connect(){
        $pdo = new PDO('mysql:host=localhost;dbname=hotel-database;', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
    public static function query($query, $params = array()){
            
            $statement = self::connect()->prepare($query);
            $statement->execute($params);
            $query = trim($query);
            if(explode(' ', $query)[0] == 'SELECT'){
              $data = $statement->fetchAll();
              return $data;
            }
    }


}