<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ($ts['site']['site_name']); ?>管理后台</title>
<link href="/p2p/Style/A/css/style.css" rel="stylesheet" type="text/css">
<link href="/p2p/Style/A/js/tbox/box.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/p2p/Style/A/js/jquery.js"></script>
<script type="text/javascript" src="/p2p/Style/A/js/common.js"></script>
<script type="text/javascript" src="/p2p/Style/A/js/tbox/box.js"></script>
</head>
<body>
<style type="text/css">
.quxiantu{ margin-top:30px;}
.qleft{ float:left; width:50%; text-align:left;}
.qright{ float:right; width:50%; text-align:right;}

.ssx a{height:30px; line-height:30px}
.lf{
    float:left;
    width:48%; border:1px solid #c7d8ea; margin: 10px;
}
.lf h6{
    border-bottom: 1px solid #c7d8ea;
    color: #3a6ea5;
    height: 26px;
    line-height: 28px;
    padding: 0 10px;
    font-size: 13px;
}
.lf .content{
    padding: 9px 10px;
    line-height: 22px;
}
.lf .content a{
    color:red;
    font-weight:bold;
}
</style>
<script type="text/javascript" src="/p2p/Style/Js/highcharts.js"></script>
<script type="text/javascript" src="/p2p/Style/Js/exporting.js"></script>
<div class="so_main">
  <div class="page_tit">欢迎页</div>
  <!--列表模块-->
  <div class="Toolbar_inbox">
    <div class="page right">
	当前时间<span id="clock"></span>
    </div>
    <a href="javascript:;" class="btn_a"><span>欢迎登陆</span></a></div>
<script>
function changeClock()
{
	var d = new Date();
	document.getElementById("clock").innerHTML = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
}
window.setInterval(changeClock, 1000);
</script>  
<div class="lf">
    <h6>个人信息</h6>
    <div class="content">
        您好，<?php echo ($user["user_name"]); ?>
        <br />
        所属角色：<?php echo ($user["groupname"]); ?> 
        <br />
        上次登录时间：<?php echo (date('Y-m-d H:i:s',$user["last_log_time"])); ?>
        <br />
        上次登录IP：<?php echo ($user["last_log_ip"]); ?>   
    </div>
</div>
<div class="lf">
    <h6>系统信息</h6>
	 <div class="content">
     <div style="float: left; width:300px;">
        融海行程序版本：融海行超级版 
     </div>
    <div style="float: left;">
        操作系统：<?php echo ($service["service_name"]); ?> 
     </div>
     <br />
	<div style="float: left; width:300px;">
       服务器软件：<?php echo ($service["service"]); ?>
     </div>
    <div style="float: left;">
        MySQL 版本：<?php echo ($service["mysql"]); ?>
     </div>
     <br />
	 <div style="float: left; width:300px;">
      服务器协议：<?php echo ($_SERVER['SERVER_PROTOCOL']); ?>
     </div>
    <div style="float: left;">
      服务器名称：<?php echo ($_SERVER['SERVER_NAME']); ?>
     </div>
     <br />
	 <div style="float: left; width:300px;">
      PHP运行方式：<?php echo strtoupper(php_sapi_name())?>
     </div>
    <div style="float: left;">
      PHP版本：<?php echo PHP_VERSION?>
     </div>
	<br />
	 </div>
</div>
<div class="lf">
    <h6>待审核工作</h6>
    <div class="content">
     <div style="float: left; width:300px;">
        等待初审的标[<?php if($row["borrow_1"] > 0): ?><a href="/p2p/index.php/admin/borrow/waitverify.html" ><?php echo ($row["borrow_1"]); ?></a><?php else: ?> 0<?php endif; ?>]个
     </div>
    <div style="float: left; width:300px;">
        等待复审的标[<?php if($row["borrow_2"] > 0): ?><a href="/p2p/index.php/admin/borrow/waitverify2.html"><?php echo ($row["borrow_2"]); ?></a><?php else: ?> 0<?php endif; ?>]个
     </div>
     <br />
	 <div style="float: left; width:300px;">  
        等待VIP认证的[<?php if($row["vip_a"] > 0): ?><a href="/p2p/index.php/admin/vipapply/index?status=0"><?php echo ($row["vip_a"]); ?></a><?php else: ?> 0<?php endif; ?>]个
     </div>
	 <br/>
	 <div style="float: left; width:300px;">   
         等待实名认证的[<?php if($row["real_a"] > 0): ?><a href="/p2p/index.php/admin/memberid/index?status=3"><?php echo ($row["real_a"]); ?></a><?php else: ?> 0<?php endif; ?>]个
     </div>
     <!--<div style="float: left; width:300px;">
        额度申请等待审核的[<?php if($row["limit_a"] > 0): ?><a href="/p2p/index.php/admin/members/infowait.html"><?php echo ($row["limit_a"]); ?></a><?php else: ?> 0<?php endif; ?>]个 
     </div>-->
	 <br />
     <div style="float: left; width:300px;"> 
        上传资料等待审核的[<?php if($row["data_up"] > 0): ?><a href="/p2p/index.php/admin/memberdata/index.html"><?php echo ($row["data_up"]); ?></a><?php else: ?> 0<?php endif; ?>]个
     </div>
     <br />
    
     <div style="float: left; width:300px;">   
        等待审核提现[<?php if($row["withdraw"] > 0): ?><a href="/p2p/index.php/admin/Withdrawlogwait/index.html"><?php echo ($row["withdraw"]); ?></a><?php else: ?> 0<?php endif; ?>]个
     </div>
	  <br />
	  <br />
    </div>
</div>
<div class="lf">
    <h6>开发团队</h6>
    <div class="content">
        版权所有：融海行
    </div>
</div>
</div>
<script type="text/javascript" src="/p2p/Style/A/js/adminbase.js"></script>
</body>
</html>