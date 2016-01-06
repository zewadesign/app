<?php
//namespace core;
namespace App\Hooks;

use Zewa\App;
use Zewa\Exception\StateException;

class PreControllerHook
{
    private $config;

    public function __construct()
    {
        $this->config = App::getConfiguration();
    }


}