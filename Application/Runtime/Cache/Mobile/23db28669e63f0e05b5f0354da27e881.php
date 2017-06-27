<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html>
<head>
<meta name="Generator" content="TPshop v1.1" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>首页-<?php echo ($tpshop_config['shop_info_store_title']); ?></title>
<meta http-equiv="keywords" content="<?php echo ($tpshop_config['shop_info_store_keyword']); ?>" />
<meta name="description" content="<?php echo ($tpshop_config['shop_info_store_desc']); ?>" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<link rel="stylesheet" type="text/css" href="/Template/mobile/new/Static/css/public.css"/>
<link rel="stylesheet" type="text/css" href="/Template/mobile/new/Static/css/index.css"/>
<script type="text/javascript" src="/Template/mobile/new/Static/js/jquery.js"></script>
<script type="text/javascript" src="/Template/mobile/new/Static/js/TouchSlide.1.1.js"></script>
<script type="text/javascript" src="/Template/mobile/new/Static/js/jquery.json.js"></script>
<script type="text/javascript" src="/Template/mobile/new/Static/js/touchslider.dev.js"></script>
<script type="text/javascript" src="/Template/mobile/new/Static/js/layer.js" ></script>
<script src="/Public/js/global.js"></script>
<script src="/Public/js/mobile_common.js"></script>

</head>
<body>
<div id="page" class="showpage">
<div>
<header id="header"> 
<a href="<?php echo U('Goods/categoryList');?>" class="top_bt"></a><a href="<?php echo U('Cart/cart');?>" class='user_btn'></a>
<span href="javascript:void(0)" class="logo"><?php echo ($tpshop_config['shop_info_store_name']); ?></span> 
</header>

<div id="scrollimg" class="scrollimg">

</div>


<div id="fake-search" class="index_search">
  <div class="index_search_mid" style="height:40%; padding-top:50px; padding-bottom:30px;">
  <?php echo ($prompt); ?>
  <p>查看今日菜品情况或购买更多优质优价食品请点击······
  </div>
</div>

<div style="text-align:center;">
	
					 
			<li style="width:50%; float:left;background:#FFF;">
				<a href="<?php echo U('Activity/group_list');?>">
					<img alt="我的订单" src="/Template/mobile/new/Static/images/integral.png" />
					
				</a>
			</li>
			<li style="width:50%; float:right;background:#FFF;">
				<a href="<?php echo U('Cart/cart');?>">
					<img alt="购物车" src="/Template/mobile/new/Static/images/more.png" />
					
				</a>
			</li>
			
		
</div>
 

  
 
<section class="index_floor">
  <div class="floor_body1">
    <h2><em></em>精品推荐
        <!--<div class="geng"> <a href="<?php echo U('Goods/search',array('q'=>'精品'));?>">更多</a> <span></span></div>-->
    </h2>
    <div id="scroll_best" class="scroll_hot">
      <div class="bd">
        <ul>
        <?php $fl = '1'; ?>
         <?php
 $md5_key = md5("select * from __PREFIX__goods where is_recommend=1 order by sort limit 9"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from __PREFIX__goods where is_recommend=1 order by sort limit 9"); S("sql_".$md5_key,$sql_result_v,31104000); } foreach($sql_result_v as $k=>$v): ?><li>
            <a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id]));?>" title="<?php echo ($v["goods_name"]); ?>">
             <div class="index_pro"> 
	              <div class="products_kuang">
	                <img src="<?php echo (goods_thum_images($v["goods_id"],400,400)); ?>"></div>
	              <div class="goods_name"><?php echo ($v["goods_name"]); ?></div>
	              <div class="price">
	                 <a href="javascript:AjaxAddCart(<?php echo ($v[goods_id]); ?>,1,0);" class="btns">
	                    <img src="/Template/mobile/new/Static/images/index_flow.png">
	                 </a>
	                 <span href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id]));?>" class="price_pro">￥<?php echo ($v["shop_price"]); ?>元</span>
	              </div>
              </div>
            </a>
           </li>
           <?php if(($fl++%3 == 0) && ($fl < 9)): ?></ul><ul><?php endif; endforeach; ?>
           </ul>
       </div>
       <div class="hd">
          <ul></ul>
       </div>
      </div>
    </div>
  </section>
  <script type="text/javascript">
    TouchSlide({ 
      slideCell:"#scroll_best",
      titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
      effect:"leftLoop", 
      autoPage:true, //自动分页
      //switchLoad:"_src" //切换加载，真实图片路径为"_src" 
    });
  </script>
<section class="index_floor">
  <div class="floor_body1" >
    <h2>
      <em></em>
      新品上市
        <!--<div class="geng"><a href="<?php echo U('Goods/search',array('q'=>'新品'));?>" >更多</a> <span></span></div>-->
    </h2>
    <div id="scroll_new" class="scroll_hot">
      <div class="bd">
        <ul>
        <?php $fl = '1'; ?>
         <?php
 $md5_key = md5("select * from __PREFIX__goods where is_new=1 order by sort limit 9"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from __PREFIX__goods where is_new=1 order by sort limit 9"); S("sql_".$md5_key,$sql_result_v,31104000); } foreach($sql_result_v as $k=>$v): ?><li>
            <a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id]));?>" title="<?php echo ($v["goods_name"]); ?>">
             <div class="index_pro"> 
	              <div class="products_kuang">
	                <img src="<?php echo (goods_thum_images($v["goods_id"],400,400)); ?>"></div>
	              <div class="goods_name"><?php echo ($v["goods_name"]); ?></div>
	              <div class="price">
	                 <a href="javascript:AjaxAddCart(<?php echo ($v[goods_id]); ?>,1,0);" class="btns">
	                    <img src="/Template/mobile/new/Static/images/index_flow.png">
	                 </a>
	                 <span href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id]));?>" class="price_pro">￥<?php echo ($v["shop_price"]); ?>元</span>
	              </div>
              </div>
            </a>
           </li>
           <?php if(($fl++%3 == 0) && ($fl < 9)): ?></ul><ul><?php endif; endforeach; ?></ul>
        </div>
        <div class="hd">
          <ul></ul>
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript">
    TouchSlide({ 
      slideCell:"#scroll_new",
      titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
      effect:"leftLoop", 
      autoPage:true, //自动分页
      //switchLoad:"_src" //切换加载，真实图片路径为"_src" 
    });
  </script>
<section class="index_floor">
  <div class="floor_body1" >
    <h2><em></em>热销商品
        <!--<div class="geng"><a href="<?php echo U('Goods/search',array('q'=>'热销'));?>" >更多</a> <span></span></div>-->
    </h2>
    <div id="scroll_hot" class="scroll_hot">
      <div class="bd">
        <ul>
        <?php $fl = '1'; ?>
         <?php
 $md5_key = md5("select * from __PREFIX__goods where is_hot=1 order by sort limit 9"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from __PREFIX__goods where is_hot=1 order by sort limit 9"); S("sql_".$md5_key,$sql_result_v,31104000); } foreach($sql_result_v as $k=>$v): ?><li>
            <a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id]));?>" title="<?php echo ($v["goods_name"]); ?>">
             <div class="index_pro"> 
	              <div class="products_kuang">
	                <img src="<?php echo (goods_thum_images($v["goods_id"],400,400)); ?>"></div>
	              <div class="goods_name"><?php echo ($v["goods_name"]); ?></div>
	              <div class="price">
	                 <a href="javascript:AjaxAddCart(<?php echo ($v[goods_id]); ?>,1,0);" class="btns">
	                    <img src="/Template/mobile/new/Static/images/index_flow.png">
	                 </a>
	                 <span href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id]));?>" class="price_pro">￥<?php echo ($v["shop_price"]); ?>元</span>
	              </div>
              </div>
            </a>
           </li>
           <?php if(($fl++%3 == 0) && ($fl < 9)): ?></ul><ul><?php endif; endforeach; ?></ul>
          </div>
        <div class="hd">
          <ul></ul>
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript">
    TouchSlide({ 
      slideCell:"#scroll_hot",
      titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
      effect:"leftLoop", 
      autoPage:true, //自动分页
      //switchLoad:"_src" //切换加载，真实图片路径为"_src" 
    });
  </script>
 
    
    	<section class="mix_recently_search"><h3>热门搜索</h3>
	     <ul>
            <?php if(is_array($tpshop_config["hot_keywords"])): foreach($tpshop_config["hot_keywords"] as $k=>$wd): ?><li><a href="<?php echo U('Goods/search',array('q'=>$wd));?>" <?php if($k == 0): ?>class="ht"<?php endif; ?>><?php echo ($wd); ?></a></li><?php endforeach; endif; ?>         
	      </ul>
        </section>
    </div>
                                             
</div>
<div style="height:50px; line-height:50px; clear:both;"></div>
<div class="v_nav">
	<div class="vf_nav">
		<ul>
			<li> <a href="<?php echo U('Index/index');?>">
			    <i class="vf_1"></i>
			    <span>首页</span></a></li>
			<li><a href="tel:<?php echo ($tpshop_config['shop_info_phone']); ?>">
			    <i class="vf_2"></i>
			    <span>客服</span></a></li>
			<li><a href="<?php echo U('Goods/categoryList');?>">
			    <i class="vf_3"></i>
			    <span>分类</span></a></li>
			<li>
			<a href="<?php echo U('Cart/cart');?>">
			   <em class="global-nav__nav-shop-cart-num" id="cart_quantity" style="right:9px;"></em>
			   <i class="vf_4"></i>
			   <span>购物车</span>
			   </a>
			</li>
			<li><a href="<?php echo U('User/index');?>">
			    <i class="vf_5"></i>
			    <span>我的</span></a>
			</li>
		</ul>
	</div>
</div> 
<script type="text/javascript">
$(document).ready(function(){
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
});
</script>
<!-- 微信浏览器 调用微信 分享js-->
<?php if($signPackage != null): ?><script type="text/javascript" src="/Template/mobile/new/Static/js/jquery.js"></script>
<script src="/Public/js/global.js"></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">

<?php if(ACTION_NAME == 'goodsInfo'): ?>var ShareLink = "http://<?php echo ($_SERVER[HTTP_HOST]); ?>/index.php?m=Mobile&c=Goods&a=goodsInfo&id=<?php echo ($goods[goods_id]); ?>"; //默认分享链接
   var ShareImgUrl = "http://<?php echo ($_SERVER[HTTP_HOST]); echo (goods_thum_images($goods[goods_id],400,400)); ?>"; // 分享图标
<?php else: ?>
   var ShareLink = "http://<?php echo ($_SERVER[HTTP_HOST]); ?>/index.php?m=Mobile&c=Index&a=index"; //默认分享链接
   var ShareImgUrl = "http://<?php echo ($_SERVER[HTTP_HOST]); echo ($tpshop_config['shop_info_store_logo']); ?>"; // 分享图标<?php endif; ?>

var is_distribut = getCookie('is_distribut'); // 是否分销代理
var user_id = getCookie('user_id'); // 当前用户id
//alert(is_distribut+'=='+user_id);

// 如果已经登录了, 并且是分销商
if(parseInt(is_distribut) == 1 && parseInt(user_id) > 0)
{									
	ShareLink = ShareLink + "&first_leader="+user_id;									
}										


// 微信配置
wx.config({
    debug: false, 
    appId: "<?php echo ($signPackage['appId']); ?>", 
    timestamp: '<?php echo ($signPackage["timestamp"]); ?>', 
    nonceStr: '<?php echo ($signPackage["nonceStr"]); ?>', 
    signature: '<?php echo ($signPackage["signature"]); ?>',
    jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage','onMenuShareQQ','onMenuShareQZone','hideOptionMenu'] // 功能列表，我们要使用JS-SDK的什么功能
});

// config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
wx.ready(function(){
    // 获取"分享到朋友圈"按钮点击状态及自定义分享内容接口
    wx.onMenuShareTimeline({
        title: "<?php echo ($tpshop_config['shop_info_store_title']); ?>", // 分享标题
        link:ShareLink,
        imgUrl:ShareImgUrl // 分享图标
    });

    // 获取"分享给朋友"按钮点击状态及自定义分享内容接口
    wx.onMenuShareAppMessage({
        title: "<?php echo ($tpshop_config['shop_info_store_title']); ?>", // 分享标题
        desc: "<?php echo ($tpshop_config['shop_info_store_desc']); ?>", // 分享描述
        link:ShareLink,
        imgUrl:ShareImgUrl // 分享图标
    });
	// 分享到QQ
	wx.onMenuShareQQ({
        title: "<?php echo ($tpshop_config['shop_info_store_title']); ?>", // 分享标题
        desc: "<?php echo ($tpshop_config['shop_info_store_desc']); ?>", // 分享描述
        link:ShareLink,
        imgUrl:ShareImgUrl // 分享图标
	});	
	// 分享到QQ空间
	wx.onMenuShareQZone({
        title: "<?php echo ($tpshop_config['shop_info_store_title']); ?>", // 分享标题
        desc: "<?php echo ($tpshop_config['shop_info_store_desc']); ?>", // 分享描述
        link:ShareLink,
        imgUrl:ShareImgUrl // 分享图标
	});

   <?php if(CONTROLLER_NAME == 'User'): ?>wx.hideOptionMenu();  // 用户中心 隐藏微信菜单<?php endif; ?>
	
});
</script>


<!--微信关注提醒 start-->
<?php if($_SESSION['subscribe']== 0): ?><button class="guide" onclick="follow_wx()">关注公众号</button>
<style type="text/css">
.guide{width:20px;height:100px;text-align: center;border-radius: 8px ;font-size:12px;padding:8px 0;border:1px solid #adadab;color:#000000;background-color: #fff;position: fixed;right: 6px;bottom: 200px;}
#cover{display:none;position:absolute;left:0;top:0;z-index:18888;background-color:#000000;opacity:0.7;}
#guide{display:none;position:absolute;top:5px;z-index:19999;}
#guide img{width: 70%;height: auto;display: block;margin: 0 auto;margin-top: 10px;}
</style>
<script type="text/javascript" src="/Template/mobile/new/Static/js/layer.js" ></script>
<script type="text/javascript">

  // 关注微信公众号二维码	 
function follow_wx()
{
	layer.open({
		type : 1,  
		title: '关注公众号',
		content: '<img src="<?php echo ($wechat_config['qr']); ?>" width="200">',
		style: ''
	});
}
 
</script><?php endif; ?>
<!--微信关注提醒  end--><?php endif; ?>
<!-- 微信浏览器 调用微信 分享js  end-->
 
<script type="text/javascript">
$(function() {
    $('#search_text').click(function(){
        $(".showpage").children('div').hide();
        $("#search_hide").css('position','fixed').css('top','0px').css('width','100%').css('z-index','999').show();
    })
    $('#get_search_box').click(function(){
        $(".showpage").children('div').hide();
        $("#search_hide").css('position','fixed').css('top','0px').css('width','100%').css('z-index','999').show();
    })
    $("#search_hide .close").click(function(){
        $(".showpage").children('div').show();
        $("#search_hide").hide();
    })
});
</script>
<script>
$('.search-type li').click(function() {
    $(this).addClass('cur').siblings().removeClass('cur');
    $('#searchtype').val($(this).attr('num'));
});
$('#searchtype').val($(this).attr('0'));
</script>
<script src="/Public/js/jqueryUrlGet.js"></script><!--获取get参数插件-->
<script> set_first_leader(); //设置推荐人 </script>
<!--[if lt IE 9]>
<script src="/Template/mobile/new/Static/js/json.js" charset="utf-8"></script>
<![endif]-->



</body>
</html>