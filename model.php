<?php
/*
 *
 * class Model
 *
 * ー関連get
 *
 *  DBconfig.php
 *
 *  define("DB_SERVER","localhost");
 *  define("DB_USER","");
 *  define("DB_PASSWD","");
 *  define("DB_NAME","");
 *
*/
require_once 'DBconfig.php';

class Model
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli(DB_SERVER, DB_USER, DB_PASSWD, DB_NAME);
        if ($this->db->connect_errno) {
            printf("Connect failed: %s\n", $this->db->connect_error);
            exit();
        }

        mysqli_set_charset($this->db, 'utf8');
    }

    public function getOne($sql)
    {
        $result = $this->db->query($sql);

        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function get($sql)
    {
        $result = $this->db->query($sql);

        $data[] = $result->fetch_array(MYSQLI_ASSOC);

        return $data;
    }
}
