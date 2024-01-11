<?php
namespace Reuse\Database;

use \PDO;

class Database {
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    // NOTE(Mohamed);
    // The function does not return a pdo object because what if we want to use
    // something else ? But because of that pdo might cause an error by having
    // its value set to null so we have to make sure to first instantiate pdo
    // in get_pdo before using it.
    public function __construct($db_name,
                                 $db_user = 'root',
                                 $db_pass = 'root',
                                 $db_host = '127.0.0.1') {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function get_pdo() {
        if (!$this->pdo) {
            // TODO(mohamed)
            // We Might want to have only one object instead of having
            // to use new each time we use PDO.

            
		    $pdo = new PDO("mysql:dbname=" . $this->db_name . ";host=" . $this->db_host,
                           $this->db_user,
                           $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

    public function query($sql_query, $class_name) {
        // NOTE(mohamed):
        // Right now the query function  use pdo but we can imagine to have an interface
        // and the interface implementor will be choose at the instanciation of the
        // Database object and then query will automaticaly do the query using
        // the right database implementation.
        $req = $this->get_pdo()->query($sql_query);

       
        return $req->fetchAll(PDO::FETCH_CLASS, $class_name);
    }

    public function prepare($sql_query, $values, $class_name, $single) {
        $result;
        $req = $this->get_pdo()->prepare($sql_query);

        // var_dump($values);
        $req->execute($values);

        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if ($single) {
            $result =  $req->fetch();  
        } else {
            $result =  $req->fetchAll();
        }

        return $result;
    }
}
