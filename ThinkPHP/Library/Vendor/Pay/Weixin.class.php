<?php

/**
 * 微信支付接口类
 *
 */

namespace Vendor\Pay;

require_once dirname(__FILE__)."/Wxpay/lib/WxPay.Api.php";
require_once dirname(__FILE__)."/Wxpay/WxPay.JsApiPay.php";
require_once dirname(__FILE__)."/Wxpay/WxPay.NativePay.php";
require_once dirname(__FILE__)."/Wxpay/WxPay.RedPackPay.php";
require_once dirname(__FILE__).'/Log.php';

class Weixin {

    /**
     * @param array $params
     */
    public static function getJsInfo($params = array()){
        
        //①、获取用户openid
        $tools = new \JsApiPay();
        $openId = $tools->GetOpenid();

        //②、统一下单
        $input = new \WxPayUnifiedOrder();
        $input->SetBody((isset($params['body'])?$params['body']:'小小礼物'));
        $input->SetAttach((isset($params['attach'])?$params['attach']:''));
        $input->SetOut_trade_no((isset($params['out_trade_no'])?$params['out_trade_no']:\WxPayConfig::MCHID.date("YmdHis").rand(10,99)));
        $input->SetTotal_fee((isset($params['money'])?$params['money']*100:1));
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag((isset($params['goods_tag'])?$params['goods_tag']:''));
        $input->SetNotify_url(U('Pay/wxnotify',array(),true,true));
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);
        $order = \WxPayApi::unifiedOrder($input);
        //echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
        //printf_info($order);

        $jsApiParameters = $tools->GetJsApiParameters($order);

        //获取共享收货地址js函数参数
        $editAddress = $tools->GetEditAddressParameters();

        //③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
        /**
         * 注意：
         * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
         * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
         * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
         */
        return array('params'=>$jsApiParameters,'addr'=>$editAddress);
    }

    /**
     * 扫码支付模式二
     * 流程：
     * 1、调用统一下单，取得code_url，生成二维码
     * 2、用户扫描二维码，进行支付
     * 3、支付完成之后，微信服务器会通知支付成功
     * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
     * @param array $params
     */
    public static function getCodeUrl($params = array()){
        
        $notify = new \NativePay();
        
        $input = new \WxPayUnifiedOrder();
        $input->SetBody((isset($params['body'])?$params['body']:'小小礼物'));
        $input->SetAttach((isset($params['attach'])?$params['attach']:''));
        $input->SetOut_trade_no((isset($params['mch'])?$params['out_trade_no']:\WxPayConfig::MCHID.date("YmdHis")));
        $input->SetTotal_fee((isset($params['money'])?$params['money']*100:1));
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag((isset($params['goods_tag'])?$params['goods_tag']:''));
        $input->SetNotify_url(U('Pay/wxnotify',array(),true,true));
        $input->SetTrade_type("NATIVE");
        $input->SetProduct_id((isset($params['product_id'])?$params['product_id']:''));
        $result = $notify->GetPayUrl($input);
        
        return $result["code_url"];
    }
    
    /**
     * 发红包
     */
    public static function sendRedpack($params = array()){
        
        $tools = new \RedPackPay();
        $openId = $tools->GetOpenid();
        
        //mch_billno、nick_name 、send_name 、re_openid 、 total_amount 、min_value、max_value 、total_num 、wishing 、act_name、remark 
        $input = new \WxPayRedPack();
        //$input->SetMch_billno((isset($params['mch_billno'])?$params['mch_billno']:\WxPayConfig::MCHID.date("YmdHis").rand(1000000000,9999999999)));
        $input->SetMch_billno((isset($params['mch_billno'])?$params['mch_billno']:\WxPayConfig::MCHID.date("YmdHis")));
        $input->SetNick_name((isset($params['nick_name'])?$params['nick_name']:'时易创享'));
        $input->SetSend_name((isset($params['send_name'])?$params['send_name']:'时易创享'));
        $input->SetReOpenid($openId);
        $input->SetTotal_amount((isset($params['total_amount'])?$params['total_amount']*100:100));
        $input->SetMin_value((isset($params['min_value'])?$params['min_value']*100:100));
        $input->SetMax_value((isset($params['max_value'])?$params['max_value']*100:100));
        $input->SetTotal_num((isset($params['total_num'])?$params['total_num']:1));
        $input->SetWishing((isset($params['wishing'])?$params['wishing']:'感谢有你！！！'));
        $input->SetAct_name((isset($params['act_name'])?$params['act_name']:'感谢有你！'));
        $input->SetRemark((isset($params['remark'])?$params['remark']:'时易创享'));
        $result = \WxPayApi::sendRedPack($input);
        return $result;
    }
    
    /**
     * 裂变红包
     */
    public static function sendGroupRedpack($params = array()){
        
        require_once dirname(__FILE__)."/Wxpay/WxPay.RedPackPay.php";
        
        $tools = new \RedPackPay();
        $openId = $tools->GetOpenid();
        
        //mch_billno、nick_name 、send_name 、re_openid 、 total_amount 、min_value、max_value 、total_num 、wishing 、act_name、remark 
        $input = new \WxPayRedPack();
        //$input->SetMch_billno((isset($params['mch_billno'])?$params['mch_billno']:\WxPayConfig::MCHID.date("YmdHis").rand(1000000000,9999999999)));
        $input->SetMch_billno((isset($params['mch_billno'])?$params['mch_billno']:\WxPayConfig::MCHID.date("YmdHis")));
        $input->SetSend_name((isset($params['send_name'])?$params['send_name']:'时易创享'));
        $input->SetReOpenid($openId);
        $input->SetTotal_amount((isset($params['total_amount'])?$params['total_amount']*100:500));
        $input->SetTotal_num((isset($params['total_num'])?$params['total_num']:3));
        $input->SetAmt_type('ALL_RAND');
        $input->SetWishing((isset($params['wishing'])?$params['wishing']:'感谢有你！！！'));
        $input->SetAct_name((isset($params['act_name'])?$params['act_name']:'感谢有你！'));
        $input->SetRemark((isset($params['remark'])?$params['remark']:'时易创享'));
        $result = \WxPayApi::sendRedPack($input,true);
        return $result;
    }
    

}
