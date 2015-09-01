<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace CachedDemo\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{


    public function indexAction()
    {

        $cache=$this->getServiceLocator()->get('cache');
        $cachekey='testkey';

        $success=false;
        $data=$cache->getItem($cachekey,$success);
        if(!$success){
            $data=array('MyX');
            $cache->setItem($cachekey,$data);

        }
        var_dump($data);
        EXIT;
    }


    public function testAction()
    {

        $cache=$this->getServiceLocator()->get('cache');
        $cachekey='testkey2';

        $success=false;
        $data=$cache->getItem($cachekey,$success);
        if(!$success){
            $data=array('My data2');
            $cache->setItem($cachekey,$data);

        }
        var_dump($data);
        EXIT;
    }
}
