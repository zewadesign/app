<?php

namespace app\models;
use \core as core;

Class Example extends core\Model
{

    public function fetchSession() {

        return $this->database->table('Session')->fetch();

    }

}