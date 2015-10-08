<?php

/**
 * Created by Ali Kingravi.
 * Date: 05/10/2015
 * Time: 20:42
 */
class Database{

    protected $_link, $_result, $_numrows;

    public function __construct($server, $username, $password, $db){
        $this->_link = mysql_connect($server, $username, $password);
        mysql_select_db($db, $this->_link);
    }

    public function disconnect(){
        mysql_close($this->_link);
    }

    public function query($sql){
        $this->_result  = mysql_query($sql, $this->_link);
        $this->_numrows = mysql_num_rows($this->_result);
    }

    public function numRows(){
        return $this->_numrows;
    }

    public function rows(){
        $rows = array();
        for ($x=0; $x < $this->numRows(); $x++) {
            $rows[] = mysql_fetch_assoc($this->_result);
        }
        return $rows;
    }

    public function insert($table, $firstname, $lastname, $email, $phone){
        mysql_query("INSERT INTO `$table` (id, firstname, lastname, email, phone) VALUES ('', '$firstname', '$lastname', '$email', '$phone')");
    }
}