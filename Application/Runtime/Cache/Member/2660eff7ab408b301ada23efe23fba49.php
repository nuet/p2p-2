<?php if (!defined('THINK_PATH')) exit();?>
<style type="text/css">
.tdHeard, .tdContent { border: solid 1px #ccc; }
#pager { margin: 10px 4px 3px 0px; }
.notes_frame { width: 715px; overflow: hidden; margin: 0 auto; height: 40px; margin-top: 10px; }
.notes_frame div { padding-top: 13px; }
.operaframe { width: 720px; overflow: hidden; line-height: 27px; padding-left: 25px; margin-top: 20px; }
.operaframe ul { padding: 0px; margin: 0px; text-align: left; overflow: hidden; line-height: 25px; }
.operaframe ul li { float: left; line-height: 25px; }
</style>

<div class="top_account_bg" style="overflow:hidden; height:20px; line-height:25px">
	<img src="/new1/Style/H/images/ministar.gif" style="margin-right: 5px;">
	失败的借款
</div>
<!--选择操作-->
<div class="operaframe">
	<ul id="formTb">
		<li style="width: 70px;"><strong>起止日期：</strong> </li>
		<li style="width: 240px;">
			<input type="text" id="start_time4" value="<?php if($search['start_time4']){echo date('Y-m-d',$search['start_time4']);} ?>" readonly="readonly" class="Wdate timeInput_Day" onFocus="WdatePicker({maxDate:'#F{$dp.$D(\'end_time4\')||\'2020-10-01\'}'})"/>
			至
			<input type="text" value="<?php if($search['end_time4']){echo date('Y-m-d',$search['end_time4']);} ?>" id="end_time4" readonly="readonly" class="Wdate timeInput_Day" onFocus="WdatePicker({minDate:'#F{$dp.$D(\'start_time4\')||\\\'2020-10-01\'}'})"/>
		</li>
		<li style="width: 120px;">
			<img alt="" src="/new1/Style/M/images/chakan.jpg" id="btn_search" onclick="sdetail4()" style="cursor: pointer;">
		</li>
	</ul>
</div>
<div style="margin-top: 20px; overflow: hidden; text-align: left;">
	<table id="content" style="width: 785px; border-collapse: collapse;
		margin-left: 10px;" cellspacing="0">
		<tbody><tr>
			<th scope="col" class="tdHeard" style="width: 130px;">
				借款标号
			</th>
			<th scope="col" class="tdHeard" style="width: 160px;">
				还款方式
			</th>
			<th scope="col" class="tdHeard" style="width: 100px;">
				借款金额
			</th>
			<th scope="col" class="tdHeard" style="width: 80px;">
				借款时间
			</th>
			<th scope="col" class="tdHeard" style="width: 100px;">
				标的状态
			</th>
			<th scope="col" class="tdHeard" style="width: 100px;">
				备注
			</th>
		</tr>
	
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="nodatashowtr">
		<td class="tdContent"><a href="/invest/<?php echo ($vo["id"]); ?>.html" title="<?php echo ($vo["borrow_name"]); ?>"><?php echo ($vo["id"]); ?></a></td>
		<td class="tdContent"><?php echo ($vo["repayment_type"]); ?></td>
		<td class="tdContent"><?php echo ($vo["borrow_money"]); ?></td>
		<td class="tdContent"><?php echo (date("Y-m-d H:i",$vo["add_time"])); ?></td>
		<td class="tdContent"><?php echo ($vo["status"]); ?></td>
		<td class="tdContent"><?php echo ((isset($vo["dealinfo"]["deal_info"]) && ($vo["dealinfo"]["deal_info"] !== ""))?($vo["dealinfo"]["deal_info"]):"未填写备注说明"); ?></td>
	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</tbody></table>
	<div data="fragment-5" id="pager" style="float: right; text-align: right; width: 500px; padding-right: 0px;" class="yahoo2 ajaxpagebar"><?php echo ($pagebar); ?></div>
</div>
<div style="clear: both; float: none;">
</div>

<script type="text/javascript">
function sdetail4(){
	x = makevar(['start_time4','end_time4']);
	$.ajax({
		url: "/new1/index.php/Member/Borrowin/borrowfail",
		data: x,
		timeout: 5000,
		cache: false,
		type: "get",
		dataType: "json",
		success: function (d, s, r) {
			if(d) $("#fragment-5").html(d.html);//更新客户端竞拍信息 作个判断，避免报错
		}
	});
}

$('.ajaxpagebar a').click(function(){
	try{	
		var geturl = $(this).attr('href');
		var id = $(this).parent().attr('data');
		var x={};
        $.ajax({
            url: geturl,
            data: x,
            timeout: 5000,
            cache: false,
            type: "get",
            dataType: "json",
            success: function (d, s, r) {
              	if(d) $("#"+id).html(d.html);//更新客户端竞拍信息 作个判断，避免报错
            }
        });
	}catch(e){};
	return false;
})
</script>