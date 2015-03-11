<?php
namespace core;
namespace app\classes;

class ACL
{

    /**
     * System configuration
     *
     * @var object
     */
    private $configuration;

    /**
     * Database object reference
     *
     * @access private
     * @var object
     */

    private $database;

    /**
     * Cache object reference
     *
     * @access private
     * @var mixed
     */

    private $cache = false;

    /**
     * Requesting user id
     *
     * @var int
     */

    private $userId = false;

    /**
     * Requesting role id
     *
     * @var int
     */

    private $roleId = false;

    /**
     * Module being requested
     *
     * @var string
     */

    private $module;

    /**
     * Controller being requested
     *
     * @var string
     */

    private $controller;

    /**
     * Method being requested
     *
     * @var string
     */

    private $method;

    /**
     * Load up some basic configuration settings.
     *
     * @access public
     *
     * @param boolean|int $userId
     * @param boolean|int $roleId
     */

    private $returnQueryString = 'r';

    public function __construct($userId = false, $roleId = false)
    {

        $this->configuration = App::getConfiguration();
        $this->database = Database::getInstance();

        if ($this->configuration->cache) {
            $this->cache = Cache::getInstance();
        }

        if (!$userId) {
            $this->roleId = $this->configuration->acl->roles->guest;
        } else {
            $this->roleId = $roleId;
            $this->userId = $userId;
        }

    }

    /**
     * Handles client request within  ACL
     *
     * @access private
     */
    public function secureStart(callable $initiateApp) {

        $authorizationCode = $this->hasAccessRights(
            $this->configuration->router->module,
            $this->configuration->router->controller,
            $this->configuration->router->method
        );

        switch ($authorizationCode) {

            case '1':
                $initiateApp();
                break;
            case '2':
                $this->secureRedirect();
                break;

            case '3': //@TODO: setup module 404's.
                $this->output = $this->noAccessRedirect();
                break;
        }
    }


    /**
     * Set 401 header, provide no access view if authenticated
     * and access is insufficient / protected
     *
     * @access private
     */
    private function noAccessRedirect()
    {

        return \core\Router::showNoAccess($this->module . '/noaccess');

    }

    /**
     * Redirect if guest and access is insufficient / protected
     *
     * @access private
     */
    private function secureRedirect()
    {

        //@TODO:: add flash message to login?
        $currentURL = $this->configuration->router->currentURL;
        $baseURL = $this->configuration->router->baseURL;

        $redirect = base64_encode(str_replace($baseURL, '', $currentURL));

        $authenticationURL = $this->baseURL . '/';
        $authenticationURL .= $this->configuration->modules[$this->module]['aclRedirect'] . '?' . $this->returnQueryString . '=' . $redirect;

        $this->redirect($authenticationURL);

    }

    private function redirect($url)
    {

        $url = str_replace(array('\r', '\n', '%0d', '%0a'), '', $url);

        if (headers_sent()) {
            return false;
        }

        // trap session vars before redirect
        session_write_close();

        header('HTTP/1.1 401 Access Denied');
        header("Location: $url");
        exit;
    }

    /**
     * Check if client has permission for request
     *
     * @access public
     *
     * @param string $module
     * @param string $controller
     * @param string $method
     *
     * @return int 1 = permitted, 2 = please authenticate, 3 = no access
     */

    public function hasAccessRights($module, $controller, $method)
    {

        $this->module = $module;
        $this->controller = $controller;
        $this->method = $method;

        if (!$this->userId) {
            return $this->hasGuestAccessRights();
        }


        $_cacheKey = 'hasAccessRights::' . $module . '::' . $controller . '::' . $method . '::' . $this->userId;

        if ($this->cache && $result = $this->cache->get($_cacheKey)) {
            $access = $result;

        } else {
            $where = 'UserRole.user_id = ? AND RoleAccess.role_id = ?';
            $where .= ' AND ( RoleAccess.role_module = ? OR RoleAccess.role_module = ? ) ';
            $where .= ' AND ( RoleAccess.role_controller = ? OR RoleAccess.role_controller = ? ) ';
            $where .= ' AND ( RoleAccess.role_method = ? OR RoleAccess.role_method = ? ) ';

            $access = $this->database->select('UserRole.user_id, UserRole.role_id')->table('UserRole')
                ->join('RoleAccess', 'UserRole.role_id = RoleAccess.role_id')
                ->where(
                    $where,
                    [
                        'userid'       => $this->userId,
                        'roleid'       => $this->roleId,
                        'module'       => $module,
                        'ormodule'     => '%',
                        'controller'   => $controller,
                        'orcontroller' => '%',
                        'method'       => $method,
                        'ormethod'     => '%'
                    ]
                )->limit(1)->fetch();

            if ($this->cache) {
                $this->cache->set($_cacheKey, $access, time() + 300);

            }

        }


        if (!$access) {
            return 3;
        } //no access permitted

        return 1;

    }


    /**
     * Check if unauthenticated client is permitted for request
     *
     * @access private
     * @return int 1 = permitted, 2 = please authenticate
     */

    private function hasGuestAccessRights()
    {


        $where = 'RoleAccess.role_id = ?';
        $where .= ' AND ( RoleAccess.role_module = ? OR RoleAccess.role_module = ? ) ';
        $where .= ' AND ( RoleAccess.role_controller = ? OR RoleAccess.role_controller = ? ) ';
        $where .= ' AND ( RoleAccess.role_method = ? OR RoleAccess.role_method = ? ) ';

        $access = $this->database->select('RoleAccess.role_id')
            ->table('RoleAccess')
            ->where($where, array(
                'roleid'       => $this->roleId,
                'module'       => $this->module,
                'ormodule'     => '%',
                'controller'   => $this->controller,
                'orcontroller' => '%',
                'method'       => $this->method,
                'ormethod'     => '%',
            ))
            ->limit(1)
            ->fetch();

        if (!$access) {
            return 2;
        } // please login

        return 1; // you can view..

    }

    /**
     * Returns a reference of object once instantiated
     *
     * @access public
     * @return object
     */

    public static function &getInstance()
    {

        try {

            if (self::$instance === null) {
                throw new \Exception('Unable to get an instance of the load class. The class has not been instantiated yet.');
            }

            return self::$instance;

        } catch(\Exception $e) {

            echo 'Message' . $e->getMessage();

        }

    }
}