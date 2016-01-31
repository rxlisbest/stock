<script type="text/javascript">
    function print(){
	$("#cart").jqprint();
    }
</script>
<!-- 左侧内容 -->
<div class="left-sidebar"><!-- Left sidebar starts here -->
    <!-- 客户列表 -->
    <div class="row-fluid">
        <div class="span12">
            <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <?php echo $customer->c_name; ?> 购买清单 
                </div>
                <span class="tools">
                    <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                </span>
            </div>
            <div class="widget-body" id="cart">

            <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                <thead>
                    <tr>
                        <th style="width:25%">
                            货物名称
                        </th>
                        <th style="width:25%">
                            单价（元/斤）
                        </th>
                        <th style="width:25%">
                            库存（斤）
                        </th>
			<th style="width:25%">
			    小记（元）
			</th>
                    </tr>
                </thead>
                <tbody>
		    <?php $total_money = 0; ?>
                    <?php foreach ($list as $item): ?>
                    <tr>
                        <td>
			    <span class="name">
				<?php echo $item->g_name; ?>
			    </span>
                        </td>

                        <td>
                            <?php echo $item->price ?> 
                        </td>

                        <td>
                            <?php echo $item->quantity ?> 
                        </td>

                        <td>
                            <?php echo sprintf("%.2f", $item->quantity*$item->price) ?> 
                        </td>
                    </tr>
		    <?php $total_money = ($total_money*100 + $item->price*$item->quantity*100)/100; ?>
                    <?php endforeach; ?>
		    <tr>
			<td colspan="4">
			    <h4 class="pull-right">总计：<?php echo sprintf("%.2f", $total_money); ?>元</h4>
			</td>
		    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>

</div><!-- left sidebar ends here -->
</div>


<!-- 右侧内容 -->
<div class="right-sidebar"><!-- Right sidebar starts here -->
    <div class="wrapper">
        <a href="/goods/out/<?php echo $customer->id; ?>">
            <button class="btn btn-large btn-info btn-block" type="button">继续出库</button>
        </a>
    </div>
    <div class="wrapper">
        <a href="/customer">
            <button class="btn btn-large btn-info btn-block" type="button">返回客户列表</button>
        </a>
    </div>
    <div class="wrapper">
        <button class="btn btn-large btn-info btn-block" onclick="print()" type="button">打印凭条</button>
    </div>
</div><!-- Right sidebar ends here -->
