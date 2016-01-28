<div class="left-sidebar"><!-- Left sidebar starts here -->
  <div class="row-fluid">
    <div class="span7">
      <div class="widget">
      <div class="widget-header">
        <div class="title">
          库存
        </div>
        <span class="tools">
          <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
        </span>
      </div>
      <div class="widget-body">
	<table class="table table-condensed table-striped table-bordered table-hover no-margin">
	    <thead>
		<tr>
		    <th style="width:30%">
			货物名称
		    </th>
		    <th style="width:25%" class="hidden-phone">
			库存（斤）
		    </th>
		    <th style="width:25%" class="hidden-phone">
			单价（元/斤）
		    </th>
		    <th style="width:25%" class="hidden-phone">
			出库（斤）
		    </th>
		    <th style="width:10%">
			操作
		    </th>
		</tr>
	    </thead>
	    <tbody>
		<?php foreach ($goods as $item): ?>
		<tr>
		    <td>
			<a href="/goods/detail/<?php echo $item->id; ?>">
			    <span class="name">
				<?php echo $item->name; ?>
				<input value="<?php echo $item->name; ?>" type="hidden" class="span6" />
			    </span>
			</a>
		    </td>
		    <td class="hidden-phone">
			<?php echo $item->quantity; ?>
		    </td>
		    <td class="hidden-phone">
			<input type="text" class="span6" />元
		    </td>

		    <td class="hidden-phone">
			<input type="text" class="span6"  />斤
		    </td>
		    <td>
			<input type="hidden" value="<?php echo $item->id;?>" />
			
			<div class="btn-group">
			    <button class="btn btn-primary bottom-margin" type="button">
				添加
			    </button>
			</div>
		    </td>
		    
		</tr>
		<?php endforeach; ?>
	    </tbody>
	</table>
      </div>
      <?php echo $pagination;?>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span5">
      <div class="widget">
      <div class="widget-header">
        <div class="title">
          <?php echo $customer->c_name;?> 购物清单
        </div>
        <span class="tools">
          <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
        </span>
      </div>
      <div class="widget-body">
	<table class="table table-condensed table-striped table-bordered table-hover no-margin">
	    <thead>
		<tr>
		    <th style="width:30%">
			货物名称
		    </th>
		    <th style="width:25%" class="hidden-phone">
			单价（元/斤）
		    </th>
		    <th style="width:25%" class="hidden-phone">
			出库（斤）
		    </th>
		    <th style="width:10%">
			操作
		    </th>
		</tr>
	    </thead>
	    <tbody>
		<?php foreach ($cart?:array() as $key => $item): ?>
		<tr>
		    <td>
			<span class="name">
			    <?php echo $item['name']; ?>
			</span>
		    </td>
		    <td class="hidden-phone">
			<?php echo $item['price']; ?>
		    </td>

		    <td class="hidden-phone">
			<?php echo $item['quantity']; ?>
		    </td>
		    <td>
			<a onclick="del(<?php echo $key; ?>)">
			  <i class="icon-trash">
			  </i>
			</a>
		    </td>
		</tr>
		<?php endforeach; ?>
		<tr>
		    <td colspan="4">
			<h4 class="pull-right">总计：<?php echo $total_money; ?>元</h4>
		    </td>
		</tr>
	    </tbody>
	</table>
      </div>
    </div>
  </div>

</div><!-- left sidebar ends here -->


<!-- 右侧内容 -->
<div class="right-sidebar"><!-- Right sidebar starts here -->
  <div class="wrapper">
    <a href="/customer">
      <button class="btn btn-large btn-success btn-block" type="button">客户列表</button>
    </a>
  </div>
</div><!-- Right sidebar ends here -->

<script type="text/javascript">
    $(".btn-primary").click(function(){
	loading();
	var id = $(this).parent().parent().find("input").val();
	var name = $(this).parent().parent().prev().prev().prev().prev().find("input").val();
	var price = $(this).parent().parent().prev().prev().find("input").val();
	var quantity = $(this).parent().parent().prev().find("input").val();
	if(!price){
	    loaded();
	    $().toastmessage('showErrorToast', "单价不能为空");
	    return false;
	}
	if(!quantity){
	    loaded();
	    $().toastmessage('showErrorToast', "出库重量不能为空");
	    return false;
	}
	$.ajax({
	    type: "POST",
	    url: "/goods/cart/<?php echo $customer->id;?>",
	    data: {id:id, price:price, quantity:quantity, name:name},
	    dataType: "json",
	    success: function(data){
		if(data.code == 300){
			loaded();
			$().toastmessage('showErrorToast', data.msg);
			// TINY.box.show({html:data.msg,animate:false,close:false,boxid:'error',top:5});
			// gDialog.error('提示信息', data.errormsg);
		}
		else{
			// window.location.href = "/goods";
			window.location.reload();
		}
	    },
	    error: function(){
		loaded();
		$().toastmessage('showErrorToast', "网络错误");
	    }
	});
    });
    function del(id){
	loading();
	$.ajax({
	    type: "POST",
	    url: "/goods/delcart/<?php echo $customer->id;?>",
	    data: {id:id},
	    dataType: "json",
	    success: function(data){
		if(data.code == 300){
			loaded();
			$().toastmessage('showErrorToast', data.msg);
			// TINY.box.show({html:data.msg,animate:false,close:false,boxid:'error',top:5});
			// gDialog.error('提示信息', data.errormsg);
		}
		else{
			// window.location.href = "/goods";
			window.location.reload();
		}
	    },
	    error: function(){
		loaded();
		$().toastmessage('showErrorToast', "网络错误");
	    }
	});
    }
</script>
