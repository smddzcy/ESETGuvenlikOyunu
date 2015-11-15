<?php

class User_DB_Helper
{

    public $db;

    public function __construct()
    {
        $this->db = new mysqli(Config::DB_HOST, Config::DB_USERNAME, Config::DB_PASSWORD, Config::DB_DATABASE);
    }

    public function escape($val)
    {
        return $this->db->real_escape_string($val);
    }

    /**
     * Add user
     *
     * name, surname, platform, platform_id, email, points
     */
    public function addUser($data)
    {
        $keys = array_keys($data);
        array_walk($keys, function (&$val) {
            $val = $this->escape($val);
        });
        $values = "";
        $first = true;
        foreach ($data as $key => $value) {
            $value = $this->escape($value);
            if (is_string($value)) {
                $values .= (($first) ? "" : ", ") . "'" . $value . "'";
            } else {
                $values .= (($first) ? "" : ", ") . $value;
            }
            $first = false;
        }
        $query = "INSERT INTO users (" . implode(", ", $keys) . ") VALUES (" . $values . ")";
        var_dump($query);
        $result = $this->db->query($query);
        var_dump($this->db->error);
        return $result;
    }


    public function getUser($socialID)
    {
        $query = "SELECT * FROM users WHERE platform_id=" . $socialID;
        return $this->db->query($query);
    }

    public function increasePoint($id, $point)
    {
        $id = $this->escape((int)$id);
        $point = $this->escape((int)$point);
        $query = "UPDATE users SET points=points+" . $point . " WHERE platform_id=" . $id;
        return $this->db->query($query);
    }

    public function decreasePoint($id, $point)
    {
        $id = $this->escape((int)$id);
        $point = $this->escape((int)$point);
        $query = "UPDATE users SET points=points-" . $point . " WHERE platform_id=" . $id;
        return $this->db->query($query);
    }

    public function checkLevelCode($levelCode)
    {
        $query = "SELECT * FROM level_codes WHERE code=" . $levelCode;
        $result = $this->db->query($query);
        if ($result !== false && $this->db->affected_rows >= 1) {
            return true;
        }
        return false;
    }

    public function increaseLevel($id)
    {
        $query = "UPDATE users SET _level=_level+1 WHERE platform_id=" . $id;
        return $this->db->query($query);
    }

    public function getLevel($id)
    {
        $query = "SELECT _level FROM users WHERE platform_id=" . $id;
        $result = $this->db->query($query);
        return $result->fetch_assoc()["_level"];
    }


}

?>