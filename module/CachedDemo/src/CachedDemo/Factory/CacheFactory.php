<?php
namespace CachedDemo\Factory;

use CachedDemo\Factory\CacheProxy;
use Zend\Cache\Storage\Plugin\Serializer;
use Zend\Cache\StorageFactory;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CacheFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sm)
    {
        $config = $sm->get('config');

        $cache = StorageFactory::factory(array(
            'adapter' => array(
                'name' => 'filesystem',
            ),
            'plugins' => array(
                // Don't throw exceptions on cache errors
                'exception_handler' => array(
                    'throw_exceptions' => true
                ),
            )
        ));

        if (!file_exists($config['cache']['cache_dir'])) {
            mkdir($config['cache']['cache_dir'], 0755, true);
        }

        $cache->getOptions()->setTtl((int) $config['cache']['cache_ttl']);
        $cache->getOptions()->setCacheDir($config['cache']['cache_dir']);
        $cache->addPlugin(new Serializer);

        return new CacheProxy($cache);
    }
}