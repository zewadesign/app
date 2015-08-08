<?php

namespace app\models;
use \core as core;

Class Example extends core\Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function fetchSession() {
        $results = $this->fetch('SELECT * FROM Session');
        echo "<PRE>";
        print_r($results);
        echo "</PRE>";
//        return $this->database->table('Session')->fetch();
    }
}
