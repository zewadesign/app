<?php
declare(strict_types=1);
namespace Zewa\App\Modules\Example\Controllers;

Class Ajax extends \Zewa\Controller {

    public $data;

    public function __construct() {

        parent::__construct();

        $this->data = [];

    }

    private function privateMethod() {

        return json_encode(['access' => 'private', 'name' => 'Zechariah Walden', 'email' => 'zech@zewadesign.com']);

    }

    public function publicMethod() {

        return json_encode(['access' => 'public', 'name' => 'Zechariah Walden', 'email' => 'zech@zewadesign.com']);

    }
}
