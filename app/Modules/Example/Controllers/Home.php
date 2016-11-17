<?php
declare(strict_types=1);
namespace Zewa\App\Modules\Example\Controllers;

Class Home extends \Zewa\Controller {

    public $data;

    public function __construct()
    {

        parent::__construct();

        $this->data = [];

    }

    public function index()
    {
        $this->view->setProperty('name', 'zech');
        return $this->view->render('example/home', 'layout');
    }

    public function hello($name)
    {
        return "Hello " . $name;
    }

    public function batman()
    {
        return 'I\'m batman!';
    }

    public function usages($usage = false)
    {
        //load modules..

        /** @var Ajax $ajaxController */
        $ajaxController = $this->loadModule('\Zewa\App\Modules\Example\Controllers\Ajax');
        /*
         * optional parameters for constructor can be passed
         * e.g: $this->load->controllers('example','home',['1','2','3']);
         * if class is created, but parameters are provided, class will be instantiated with arguments
         * if class is created, and no parameters are provided, class will be an instance
         * if class is not created, class will be created.
         *
         **/
        return $ajaxController->publicMethod();

    }

}
