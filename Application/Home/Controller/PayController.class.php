<?php
/**
 * @author Dream-Seeker
 * @copyright 2015 shiyichuangxiang.com
 */
namespace Home\Controller;
use Think\Controller;
class PayController extends Controller{
    
    //微信红包
    function groupredpack(){
        $params = array();
        $result = \Lib\Pay\Weixin::sendGroupRedpack($params);
        print_r($result);
    }
    
    //微信红包
    function redpack(){
        $params = array();
        require_once 'ThinkPHP/Library/Vendor/pay/Weixin.class.php';
       //  import("Vendor.Pay.Weixin");
       $result = \Vendor\Pay\Weixin::sendRedpack($params);
        print_r($result);
    }

    //微信支付
    function weixin(){
        $params = array();
        $code_url = \Lib\Pay\Weixin::getCodeUrl($params);
        $info = \Lib\Pay\Weixin::getJsInfo($params);
        $this->assign('code_url',$code_url);
        $this->assign('info',$info);
        $this->display();
    }

    function wxnotify(){
        $notify = new \Lib\Pay\PayNotifyCallBack();
        $notify->Handle(false);
    }
    
    
}