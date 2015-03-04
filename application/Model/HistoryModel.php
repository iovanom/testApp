<?php

namespace Model;

class HistoryModel {
    
    public $idChange;
    public $userId;
    public $date;
    public $colomChanged;
    public $oldValue;
    public $newValue;
    private $conn;
    
    public function __construct($id, $name, $oldValue, $newValue) {
        $this->userId = $id;
        $this->colomChanged = $name;
        $this->oldValue = $oldValue;
        $this->newValue = $newValue;
        $this->date = time();
    }
    
    public function create(){
        $this->connectDB();
        $this->userId = "'" . $this->conn->real_escape_string($this->userId) . "'";
        $this->colomChanged = "'" . $this->conn->real_escape_string($this->colomChanged) . "'";
        $this->oldValue = "'" . $this->conn->real_escape_string($this->oldValue) . "'";
        $this->newValue = "'" . $this->conn->real_escape_string($this->newValue) . "'";
        $sql = "INSERT INTO historyChanges(userId, date, colomChanged, oldValue, newValue) "
                . "VALUE($this->userId, $this->date, $this->colomChanged, $this->oldValue, $this->newValue )";
        if ($this->conn->query($sql) === false) {
            trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $this->conn->error, E_USER_ERROR);
        } else {
            $this->idChange = $this->conn->insert_id;
            $this->conn->close();
            return true;
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