<?php

namespace Model;

class UserModel{
    
    public $id;
    public $login;
    public $password;
    public $firstName;
    public $secondName;
    public $email;
    public $phone;
    public $birdthday;
    private $conn;
    
    public function createUser(){
        $this->connectDB();
        $login = "'" . $this->conn->real_escape_string($this->login) . "'";
        $password = "'" . $this->conn->real_escape_string($this->password) . "'";
        $firstName = "'" . $this->conn->real_escape_string($this->firstName) . "'";
        $secondName = "'" . $this->conn->real_escape_string($this->secondName) . "'";
        if($this->email)
            $email = "'" . $this->conn->real_escape_string($this->email) . "'";
        if($this->phone)
            $phone = "'" . $this->conn->real_escape_string($this->phone) . "'";
        if($this->birdthdate)
            $birdthday = $this->birdthday;
        $sql = "INSERT INTO users(login, firstName, secondName, password, email, phone, birdthday) VALUE($login, $firstName, $secondName, $password, $email, $phone, $birdthday)";
        if ($this->conn->query($sql) === false) {
            trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $this->conn->error, E_USER_ERROR);
        } else {
            $this->id = $this->conn->insert_id;
            return true;
        }
    }
    
    private function connectDB() {
        $this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// check connection
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
    }

}
