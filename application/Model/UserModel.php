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
    public $history;
    private $conn;
    
    
    public function createUser(){
        $this->connectDB();
        $login = "'" . $this->conn->real_escape_string($this->login) . "'";
        $password = "'" . $this->conn->real_escape_string(md5($this->password)) . "'"; 
        $firstName = "'" . $this->conn->real_escape_string($this->firstName) . "'";
        $secondName = "'" . $this->conn->real_escape_string($this->secondName) . "'";
        $email = $this->email ? "'" . $this->conn->real_escape_string($this->email) . "'" : 'NULL';
        $phone = $this->phone ? "'" . $this->conn->real_escape_string($this->phone) . "'" : 'NULL';
        $birdthday = $this->birdthday;
        $sql = "SELECT login FROM users WHERE login = $login";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $app = new \App\Application("error", "index", LOGIN_EXIST);
            exit();
        }
        $sql = "INSERT INTO users(login, firsName, secondName, password, email, phone, birdthday) VALUE($login, $firstName, $secondName, $password, $email, $phone, $this->birdthday)";
        if ($this->conn->query($sql) === false) {
            trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $this->conn->error, E_USER_ERROR);
        } else {
            $this->id = $this->conn->insert_id;
            $this->conn->close();
            return true;
        }
    }
    
    public function loginUser($log, $pass){
        $this->connectDB();
        $login = "'" . $this->conn->real_escape_string($log) . "'";
        $password = md5($pass);
        $sql = "SELECT * FROM users WHERE login = $login";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if($row['password'] == $password){
                $this->id = $row['idusers'];
                $this->login = $row['login'];
                $this->password = $row['password'];
                $this->firstName = $row['firsName'];
                $this->secondName = $row['secondName'];
                $this->email = $row['email'];
                $this->phone = $row['phone'];
                $this->birdthday = date("d.m.Y",$row['birdthday']);
                $this->conn->close();
                return true;
            }
        }
        $this->conn->close();
        return false;
    }
    
    public function update($id, $name, $value){
        $this->connectDB();
        $idUser = "'" . $this->conn->real_escape_string($id) . "'";
        $name = "'" . $this->conn->real_escape_string($name) . "'";
        $value = "'" . $this->conn->real_escape_string($value) . "'";
        $sql = "SELECT $name FROM users WHERE idusers = $id";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $oldValue = $row[$name];
        } else {
            return FALSE;
        }
        $this->history = new \Model\HistoryModel($id, $name, $oldValue, $value);
        if(!$this->history->create()){
            return FALSE;
        }
        $sql = "UPDATE users SET $name = $value WHERE idusers = $idUser";
        if ($this->conn->query($sql) === false) {
            trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $this->conn->error, E_USER_ERROR);
        } else {
            $this->conn->close();
            return TRUE;
        }
    }
    
    
    private function connectDB() {
        $this->conn = new \mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// check connection
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
    }
    
    

}
