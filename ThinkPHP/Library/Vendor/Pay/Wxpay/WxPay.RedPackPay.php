<?php
require_once "lib/WxPay.Api.php";
/**
 * 
 * 红包接口
 * 
 * @author DreamSeeker
 *
 */
class RedPackPay
{
	/**
	 * 
	 * 网页授权接口微信服务器返回的数据，返回样例如下
	 * {
	 *  "access_token":"ACCESS_TOKEN",
	 *  "expires_in":7200,
	 *  "refresh_token":"REFRESH_TOKEN",
	 *  "openid":"OPENID",
	 *  "scope":"SCOPE",
	 *  "unionid": "o6_bmasdasdsad6_2sgVt7hMZOPfL"
	 * }
	 * 其中access_token可用于获取共享收货地址
	 * openid是微信支付jsapi支付接口必须的参数
	 * @var array
	 */
	public $data = null;
	
	/**
	 * 
	 * 通过跳转获取用户的openid，跳转流程如下：
	 * 1、设置自己需要调回的url及其其他参数，跳转到微信服务器https://open.weixin.qq.com/connect/oauth2/authorize
	 * 2、微信服务处理完成之后会跳转回用户redirect_uri地址，此时会带上一些参数，如：code
	 * 
	 * @return 用户的openid
	 */
	public function GetOpenid()
	{
		//通过code获得openid
		if (!isset($_GET['code'])){
			//触发微信返回code码
			//$baseUrl = urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING']);
            $baseUrl = urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			$url = $this->__CreateOauthUrlForCode($baseUrl);
			Header("Location: $url");
			exit();
		} else {
			//获取code码，以获取openid
		    $code = $_GET['code'];
			$openid = $this->getOpenidFromMp($code);
			return $openid;
		}
	}
	
	/**
	 * 
	 * 通过code从工作平台获取openid机器access_token
	 * @param string $code 微信跳转回来带上的code
	 * 
	 * @return openid
	 */
	public function GetOpenidFromMp($code)
	{
		$url = $this->__CreateOauthUrlForOpenid($code);
		//初始化curl
		$ch = curl_init();
		//设置超时
		curl_setopt($ch, CURLOP_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		if(WxPayConfig::CURL_PROXY_HOST != "0.0.0.0" 
			&& WxPayConfig::CURL_PROXY_PORT != 0){
			curl_setopt($ch,CURLOPT_PROXY, WxPayConfig::CURL_PROXY_HOST);
			curl_setopt($ch,CURLOPT_PROXYPORT, WxPayConfig::CURL_PROXY_PORT);
		}
		//运行curl，结果以jason形式返回
		$res = curl_exec($ch);
		curl_close($ch);
		//取出openid
		$data = json_decode($res,true);
		$this->data = $data;
		$openid = $data['openid'];
		return $openid;
	}
	
	/**
	 * 
	 * 拼接签名字符串
	 * @param array $urlObj
	 * 
	 * @return 返回已经拼接好的字符串
	 */
	private function ToUrlParams($urlObj)
	{
		$buff = "";
		foreach ($urlObj as $k => $v)
		{
			if($k != "sign"){
				$buff .= $k . "=" . $v . "&";
			}
		}
		
		$buff = trim($buff, "&");
		return $buff;
	}
	
	/**
	 * 
	 * 构造获取code的url连接
	 * @param string $redirectUrl 微信服务器回跳的url，需要url编码
	 * 
	 * @return 返回构造好的url
	 */
	private function __CreateOauthUrlForCode($redirectUrl)
	{
		$urlObj["appid"] = WxPayConfig::APPID;
		$urlObj["redirect_uri"] = "$redirectUrl";
		$urlObj["response_type"] = "code";
		$urlObj["scope"] = "snsapi_base";
		$urlObj["state"] = "STATE"."#wechat_redirect";
		$bizString = $this->ToUrlParams($urlObj);
		return "https://open.weixin.qq.com/connect/oauth2/authorize?".$bizString;
	}
	
	/**
	 * 
	 * 构造获取open和access_toke的url地址
	 * @param string $code，微信跳转带回的code
	 * 
	 * @return 请求的url
	 */
	private function __CreateOauthUrlForOpenid($code)
	{
		$urlObj["appid"] = WxPayConfig::APPID;
		$urlObj["secret"] = WxPayConfig::APPSECRET;
		$urlObj["code"] = $code;
		$urlObj["grant_type"] = "authorization_code";
		$bizString = $this->ToUrlParams($urlObj);
		return "https://api.weixin.qq.com/sns/oauth2/access_token?".$bizString;
	}
}


/**
 * 
 * 统一下单输入对象
 * @author widyhu
 *
 */
class WxPayRedPack extends WxPayDataBase
{
    /**
	* 设置各红包金额 
	* @param string $value 
	**/
	public function SetAmt_list($value)
	{
		$this->values['amt_list'] = $value;
	}
	/**
	* 获取各红包金额  
	* @return 值
	**/
	public function GetAmt_list()
	{
		return $this->values['amt_list'];
	}
	/**
	* 判断各红包金额 是否存在
	* @return true 或 false
	**/
	public function IsAmt_listSet()
	{
		return array_key_exists('amt_list', $this->values);
	}
    
    
    /**
	* 设置红包金额设置方式
	* @param string $value 
	**/
	public function SetAmt_type($value)
	{
		$this->values['amt_type'] = $value;
	}
	/**
	* 获取红包金额设置方式 
	* @return 值
	**/
	public function GetAmt_type()
	{
		return $this->values['amt_type'];
	}
	/**
	* 判断红包金额设置方式是否存在
	* @return true 或 false
	**/
	public function IsAmt_typeSet()
	{
		return array_key_exists('amt_type', $this->values);
	}
    
    /**
	* 设置随机字符串
	* @param string $value 
	**/
	public function SetNonce_str($value)
	{
		$this->values['nonce_str'] = $value;
	}
	/**
	* 获取随机字符串 
	* @return 值
	**/
	public function GetNonce_str()
	{
		return $this->values['nonce_str'];
	}
	/**
	* 判断随机字符串是否存在
	* @return true 或 false
	**/
	public function IsNonce_strSet()
	{
		return array_key_exists('nonce_str', $this->values);
	}
    
    
	/**
	* 设置微信分配的公众账号ID
	* @param string $value 
	**/
	public function SetAppid($value)
	{
		$this->values['wxappid'] = $value;
	}
	/**
	* 获取微信分配的公众账号ID的值
	* @return 值
	**/
	public function GetAppid()
	{
		return $this->values['wxappid'];
	}
	/**
	* 判断微信分配的公众账号ID是否存在
	* @return true 或 false
	**/
	public function IsAppidSet()
	{
		return array_key_exists('wxappid', $this->values);
	}


	/**
	* 设置微信支付分配的商户号
	* @param string $value 
	**/
	public function SetMch_id($value)
	{
		$this->values['mch_id'] = $value;
	}
	/**
	* 获取微信支付分配的商户号的值
	* @return 值
	**/
	public function GetMch_id()
	{
		return $this->values['mch_id'];
	}
	/**
	* 判断微信支付分配的商户号是否存在
	* @return true 或 false
	**/
	public function IsMch_idSet()
	{
		return array_key_exists('mch_id', $this->values);
	}
    
    
    /**
	* 设置提供方名称
	* @param string $value 
	**/
	public function SetNick_name($value)
	{
		$this->values['nick_name'] = $value;
	}
	/**
	* 获取提供方名称
	* @return 值
	**/
	public function GetNick_name()
	{
		return $this->values['nick_name'];
	}
	/**
	* 判断提供方名称是否存在
	* @return true 或 false
	**/
	public function IsNick_nameSet()
	{
		return array_key_exists('nick_name', $this->values);
	}


	/**
	* 设置商户系统内部的订单号,32个字符内、可包含字母, 其他说明见商户订单号
	* @param string $value 
	**/
	public function SetMch_billno($value)
	{
		$this->values['mch_billno'] = $value;
	}
	/**
	* 获取商户系统内部的订单号,32个字符内、可包含字母, 其他说明见商户订单号的值
	* @return 值
	**/
	public function GetMch_billno()
	{
		return $this->values['mch_billno'];
	}
	/**
	* 判断商户系统内部的订单号,32个字符内、可包含字母, 其他说明见商户订单号是否存在
	* @return true 或 false
	**/
	public function IsMch_billnoSet()
	{
		return array_key_exists('mch_billno', $this->values);
	}


	/**
	* 设置trade_type=JSAPI，此参数必传，用户在商户appid下的唯一标识。下单前需要调用【网页授权获取用户信息】接口获取到用户的Openid。 
	* @param string $value 
	**/
	public function SetReOpenid($value)
	{
		$this->values['re_openid'] = $value;
	}
	/**
	* 获取trade_type=JSAPI，此参数必传，用户在商户appid下的唯一标识。下单前需要调用【网页授权获取用户信息】接口获取到用户的Openid。 的值
	* @return 值
	**/
	public function GetReOpenid()
	{
		return $this->values['re_openid'];
	}
	/**
	* 判断trade_type=JSAPI，此参数必传，用户在商户appid下的唯一标识。下单前需要调用【网页授权获取用户信息】接口获取到用户的Openid。 是否存在
	* @return true 或 false
	**/
	public function IsReOpenidSet()
	{
		return array_key_exists('re_openid', $this->values);
	}
    
    
    /**
	* 设置商户名称 
	* @param string $value 
	**/
	public function SetSend_name($value)
	{
		$this->values['send_name'] = $value;
	}
	/**
	* 获取商户名称 
	* @return 值
	**/
	public function GetSend_name()
	{
		return $this->values['send_name'];
	}
	/**
	* 判断商户名称 是否存在
	* @return true 或 false
	**/
	public function IsSend_nameSet()
	{
		return array_key_exists('send_name', $this->values);
	}

    
    /**
	* 设置付款金额 
	* @param int $value 
	**/
	public function SetTotal_amount($value)
	{
		$this->values['total_amount'] = $value;
	}
	/**
	* 获取付款金额 
	* @return 值
	**/
	public function GetTotal_amount()
	{
		return $this->values['total_amount'];
	}
	/**
	* 判断付款金额 是否存在
	* @return true 或 false
	**/
	public function IsTotal_amountSet()
	{
		return array_key_exists('total_amount', $this->values);
	}
    
    
    /**
	* 设置最小红包金额 
	* @param int $value 
	**/
	public function SetMin_value($value)
	{
		$this->values['min_value'] = $value;
	}
	/**
	* 获取最小红包金额 
	* @return 值
	**/
	public function GetMin_value()
	{
		return $this->values['min_value'];
	}
	/**
	* 判断最小红包金额是否存在
	* @return true 或 false
	**/
	public function IsMin_valueSet()
	{
		return array_key_exists('min_value', $this->values);
	}
    
    
    /**
	* 设置最大红包金额 
	* @param int $value 
	**/
	public function SetMax_value($value)
	{
		$this->values['max_value'] = $value;
	}
	/**
	* 获取最大红包金额 
	* @return 值
	**/
	public function GetMax_value()
	{
		return $this->values['max_value'];
	}
	/**
	* 判断最大红包金额是否存在
	* @return true 或 false
	**/
	public function IsMax_valueSet()
	{
		return array_key_exists('max_value', $this->values);
	}
    
    
    /**
	* 设置红包总数
	* @param int $value 
	**/
	public function SetTotal_num($value)
	{
		$this->values['total_num'] = $value;
	}
	/**
	* 获取红包总数 
	* @return 值
	**/
	public function GetTotal_num()
	{
		return $this->values['total_num'];
	}
	/**
	* 判断红包总数是否存在
	* @return true 或 false
	**/
	public function IsTotal_numSet()
	{
		return array_key_exists('total_num', $this->values);
	}
    
    
    /**
	* 设置红包祝福语 
	* @param string $value 
	**/
	public function SetWishing($value)
	{
		$this->values['wishing'] = $value;
	}
	/**
	* 获取红包祝福语 
	* @return 值
	**/
	public function GetWishing()
	{
		return $this->values['wishing'];
	}
	/**
	* 判断红包祝福语 是否存在
	* @return true 或 false
	**/
	public function IsWishingSet()
	{
		return array_key_exists('wishing', $this->values);
	}
    
    
    /**
	* 设置Ip地址 
	* @param string $value 
	**/
	public function SetClient_ip($value)
	{
		$this->values['client_ip'] = $value;
	}
	/**
	* 获取Ip地址  
	* @return 值
	**/
	public function GetClient_ip()
	{
		return $this->values['client_ip'];
	}
	/**
	* 判断Ip地址 是否存在
	* @return true 或 false
	**/
	public function IsClient_ipSet()
	{
		return array_key_exists('client_ip', $this->values);
	}
    
    
    /**
	* 设置活动名称  
	* @param string $value 
	**/
	public function SetAct_name($value)
	{
		$this->values['act_name'] = $value;
	}
	/**
	* 获取活动名称  
	* @return 值
	**/
	public function GetAct_name()
	{
		return $this->values['act_name'];
	}
	/**
	* 判断活动名称 是否存在
	* @return true 或 false
	**/
	public function IsAct_nameSet()
	{
		return array_key_exists('act_name', $this->values);
	}
    
    
    /**
	* 设置备注  
	* @param string $value 
	**/
	public function SetRemark($value)
	{
		$this->values['remark'] = $value;
	}
	/**
	* 获取备注 
	* @return 值
	**/
	public function GetRemark()
	{
		return $this->values['remark'];
	}
	/**
	* 判断备注 是否存在
	* @return true 或 false
	**/
	public function IsRemarkSet()
	{
		return array_key_exists('remark', $this->values);
	}
    
    
    
    /**
	* 设置商户logo的url   
	* @param string $value 
	**/
	public function SetLogo_imgurl($value)
	{
		$this->values['logo_imgurl'] = $value;
	}
	/**
	* 获取商户logo的url  
	* @return 值
	**/
	public function GetLogo_imgurl()
	{
		return $this->values['logo_imgurl'];
	}
	/**
	* 判断商户logo的url 是否存在
	* @return true 或 false
	**/
	public function IsLogo_imgurlSet()
	{
		return array_key_exists('logo_imgurl', $this->values);
	}

    
}