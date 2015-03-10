<?php

namespace app\libraries;
namespace core;
use \Exception as Exception;
/**
 * This class registers, dispatches and invokes configured hooks.
 *
 * <code>
 *
 * $this->hook = new Hook();
 * $this->hook->dispatch('hook1');
 * $this->hook->dispatch('hook2');
 * $this->hook->dispatch('hook3');
 *
 * </code>
 *
 * @author Zechariah Walden<zech @ zewadesign.com>
 */

class Hook
{

    /**
     * Instantiated load class pointer
     *
     * @access private
     * @var object
     */

    private $load;

    /**
     * Hooks registered at application runtime
     *
     * @access private
     * @var array
     */

    private $hooks = [];

    /**
     * Hooks that have been invoked
     *
     * @access private
     * @var array
     */

    private $processed = [];

    /**
     * Reference to instantiated controller object.
     *
     * @var object
     */

    protected static $instance;

    /**
     * Create instance
     */

    public function __construct()
    {
        self::$instance = $this;
    }

    /**
     * Set hook callbacks
     *
     * @access public
     * @param string hook index
     * @param callable function to be called
     */
    public function set($hook, callable $function)
    {

        $this->hooks[$hook] = $function;
        $this->processed[$hook] = false;

        return;

    }

    public function call($hook = '')
    {

        try {

            if($hook === '') {
                throw new Exception('You must provide a valid, registered hook index');
            }

            $this->dispatch($hook);

        } catch(Exception $e) {

            echo 'Message' . $e->getMessage();

        }

    }

    /**
     * Dispatch a hook to $this->process to be invoked
     *
     * @access public
     *
     * @param string $hook pointer to closure
     * @throws exception when a hook index is not provided.
     */

    public function dispatch($hook)
    {

        if ($this->hooks[$hook]) {

            $this->process($hook);

        } else {
            throw new Exception('The hook index you provided does not exist');
        }

        return;

    }

    /**
     * Processes queued hooks
     *
     * @access private
     *
     * @param string $hook pointer to closure
     */

    private function process($hook)
    {
        //@TODO handle hook execution in try/catch with silent fail (notification to system?)
        $this->hooks[$hook]();
        $this->processed[$hook] = true;

        return;

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
                throw new Exception('Unable to get an instance of the load class. The class has not been instantiated yet.');
            }

            return self::$instance;

        } catch(Exception $e) {

            echo 'Message' . $e->getMessage();

        }

    }
}