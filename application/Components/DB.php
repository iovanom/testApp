<?php

namespace Components;

class DB extends \mysqli
{
    public function __construct()
    {
        parent::__construct(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
    }
}

