<div class="left-sidebar"><!-- Left sidebar starts here -->
  <div class="row-fluid">
    <div class="span12">
      <div class="widget">
      <div class="widget-header">
        <div class="title">
	    <?php echo $customer->c_name; ?>
        </div>
        <span class="tools">
          <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
        </span>
      </div>
      <div class="widget-body">
            <table class="table table-bordered table-hover no-margin">
                <thead>
                    <tr>
                        <th style="width:20%">
			    购买时间 
                        </th>
                        <th style="width:20%">
                            货物名称
                        </th>
                        <th style="width:20%">
                            单价（元/斤）
                        </th>
                        <th style="width:20%">
                            库存 （斤）
                        </th>
                        <th style="width:20%">
			    总价
                        </th>
                    </tr>
                </thead>
                <tbody>
		    <?php $total = 0; ?>
                    <?php foreach($list as $value): ?>
		    <?php $total_money = 0; ?>
		    <?php $i = 0; ?>
		    <?php foreach($value->list ?: array() as $item): ?>
			<?php $total_money = ($total_money*100 + $item->price*$item->quantity*100)/100; ?>
			<?php $total = ($total*100 + $item->price*$item->quantity*100)/100; ?>
                    <?php endforeach; ?>
		    <?php foreach($value->list ?: array() as $item): ?>
                    <tr>
		    <?php if(!$i): ?>
                        <td valign="middle" align="center" rowspan="<?php echo count($value->list);?>">
                            <?php echo $value->createtime ?> 
                        </td>
		    <?php endif; ?>
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
		    
		    <?php if(!$i): ?>
                        <td rowspan="<?php echo count($value->list);?>">
			    <?php echo sprintf("%.2f", $total_money); ?> 元
                        </td>
		    <?php endif; ?>
                    </tr>
		    <?php $i++; ?>
                    <?php endforeach; ?>
                    <?php endforeach; ?>
		    <tr>
			<td colspan="5">
			    <h4 class="pull-right">共计：<?php echo sprintf("%.2f", $total); ?> 元</h4>
			</td>
		    </tr>
                </tbody>
            </table>
      </div>
      </div>
    </div>
  </div>

</div><!-- left sidebar ends here -->


<!-- 右侧内容 -->
<div class="right-sidebar"><!-- Right sidebar starts here -->
  <div class="wrapper">
    <a href="/customer">
      <button class="btn btn-large btn-info btn-block" type="button">返回</button>
    </a>
  </div>
</div><!-- Right sidebar ends here -->
