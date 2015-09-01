<?php
namespace Application\Factory;

use Zend\Cache\Storage\StorageInterface;

class CachedDemo
{
    /**
     *
     * @var \Zend\Cache\Storage\StorageInterface
     */
    protected $cache;

    /**
     * We are using the fact that $key is the first parameter
     * and pass by reference is not present.
     * @var type
     */
    protected $override = [
        'hasItem',
        'getMetadata',
        'setItem',
        'addItem',
        'replaceItem',
        'touchItem',
        'removeItem',
        'incrementItem',
        'decrementItem'
    ];

    public function __construct(StorageInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     *
     * @param type $name
     * @param type $arguments
     * @return type
     */
    public function __call($name, $arguments)
    {
        if (in_array($name, $this->override)) {
            $arguments[0] = $this->getKey($arguments[0]);
        }
        $return = call_user_func_array([$this->cache, $name], $arguments);
        /**
         * Ensure that chain calls will work as expected.
         */
        if ($return instanceof StorageInterface) {
            return new self($return);
        } else {
            return $return;
        }
    }

    /**
     *
     * @param type $key
     * @param type $success
     * @param type $casToken
     */
    public function getItem($key, &$success = null, &$casToken = null)
    {
        return $this->cache->getItem($this->getKey($key), $success, $casToken);
    }

    /**
     * @param type $token
     * @param type $key
     * @param type $value
     * @return type
     */
    public function checkAndSetItem($token, $key, $value)
    {
        return $this->cache->replaceItem($token, $this->getKey($key), $value);
    }

    /**
     *
     * @param type $key
     * @return type
     */
    protected function getKey($key)
    {
        return sha1(
            sprintf(
                '%s-%s-%s',
                $key,
                defined('APPLICATION_ENV')     ? APPLICATION_ENV : '',
                defined('APPLICATION_VERSION') ? APPLICATION_VERSION : ''
            )
        );
    }
}