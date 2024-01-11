<?php 

namespace Reuse\Table;
use Reuse\Database\Database;

// NOTE(Mohamed): Really important class used to handle the queries and management
// of the tables of the application.
// An obsious upgraded of that code should be an ORM

class Table {
    protected $table;
    protected $db;

    public function __construct(\Reuse\Database\Database $db) {
        $this->db = $db;
        if (!$this->table) {
            $frags = explode("\\", get_class($this));
            $class_name = end($frags);
            $this->table = strtolower(str_replace("Table", "", $class_name));
        }
    }
    public function all() {
        return $this->query("
            SELECT *
            FROM " . $this->table . "");
    }

    public function find($id) {
        return $this->query("SELECT * FROM " . $this->table . " WHERE id=?", [$id], true);
    }

    public function query($sql_query, $values = null, $single = false) {
        $result;
        $class_name = str_replace("Table", "Entity", get_class($this));
        if ($values) {
            //NOTE(Mohamed): If we pass some variables to the query then
            // When protect it by preparing first.

            $result = $this->db->prepare($sql_query, $values, $class_name, $single);
        } else {
            $result =  $this->db->query($sql_query, $class_name, $single);
        }

        return $result;
    }
}

?>