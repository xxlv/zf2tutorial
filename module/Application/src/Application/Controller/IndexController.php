<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    public function __construct($c){
    }
    public function indexAction()
    {

        echo ord('Caba');
        ECHO "<BR/>";
        echo ord('b');
        ECHO "<BR/>";
        echo chr(96); // 124
        $a='a';
        $b='b';
        echo ($a&$b);
        ECHO "<BR/>";
        EXIT;
//        $urls = array(
//            'http://www.okuer.com/2015/08/25/zf2%E8%87%AA%E5%AE%9A%E4%B9%89%E7%9A%84controller.html',
//            'http://www.okuer.com/2015/08/25/zf2%E5%8A%A0%E8%BD%BDphpexcel.html',
//            'http://www.okuer.com/2015/05/05/%E8%90%A4%E7%81%AB%E8%99%AB.html',
//            'http://www.okuer.com/2015/08/19/%E8%99%9E%E7%BE%8E%E4%BA%BA%E7%9B%9B%E5%BC%80%E7%9A%84%E5%B1%B1%E5%9D%A1.html',
//            'http://www.okuer.com/category/essay',
//            'http://www.okuer.com/2015/08/16/%E5%AD%A4%E7%8B%AC%E8%9B%99.html',
//            'http://www.okuer.com/2015/08/14/%E6%9C%AA%E6%9D%A5%E6%98%AF%E4%BB%80%E4%B9%88%E6%A0%B7%E5%AD%90%E7%9A%84%EF%BC%9F.html',
//            'http://www.okuer.com/2015/05/05/%E8%90%A4%E7%81%AB%E8%99%AB.html',
//            'http://www.okuer.com/2015/05/03/%E4%BB%A5%E5%90%8E%E7%9A%84%E6%97%A5%E5%AD%90.html',
//            'http://www.okuer.com/2015/05/03/%E9%81%97%E5%A4%B1%E4%B9%8B%E5%9F%8E-%EF%BC%9Alin.html'
//        );
//        $api = 'http://data.zz.baidu.com/urls?site=www.okuer.com&token=5CGHvzzfi3GG1BKA';
//        $ch = curl_init();
//        $options =  array(
//            CURLOPT_URL => $api,
//            CURLOPT_POST => true,
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_POSTFIELDS => implode("\n", $urls),
//            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
//        );
//        curl_setopt_array($ch, $options);
//        $result = curl_exec($ch);
//        echo $result;
//        EXIT;
    }
}
