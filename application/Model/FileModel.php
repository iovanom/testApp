<?php

namespace Model;

use Components;

class FileModel {

    public $fileId;
    public $name;
    public $location;
    public $userId;
    public $deleted;
    public $url;
    public $fileNr;
    private $conn;

    public function upload() {
        if (isset($_FILES['file'])) {
            $this->userId = $_SESSION['user_id'];
            $this->location = UPLOAD_FILE_DIR . $this->userId . "_" . basename($_FILES['file']['name']);
            $this->name = basename($_FILES['file']['name']);
            $this->url = 'public/users_files/' . $this->userId . "_" . $this->name;
            if (!file_exists($this->location && $_FILES["file"]["size"] < 1000000)) {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $this->location)) {
                    $this->conn = new \Components\DB();
                    $sql = "INSERT INTO files(name, location, userId, deleted, url) "
                            . "VALUE('$this->name', '$this->location', '$this->userId', FALSE, '$this->url' )";
                    if ($this->conn->query($sql) === false) {
                        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $this->conn->error, E_USER_ERROR);
                        return FALSE;
                    } else {
                        $this->fileId = $this->conn->insert_id;
                        $this->conn->close();
                        return TRUE;
                    }
                }
            }
        }
        return FALSE;
    }
    
    public function getFiles(){
        $this->userId = $_SESSION['user_id'];
        $this->conn = new \Components\DB();
        $sql = "SELECT fileId, name, url, location FROM files WHERE userId = $this->userId AND deleted = FALSE";
        if(!$result = $this->conn->query($sql)){
            return false;
        }
        while($row = $result->fetch_assoc()){
            $filesArr[] = $row;
        }
        if(isset($filesArr))
            return $filesArr;
    }
    
    public function delete($fileId){
        $this->conn = new Components\DB();
        $sql = "UPDATE files SET deleted = TRUE WHERE fileId= $fileId";
        if ($this->conn->query($sql) === false) {
            trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $this->conn->error, E_USER_ERROR);
        } else {
            $sql = "SELECT location FROM files WHERE fileId = $fileId";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            unlink($row['location']);
            $this->conn->close();
            return TRUE;
        }
    }
    

}
