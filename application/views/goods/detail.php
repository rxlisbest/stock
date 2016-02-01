<script src="/public/js/echarts.js"></script>
<script type="text/javascript">
    // Step:3 conifg ECharts's path, link to echarts.js from current page.
    // Step:3 为模块加载器配置echarts的路径，从当前页面链接到echarts.js，定义所需图表路径
    require.config({
	    paths: {
		    echarts: '/public/js'
	    }
    });
    
    // Step:4 require echarts and use it in the callback.
    // Step:4 动态加载echarts然后在回调函数中开始使用，注意保持按需加载结构定义图表路径
    require(
	    [
		    'echarts',
		    'echarts/chart/bar',
		    'echarts/chart/line',
		    'echarts/chart/map'
	    ],
	    function (ec) {
		    //--- 折柱 ---
		    var myChart = ec.init(document.getElementById('main'));
		    myChart.setOption({
			    tooltip : {
				    trigger: 'axis'
			    },
			    legend: {
				    data:[
						    '<?php echo $goods->name; ?>',
					    ]
			    },
			    toolbox: {
				    show : true,
				    feature : {
					    mark : {show: true},
					    dataView : {show: true, readOnly: false},
					    magicType : {show: true, type: ['line', 'bar']},
					    restore : {show: true},
					    saveAsImage : {show: true}
				    }
			    },
			    calculable : true,
			    xAxis : [
				    {
					    type : 'category',
					    data : [
							    <?php foreach($list as $key=>$item): ?>
									    "<?php echo $key; ?>",
							    <?php endforeach; ?>
						    ]
				    }
			    ],
			    yAxis : [
				    {
					    type : 'value',
					    splitArea : {show : true}
				    }
			    ],
			    series : [
						    {
							    name:'<?php echo $goods->name; ?>',
							    type:'line',
							    data:[
							    <?php foreach($list as $key=>$item): ?>
									   <?php echo $item; ?>,
							    <?php endforeach; ?>
								    ]
						    },
			    ]
		    });
		    
		    // --- 地图 ---
		    // var myChart2 = ec.init(document.getElementById('mainMap'));
		    // myChart2.setOption({
		    // 	tooltip : {
		    // 		trigger: 'item',
		    // 		formatter: '{b}'
		    // 	},
		    // 	series : [
		    // 		{
		    // 			name: '中国',
		    // 			type: 'map',
		    // 			mapType: 'china',
		    // 			selectedMode : 'multiple',
		    // 			itemStyle:{
		    // 				normal:{label:{show:true}},
		    // 				emphasis:{label:{show:true}}
		    // 			},
		    // 			data:[
		    // 				{name:'广东',selected:true}
		    // 			]
		    // 		}
		    // 	]
		    // });
	    }
    );
</script>
<div class="left-sidebar"><!-- Left sidebar starts here -->
  <div class="row-fluid">
    <div class="span12">
      <div class="widget">
      <div class="widget-header">
        <div class="title">
          货物出库曲线
        </div>
        <span class="tools">
          <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
        </span>
      </div>
      <div class="widget-body">
	<div id="main" style="height:500px;border:1px solid #ccc;padding:10px;"></div>
      </div>
	<div class="next-prev-btn-container pull-right" style="margin-right: 10px;">
	  <a href="/goods/detail/<?php echo $goods->id;?>?page=<?php echo $pre_page?>" class="button prev">
	    上月
	  </a>
	  <a href="/goods/detail/<?php echo $goods->id;?>" class="button">
	    当月
	  </a>
	  <a href="/goods/detail/<?php echo $goods->id;?>?page=<?php echo $next_page?>" class="button next">
	    下月 
	  </a>
	</div>
    </div>
  </div>

</div><!-- left sidebar ends here -->


<!-- 右侧内容 -->
<div class="right-sidebar"><!-- Right sidebar starts here -->
  <div class="wrapper">
    <a href="/goods">
      <button class="btn btn-large btn-info btn-block" type="button">返回</button>
    </a>
  </div>
</div><!-- Right sidebar ends here -->
