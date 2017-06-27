<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>订单列表-<?php echo ($tpshop_config['shop_info_store_title']); ?></title>
    <meta http-equiv="keywords" content="<?php echo ($tpshop_config['shop_info_store_keyword']); ?>" />
    <meta name="description" content="<?php echo ($tpshop_config['shop_info_store_desc']); ?>" />
    <link rel="stylesheet" href="/Template/pc/default/Static/css/index.css" type="text/css">
    <link rel="stylesheet" href="/Template/pc/default/Static/css/page.css" type="text/css">
    <script src="/Template/pc/default/Static/js/jquery-1.10.2.min.js"></script>
    <script src="/Template/pc/default/Static/js/slider.js"></script>

</head>

<body>
<!--------头部开始-------------->
<script src="/Public/js/jquery-1.10.2.min.js"></script>
<script src="/Public/js/global.js"></script>
<!--最顶部-->
<link rel="stylesheet" href="/Template/pc/default/Static/css/index.css" type="text/css">
<div class="site-topbar">
    <div class="layout">
        <div class="t1-l">
            <ul class="t1-l-ul">
                <li class="t1font"><a target="_blank" href="<?php echo U('/Home/Article/detail',array('article_id'=>22));?>">在线客服</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="javascript:void();">TPshop</a></li>
                <li class="t1img">&nbsp;</li>
            </ul>
        </div>
        <div class="t1-r">
            <ul class="t1-r-ul islogin" style="display:none;">
                <li class="t1font"> <a href="<?php echo U('Home/User/index');?>" class="logon userinfo"></a></li>
                <li class="t1img"><a href="<?php echo U('Home/user/logout');?>">安全退出</a></li>                    
                <li class="t1img">&nbsp;</li>
                <li class="t1img">&nbsp;</li>                
                <li class="t1font"><a href="<?php echo U('Home/User/order_list');?>">我的订单</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="<?php echo U('Home/Cart/cart');?>">购物车</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="#">网站地图</a></li>
                <li class="t1img">&nbsp;</li>                
            </ul>
            <ul class="t1-r-ul nologin" style="display:none;">
                <li class="t1font"><a href="<?php echo U('Home/user/login');?>">登录</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="<?php echo U('Home/Cart/cart');?>">购物车</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="#">网站地图</a></li>
                <li class="t1img">&nbsp;</li> 
            </ul>
        </div>
    </div>
</div>

 <!--------在线客服-------------->
<style>
*{margin:0;padding:0;list-style:none;border:none;}
body{font-size:12px;}
a{color:#666;text-decoration:none;}
/*客服代码部分*/
.qqserver .qqserver-header:after,.qqserver .qqserver-header:before,.qqserver li a:after,.qqserver li a:before{display:table;content:' '}
.qqserver .qqserver-header:after,.qqserver li a:after{clear:both}
.qqserver .qqserver-header,.qqserver li a,.tabs,.user-main,.view-category,.view-category-list>li{*zoom:1}
.qqserver{position:fixed;top:50%;right:0;height:209px;margin-top:-104px}
.qqserver.unfold .qqserver-body{right:0;z-index:100;}
.qqserver .qqserver-body{position:absolute;right:-144px;width:122px;height:183px;padding:12px 10px;-webkit-transition:.3s cubic-bezier(.19,1,.22,1);-o-transition:.3s cubic-bezier(.19,1,.22,1);transition:.3s cubic-bezier(.19,1,.22,1);border:1px solid #e63547;border-radius:4px;background:#f4f7fa}
.qqserver .qqserver_fold{position:absolute;right:0;padding:14px 7px;cursor:pointer;border-top-left-radius:4px;border-bottom-left-radius:4px;background:#e63547}
.qqserver .qqserver-header{padding-bottom:10px;padding-left:6px;border-bottom:1px dashed #d1d4cc}
.qqserver .qqserver-header *{float:left}
.qqserver .qqserver_arrow{margin-top:-1px;margin-left:7px;cursor:pointer}
.qqserver li{margin-top:6px}
.qqserver li a{display:block;padding:6px 12px 4px}
.qqserver li a div{font-size:14px;float:left;margin-right:11px;color:#697466}
.qqserver li a span{font-size:12px;line-height:18px;float:left;text-indent:4px;color:#fff}
.qqserver li a span.qqserver-service-alert{font-weight:400;display:block}
.qqserver li a:hover{text-decoration:none;border-radius:4px;background:#eaebe9}
.qqserver li a:hover div{color:#e63547}
.qqserver .qqserver-footer{margin-top:10px;padding-top:14px;padding-bottom:14px;padding-left:11px;border-top:1px dashed #d1d4cc}
.qqserver .qqserver-footer .text-primary{color:#e63547;font-size:14px;}
.qqserver .qqserver_icon-alert{display:inline-block;margin-right:10px;vertical-align:-3px;*display:inline;*zoom:1;*vertical-align:-1px}
.qqserver-header div{width:90px;height:18px;background-image:url(/Template/pc/default/Static/images/lanren.png);background-position:-419px -80px}
.qqserver_icon-alert{width:16px;height:14px;background-image:url(/Template/pc/default/Static/images/lanren.png);background-position:-595px -85px}
.qqserver li a span{width:30px;height:23px;background-image:url(/Template/pc/default/Static/images/lanren.png);background-position:-265px 0}
.qqserver li a .qqserver-service-alert{width:30px;height:22px;background-image:url(/Template/pc/default/Static/images/lanren.png);background-position:-342px 0}
.qqserver_fold div{width:26px;height:132px;background-image:url(/Template/pc/default/Static/images/lanren.png);background-position:0 0}
.qqserver_fold:hover div{width:26px;height:132px;background-image:url(/Template/pc/default/Static/images/lanren.png);background-position:-27px 0}
.qqserver_arrow{width:18px;height:18px;background-image:url(/Template/pc/default/Static/images/lanren.png);background-position:-435px 0}
.qqserver_arrow:hover{width:18px;height:18px;background-image:url(/Template/pc/default/Static/images/lanren.png);background-position:-435px -38px}
</style>
<!-- 代码部分begin -->
<div class="qqserver">
  <div class="qqserver_fold">
    <div></div>
  </div>
  <div class="qqserver-body" style="display: block;">
    <div class="qqserver-header">
      <div></div>
      <span class="qqserver_arrow"></span> </div>
    <ul>
      <li> <a title="点击这里给我发消息" href="tencent://message/?uin=<?php echo ($tpshop_config['shop_info_qq']); ?>&amp;Site=TPshop商城&amp;Menu=yes" target="_blank">
        <div>客服咨询</div>
        <span>琳琳</span> </a> </li>
      <li> <a title="点击这里给我发消息" href="tencent://message/?uin=<?php echo ($tpshop_config['shop_info_qq2']); ?>&amp;Site=TPshop商城&amp;Menu=yes" target="_blank">
        <div>客服咨询</div>
        <span>云云</span> </a> </li>
      <li> <a title="点击这里给我发消息" href="tencent://message/?uin=<?php echo ($tpshop_config['shop_info_qq3']); ?>&amp;Site=TPshop商城&amp;Menu=yes" target="_blank">
        <div>技术咨询</div>
        <span class="qqserver-service-alert">TPshop</span> </a> </li>
    </ul>
    <div class="qqserver-footer"><span class="qqserver_icon-alert"></span><a class="text-primary" href="javascript:;">大家都在说</a> </div>
  </div>
</div>
<!--<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>-->
<script>
$(function(){
	var $qqServer = $('.qqserver');
	var $qqserverFold = $('.qqserver_fold');
	var $qqserverUnfold = $('.qqserver_arrow');
	$qqserverFold.click(function(){
		$qqserverFold.hide();
		$qqServer.addClass('unfold');
	});
	$qqserverUnfold.click(function(){
		$qqServer.removeClass('unfold');
		$qqserverFold.show();
	});
	//窗体宽度小鱼1024像素时不显示客服QQ
	function resizeQQserver(){
		$qqServer[document.documentElement.clientWidth < 1024 ? 'hide':'show']();
	}
	$(window).bind("load resize",function(){
		resizeQQserver();
	});
});
</script>
<!-- 代码部分end -->
 <!--------在线客服-------------->

<!--顶部banner开始-->    
<?php if(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME == 'Home/Index/index' && $_COOKIE["top-banner"] == null){ ?>
<div class="top-banner" id="top-banner-block">
    <div class="top-banner-max">
    <!---广告 select * from __PREFIX__ad where position_id = 1 limit 1-->
    <?php $pid =1;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->getField("position_id,position_name,ad_width,ad_height");$result = D("ad")->where("pid=$pid  and enabled = 1 and start_time < 1498204800 and end_time > 1498204800 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select(); if(!in_array($pid,array_keys($ad_position)) && $pid) { M("ad_position")->add(array( "position_id"=>$pid, "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ", "is_open"=>1, "position_desc"=>CONTROLLER_NAME."页面", )); delFile(RUNTIME_PATH); } $c = 1- count($result); if($c > 0 && $_GET[edit_ad]) { for($i = 0; $i < $c; $i++) { $result[] = array( "ad_code" => "/Public/images/not_adv.jpg", "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid", "title" =>"暂无广告图片", "not_adv" => 1, "target" => 0, ); } } foreach($result as $key=>$v): $v[position] = $ad_position[$v[pid]]; if($_GET[edit_ad] && $v[not_adv] == 0 ) { $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]"; $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name]; $v[target] = 0; } ?><a href="<?php echo ($v["ad_link"]); ?>" <?php if($v['target'] == 1): ?>target="_blank"<?php endif; ?>> <img src="<?php echo ($v[ad_code]); ?>"  title="<?php echo ($v[title]); ?>" style="<?php echo ($v[style]); ?>"/></a>    
    <a class="button-top-banner-close" href="javascript:;" title="关闭" id="top-banner-min-close" onClick="javascript:$('#top-banner-block').hide();">－</a><?php endforeach; ?>
   </div>
</div>
<?php  setcookie("top-banner", "1", time()+ 3600); } ?>
<!--顶部banner结束-->    

<header>
    
    <div class="layout">
    
    <!--logo开始-->
        <div class="logo"><a href="/" title="TPshop"><img src="<?php echo ($tpshop_config['shop_info_store_logo']); ?>" alt="TPshop"></a></div>
    <!--logo结束-->
    
    <!-- 搜索开始-->
        <div class="searchBar">
            <div class="searchBar-form">
                <form name="sourch_form" id="sourch_form" method="post" action="<?php echo U("/Home/Goods/search");?>">
                    <input type="text" class="text" name="q" id="q" value="<?php echo I('q'); ?>"  placeholder="  搜索关键字"/>
                    <input type="button" class="button" value="搜索" onclick="if($.trim($('#q').val()) != '') $('#sourch_form').submit();"/>
                </form>
            </div>
            <div class="searchBar-hot">
                <b>热门搜索</b>
               	<?php if(is_array($tpshop_config["hot_keywords"])): foreach($tpshop_config["hot_keywords"] as $k=>$wd): ?><a target="_blank" href="<?php echo U('Home/Goods/search',array('q'=>$wd));?>" <?php if($k == 0): ?>class="ht"<?php endif; ?>><?php echo ($wd); ?></a><?php endforeach; endif; ?>
            </div>
        </div>
        <!-- 搜索结束-->
        
        <div class="ri-mall">
            <div class="my-mall">
            <!---我的商城-开始 -->
                <div class="mall">
                    <div class="le"><a href="<?php echo U('/Home/User');?>" >我的商城</a></div> 
                </div>
                <!---我的商城-结束 -->
            </div>
            <div class="my-mall" id="header_cart_list">
                <!---购物车-开始 -->
                <div class="micart">
                    <div class="le les">
                    	<a href="<?php echo U('Home/Cart/cart');?>" >我的购物车
                            <span class="shopping-num"><em id="cart_quantity"></em><b></b></span>
                        </a>                       
                    </div>
                    
                    <div class="ri ris" style="display:">
                       <?php if(count($cartList) == 0): ?><div class="micart-about">
                                <span class="micart-xg">您的购物车是空的，赶紧选购吧！</span>
                            </div><?php endif; ?>
                        <div class="commod">
                        <ul>
                        <?php if(is_array($cartList)): foreach($cartList as $k=>$v): ?><li class="goods">
                                <div>
                                    <div class="p-img">
                                        <a href="">
                                            <img src="<?php echo (goods_thum_images($v["goods_id"],428,428)); ?>" alt="">
                                        </a>
                                     </div>
                                     <div class="p-name">
                                        <a href="">
                                            <span class="p-slogan"><?php echo ($v[goods_name]); ?></span>
                                            <span class="p-promotions hide"></span>
                                        </a>
                                     </div>
                                     <div class="p-status">
                                        <div class="p-price">
                                            <b>¥&nbsp;<?php echo ($v[goods_price]); ?></b>
                                            <em>x</em>
                                            <span><?php echo ($v[goods_num]); ?></span>
                                        </div>
                                        <div class="p-tags"></div>
                                     </div>
                                     <!--
                                     <a href="" class="icon-minicart-del" title="删除">删除</a>
                                       -->
                                </div>
                            </li><?php endforeach; endif; ?>   							
                        </ul>
                        </div>
                        <div class="settle">
                            <p>共<em><?php echo ($cart_total_price[anum]); ?></em>件商品，金额合计<b>¥&nbsp;<?php echo ($cart_total_price[total_fee]); ?></b></p>
                            <a class="js-button" href="<?php echo U('Home/Cart/cart');?>">去结算</a>
                        </div>
                    </div>
                </div>
                <!---购物车-结束 -->
                
            </div>
        </div>
        <div class="qr-code">
            <img src="/Template/pc/default/Static/images/qrcode_vmall_app01.png" alt="二维码" />
            <p>扫一扫</p>
        </div>
    </div>
</header>
   <!-- 导航-开始-->
   
   
   	<div class="navigation">
    	<div class="layout">
        	<!--全部商品-开始-->
        	<div class="allgoods">
            	<div class="goods_num"><h2>全部商品</h2><i class="trinagle"></i></div>
            	<div class="list" <?php if(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME == 'Home/Index/index') echo 'style="display:block;"'; ?> >
                   <ul class="list_ul"> 
                       <?php if(is_array($goods_category_tree)): foreach($goods_category_tree as $k=>$v): if($v[level] == 1): ?><li class="list-li">
                                    <div class="list_a">
                                        <h3><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v[id]));?>"><span><?php echo ($v['name']); ?></span></a></h3>
                                        <p> <!--$v[id][name] 数组中括号 里面的 id name 不能有 引号 sql 参数 必须双引号-->
	                                       <?php $index = '1'; ?>
                                           <?php if(is_array($v[tmenu])): foreach($v[tmenu] as $k2=>$v2): if($v2[parent_id] == $v[id]): if($index++ > 3) break; ?>
                                           	 	<a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>"><?php echo ($v2['name']); ?></a><?php endif; endforeach; endif; ?>
                                        </p>
                                    </div>
                                    <div class="list_b">
                                        <div class="list_bigfl">
	                                       <?php $index = '1'; ?>                                        
                                           <?php if(is_array($v[tmenu])): foreach($v[tmenu] as $k2=>$v2): if($v2[parent_id] == $v[id]): if($index++ > 6) break; ?>
                                                    <a class="list_big_o ma-le-30" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>"><?php echo ($v2['name']); ?><i>＞</i></a><?php endif; endforeach; endif; ?>                                                                                    
                                        </div>
                                        <div class="subitems">                                        
                                           <?php if(is_array($v[tmenu])): foreach($v[tmenu] as $k2=>$v2): if($v2[parent_id] == $v[id]): ?><dl class="ma-to-20 cl-bo">
                                                        <dt class="bigheader wh-sp"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>"><?php echo ($v2['name']); ?></a><i>＞</i></dt>
                                                        <dd class="ma-le-100">
                                                           <?php if(is_array($v2[sub_menu])): foreach($v2[sub_menu] as $k3=>$v3): if($v3[parent_id] == $v2[id]): ?><a class="hover-r ma-le-10 ma-bo-10 pa-le-10 bo-le-hui fl wh-sp" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>"><?php echo ($v3['name']); ?></a><?php endif; endforeach; endif; ?>
                                                        </dd>
                                                    </dl><?php endif; endforeach; endif; ?>
                                        </div>
                                    </div>
                                    <i class="list_img"></i>
                                </li><?php endif; endforeach; endif; ?>	
                	</ul>
                </div>
            </div>
            <!--全部商品-结束-->
            
            <div class="ongoods">
            	<ul class="navlist">
            		<li class="homepage"><a href="/"><span>首页</span></a></li>
                    <?php
 $md5_key = md5("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC"); S("sql_".$md5_key,$sql_result_v,31104000); } foreach($sql_result_v as $k=>$v): ?><li class="page"><a href="<?php echo ($v[url]); ?>" <?php if($v[is_new] == 1): ?>target="_blank"<?php endif; ?><span><?php echo ($v[name]); ?></span></a></li><?php endforeach; ?> 
            	</ul>
            </div>
        </div>
    </div>
   <!-- 导航-结束-->
<script>
$(function(){
    var active_li = '<?php echo ($active); ?>';
    if(active_li){
        $('li').remove('curr-res');
        $('#'+active_li).addClass('curr-res');
    }
   	
    var uname= getCookie('uname');
    if(uname == ''){
    	$('.islogin').remove();
    	$('.nologin').show();
    }else{
    	$('.nologin').remove();
    	$('.islogin').show();
    	$('.userinfo').html(decodeURIComponent(uname));
    }
    get_cart_num();
})



function get_cart_num(){
	  var cart_cn = getCookie('cn');
	  if(cart_cn == ''){
		$.ajax({
			type : "GET",
			url:"/index.php?m=Home&c=Cart&a=header_cart_list",//+tab,
			success: function(data){								 
				cart_cn = getCookie('cn');		
				$('#cart_quantity').html(cart_cn);
			}
		});	
	  }
	  $('#cart_quantity').html(cart_cn);
}
/**
* 鼠标移动端到头部购物车上面 就ajax 加载
*/
// 鼠标是否移动到了上方
var header_cart_list_over = 0; 
$("#header_cart_list > .micart > .les").hover(function(){	 
       if(header_cart_list_over == 1) 
			return false;	
        header_cart_list_over = 1; 
		$.ajax({
			type : "GET",
			url:"/index.php?m=Home&c=Cart&a=header_cart_list",//+tab,
			success: function(data){								 
			 	$("#header_cart_list > .micart > .ris").html(data);	
			 	get_cart_num();
			}
		});			
}).mouseout(function(){
	
	 (typeof(t) == "undefined") || clearTimeout(t); 	 
	 t = setTimeout(function () { 
			header_cart_list_over = 0; /// 标识鼠标已经离开
		}, 1000);		
});
</script>
<!--------头部结束-------------->

<div class="layout ov-hi">
    <div class="breadcrumb-area">    
	    <?php if(is_array($navigate_user)): foreach($navigate_user as $k=>$v): if($k != '首页'): ?>><?php endif; ?>  
            <a href="<?php echo ($v); ?>"><?php echo ($k); ?></a><?php endforeach; endif; ?>
    </div>
</div>
<div class="layout pa-to-10 fo-fa-ar">
    <!--菜单-->
    <div class="fl wi240 myimall">
    <div class="li-hi-20 ba-co-danhui">
        <div class="pa-28-0-22">        
            <a class="fo-si-18" href="<?php echo U('/Home/User');?>"><span>我的商城</span></a>
        </div>
        <div class="fuy-xim pa-bo-20">
            <ul>
                <li>
                    <h3><span>订单中心</span></h3>
                    <ol>
                        <li id="order_list"><a href="<?php echo U('Home/User/order_list');?>"><span>我的订单<!--<i class="w-i">1</i>--></span></a></li>
                        <li id="goods_collect"><a href="<?php echo U('Home/User/goods_collect');?>"><span>我的收藏</span></a></li>
                    </ol>
                </li>
                <li>
                    <h3><span>个人中心</span></h3>
                    <ol>
                        <li id="info"><a href="<?php echo U('Home/User/info');?>"><span>个人信息</span></a></li>
                        <li id="account"><a href="<?php echo U('Home/User/account');?>"><span>我的积分</span></a></li>
                        <li id="coupon"><a href="<?php echo U('Home/User/coupon');?>"><span>我的优惠券</span></a></li>
                        <li id="address_list"><a href="<?php echo U('Home/User/address_list');?>"><span>收货地址管理</span></a></li>
                        <li id="withdrawals"><a href="<?php echo U('Home/User/withdrawals');?>"><span>提现申请</span></a></li>
                        <li id="recharge"><a href="<?php echo U('Home/User/recharge');?>"><span>我的余额</span></a></li>                        
                    </ol>
                </li>
                <li>
                    <h3><span>社区中心</span></h3>
                    <ol>
                        <li id="comment"><a href="<?php echo U('Home/User/comment');?>"><span>商品评价</span></a></li>
                        <li id="message_notice"><a href="<?php echo U('Home/User/message_notice');?>"><span>消息通知</span></a></li>
                        <li id="comment"><a href="<?php echo U('Home/User/return_goods_list');?>"><span>退换货</span></a></li>                        
                    </ol>
                </li>
            </ul>
        </div>
    </div>
</div>

    <!--菜单-->
    <div class="fr wi940">
        <div class="he50 wddd">
            <div class="fl ddd-h2">
                <h2><span>我的订单</span></h2>
            </div>

        </div>
        <div class="wddd-li">
            <ul>
                <li class="wddd-red" id="ALL"><a href="<?php echo U('Home/User/order_list');?>">全部</a></li>
                <li id="WAITPAY"><a href="<?php echo U('Home/User/order_list',array('type'=>'WAITPAY'));?>">待付款<em></em></a></li>
                <li id="WAITSEND"><a href="<?php echo U('Home/User/order_list',array('type'=>'WAITSEND'));?>">待发货<em></em></a></li>
                <li id="WAITRECEIVE"><a href="<?php echo U('Home/User/order_list',array('type'=>'WAITRECEIVE'));?>">待收货<em></em></a></li>
                <li id="WAITCCOMMENT"><a href="<?php echo U('Home/User/order_list',array('type'=>'WAITCCOMMENT'));?>">待评价<em></em></a></li>
            </ul>
        </div>
        <div class="wddd-js ov-in">
            <!--<div class="merge">-->
                <!--<label class="ma-ri-20 di-in-bl cu-po" for="checkallbox"><input class="ma-ri-10  ve-al-mi" id="checkallbox" type="checkbox"><span class="ve-al-mi fo-si-14 fo-fa-ta">全选</span></label>-->
                <!--<a class=" di-in-bl hb-merge" href="">合并支付</a>-->
            <!--</div>-->
            <div class="list-group-title">
                <table class="merge-tab" border="0" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                    	<th class="col-pro-img wi120 borsdjk"></th>
                        <th class="col-pro">商品</th>
                        <th class="col-price">单价/元</th>
                        <th class="col-price">会员价</th>                        
                        <th class="col-quty">数量</th>
                        <th class="col-pay wi139">实付款/元</th>
                        <th class="col-operate">订单状态及操作</th>
                    </tr>
                    </thead>
                </table>
            </div>
            
 <?php if(empty($lists)): ?><!--没查询到数据-->
     <p style="text-align:center"><img src="/Template/pc/default/Static/images/null_data.jpg" width="400"  /></p><?php endif; ?>             
            <div class="merge-list">
                <!--订单列表-->
                <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="ma-0--1">
                        <div class="o-info o-inff">
                            <div class="fl">
                                <input class="o-ch ve-al-mi" type="checkbox" />
                                <span class=" ma-ri-15 co-888 fo-si-14"><?php echo (date('Y-m-d H:i:s',$list["add_time"])); ?></span>
                                <span class="ma-ri-15 co-888 fo-si-14">订单号：<a class="co-36c" href=""><?php echo ($list["order_sn"]); ?></a></span>
                            </div>
                            <div class="fr te-al co-888 fo-si-14"><?php echo ($list['order_status_desc']); ?></div>
                        </div>
                        <div class="o-pro">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <?php if(is_array($list["goods_list"])): $i = 0; $__LIST__ = $list["goods_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?><tr>
                                        <td class="col-pro-img">
                                            <p>
                                                <a title="<?php echo ($good["goods_name"]); ?>" href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$good['goods_id']));?>" target="_blank">
                                                    <img alt="<?php echo ($good["goods_name"]); ?>" src="<?php echo (goods_thum_images($good["goods_id"],78,78)); ?>">
                                                </a>
                                            </p>
                                        </td>
                                        <td class="col-pro-info te-al-le" ><p class="p-name"><a title="" target="_blank" href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$good['goods_id']));?>"><?php echo ($good["goods_name"]); ?></a></p></td>
                                        <td class="col-price"><em>¥</em><span><?php echo ($good["goods_price"]); ?></span></td>
                                        <td class="col-price"><em>¥</em><span><?php echo ($good["member_goods_price"]); ?></span></td>                                        
                                        <td class="col-quty"><?php echo ($good["goods_num"]); ?></td>
                                        <td rowspan="1" class="col-pay"><p><em>¥</em><span><?php echo ($good['goods_num'] * $good['member_goods_price']); ?></span></p></td>
                                        <td rowspan="1" class="col-pay">
                                        <?php if(($list[return_btn] == 1) and ($good[is_send] == 1)): ?><p class="p-link">
                                                    <a style="color:#999;" href="<?php echo U('Home/User/return_goods',array('order_id'=>$list['order_id'],'order_sn'=>$list['order_sn'],'goods_id'=>$good['goods_id'],'spec_key'=>$good['spec_key']));?>">申请退款</a>
                                                </p><?php endif; ?>
					<?php if(($list[comment_btn] == 1) and ($good[is_comment] == 0)): ?><p class="p-link"><a href="<?php echo U('Home/User/comment');?>" target="_blank"><span>评价</span></a></p><?php endif; ?>
                                        </td>                                        
                                        <!--<td rowspan="1" class="col-operate">-->
                                        <!--<p class="p-button"> <a class="button-operate-pay di-in-bl hb-merge" href="" target="_blank"><span>立即支付</span></a></p>-->
                                        <!--&lt;!&ndash;<p class="p-link"><a href="">修改订单</a></p>&ndash;&gt;-->
                                        <!--<p class="p-link"><a href="" >取消订单</a></p>-->
                                        <!--<p class="p-link"><a href="">订单详情</a></p>-->
                                        <!--</td>-->
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                <tr>
                                    <td colspan="6" class="te-al-le litz-pa">
                                        <p>商品总价 :<span class="co-red"><?php echo ($list["goods_price"]); ?></span></p>  
										<p>邮费 :<span class="co-red"><?php echo ($list["shipping_price"]); ?></span></p>  
										<p>优惠券 :<span class="co-red"><?php echo ($list["coupon_price"]); ?></span></p>  
										<p>积分抵扣 :<span class="co-red"><?php echo ($list["integral_money"]); ?></span></p>  
                                                                                <p>活动优惠:<span class="co-red"><?php echo ($list["order_prom_amount"]); ?></span></p>  
										<p>余额 :<span class="co-red"><?php echo ($list["user_money"]); ?></span></p>
                                        <p>应付金额（含运费）:<span class="co-red fo-si-18"><?php echo ($list['order_amount']); ?></span></p>
                                    </td>
                                    <td rowspan="1" class="col-operate">
										<?php if($list["cancel_btn"] == 1): ?><p class="p-link"><a onClick="cancel_order(<?php echo ($list["order_id"]); ?>)" >取消订单</a></p><?php endif; ?>																			
                                        <?php if($list["pay_btn"] == 1): ?><p class="p-button"><a class="button-operate-pay di-in-bl hb-merge" href="<?php echo U('/Home/Cart/cart4',array('order_id'=>$list[order_id]));?>" target="_blank"><span>立即支付</span></a></p><?php endif; ?>
                                        <?php if($list["receive_btn"] == 1): ?><p class="p-button"><a class="button-operate-pay di-in-bl hb-merge" onClick=" if(confirm('你确定收到货了吗?')) location.href='<?php echo U('Home/User/order_confirm',array('id'=>$list['order_id']));?>'" target="_blank"><span>收货确认</span></a></p><?php endif; ?>
										<p class="p-link"><a href="<?php echo U('Home/User/order_detail',array('id'=>$list['order_id']));?>">订单详情</a></p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <!--订单列表结束-->
            </div>
            <div class="merge">
                <!--<label class="ma-ri-20 di-in-bl cu-po"  name="bottomCheckBoxDiv"><input name="bottomCheckBoxDiv" class="ma-ri-10  ve-al-mi" id="checkallbox" type="checkbox"><span class="ve-al-mi fo-si-14 fo-fa-ta">全选</span></label>-->
                <!--<a class=" di-in-bl hb-merge" href="">合并支付</a>-->
                <?php echo ($page); ?>
            </div>
        </div>
    </div>
</div>
<div class="he80"></div>
<!--------footer-开始-------------->
<div class="footer">
    <div class="layout quality layer">
        <ul class="footer_quality">
            <li><i></i>品质保证</li>
            <li  class="f2"><i></i>7天退换 15天换货</li>
            <li  class="f3"><i></i>100元起免运费</li>
            <li  class="f4"><i></i>448家维修网点 全国联保</li>
        </ul>
    </div>
    <div class="helpful layout">
        <dl>
            <dt>帮助中心</dt>
            <dd>
                <ol>
                    <li><a href="">购物指南</a></li>
                    <li><a href="">配送方式</a></li>
                    <li><a href="">支付方式</a></li>
                    <li><a href="">常见问题</a></li>
                </ol>
            </dd>
        </dl>
        <dl class="shfw">
            <dt>售后服务</dt>
            <dd>
                <ol>
                    <li><a href="">保修政策</a></li>
                    <li><a href="">退换货政策</a></li>
                    <li><a href="">退换货流程</a></li>
                    <li><a href="">手机寄修服务</a></li>
                </ol>
            </dd>
        </dl>
        <dl class="/Public/default/jszc">
            <dt>技术支持</dt>
            <dd>
                <ol>
                    <li><a href="">售后网点</a></li>
                    <li><a href="">常见问题</a></li>
                    <li><a href="">产品手册</a></li>
                    <li><a href="">软件下载</a></li>
                </ol>
            </dd>
        </dl>
        <dl class="gysc">
            <dt>关于商城</dt>
            <dd>
                <ol>
                    <li><a href="">公司介绍</a></li>
                    <li><a href="">商城简介</a></li>
                    <li><a href="">联系客服</a></li>
                </ol>
            </dd>
        </dl>
        <dl class="gzwm">
            <dt>关注我们</dt>
            <dd>
                <ol>
                    <li><a href="">新浪微博</a></li>
                    <li><a href="">腾讯微博</a></li>
                    <li><a href="">花粉社区</a></li>
                    <li><a href="">商城手机版</a></li>
                </ol>
            </dd>
        </dl>
    </div>
    <div class="keep-on-record">
        <p>Copyright © 2016-2025 <?php echo ($tpshop_config['shop_info_store_name']); ?>  版权所有 保留一切权利 备案号:<?php echo ($tpshop_config['shop_info_record_no']); ?></p>
    </div>
</div>

<!--------footer-结束-------------->


</body>
<script>
    /*$(function () {
     $("#h-s").click(function () {
     $('.ec-ta-x').css('left','124px');
     $('.ec-ta-x').css('width','110px');
     $(this).addClass("cullent");
     $('#q-s').removeClass("cullent");
     });
     });
     */
</script>

<script>
    $(function () {
        //高亮显示
        var active = '<?php echo ($active_status); ?>';
        if(!active)
            active = 'ALL';
        $('.wddd-li li').removeClass('wddd-red');
        $('#'+active).addClass('wddd-red');

        $("#h-s").mouseover(function () {
            $('.ec-ta-x').css('left','124px');
            $('.ec-ta-x').css('width','110px');
            $(this).addClass("cullent");
        });
        $("#h-s").mouseout(function () {
            $('.ec-ta-x').css('left','0px');
            $('.ec-ta-x').css('width','124px');
            $(this).removeClass("cullent");
        });
    });
    $(function () {
        $("#q-s").mouseover(function () {
            $('.ec-ta-x').css('left','0px');
            $(this).addClass("cullent");
        });
        $("#q-s").mouseout(function () {
            $('.ec-ta-x').css('left','0px');
        });
    });
    //取消订单
    function cancel_order(id){
        if(!confirm("确定取消订单?"))
            return false;
        location.href = "/index.php?m=Home&c=User&a=cancel_order&id="+id;
    }
</script>
</html>