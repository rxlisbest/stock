<!-- 左侧内容 -->
<div class="left-sidebar"><!-- Left sidebar starts here -->
    <!-- 搜索功能 -->
    <div class="row-fluid">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <div class="title">
                        搜索
                    </div>
                    <span class="tools">
                        <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                </div>
                <div class="widget-body">
                    <?php echo form_open('/goods', array('class'=>'form-horizontal no-margin', 'method'=>'get')); ?>
                            货物名称:
                            <?php echo form_input(array('name'=>'name', 'value'=>isset($search["name"]) ? $search["name"]: "", 'class'=>'span3', 'type'=>'text', 'placeholder'=>'货物名称')); ?>
                            <button type="submit" class="btn btn-info">
                                查询
                            </button>
                    <?php form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- 客户列表 -->
    <div class="row-fluid">
        <div class="span12">
            <div class="widget">
            <div class="widget-header">
                <div class="title">
                    库存管理
                </div>
                <span class="tools">
                    <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                </span>
            </div>
            <div class="widget-body">

                <div class="control-group">
                    <div class="controls controls-row">
                            <font color="red">
                                <?php // echo $message; ?>
                            </font>
                    </div>
                </div>

            <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                <thead>
                    <tr>
                        <th style="width:5%">
                            <input type="checkbox" class="no-margin" />
                        </th>
                        <th style="width:30%">
                            货物名称
                        </th>
                        <th style="width:25%" class="hidden-phone">
                            单价（元/斤）
                        </th>
                        <th style="width:25%" class="hidden-phone">
                            库存 （斤）
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
                            <input type="checkbox" class="no-margin" />
                        </td>
                        <td>
                            <a href="/goods/detail/<?php echo $item->id; ?>">
                                <span class="name">
                                    <?php echo $item->name; ?>
                                </span>
                            </a>
                        </td>

                        <td class="hidden-phone">
                            <?php echo $item->price ?> 
                        </td>

                        <td class="hidden-phone">
                            <?php echo $item->quantity ?> 
                        </td>
                        <td>
                            
                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                    操作 
                                    <span class="caret">
                                    </span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/goods/detail/<?php echo $item->id; ?>">
                                            货物详情
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/goods/in/<?php echo $item->id; ?>">
                                            入库
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/goods/edit/<?php echo $item->id; ?>">
                                            修改
                                        </a>
                                    </li>
                                    <li>
                                        <a onclick="javascript:return p_del(<?php echo $item->id; ?>)">
                                            删除
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

                <SCRIPT LANGUAGE=javascript>     
                    function p_del(id) {     
                        var msg = "确认要删除此客户吗?";     
                        if (confirm(msg)==true){     
			    loading();
			    $.ajax({
				type: "GET",
				url: "/goods/del/" + id,
				// data: {id:id},
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
                            return false;     
                        }else{     
                            return false;     
                        }     
                    }     
                    function p_can() {     
                        var msg = "确认要取消客户报备吗?";     
                        if (confirm(msg)==true){     
                            return true;     
                        }else{     
                            return false;     
                        }     
                    }    
                </SCRIPT>    
            </div>
	    <?php echo $pagination;?>
        </div>
    </div>

</div><!-- left sidebar ends here -->
</div>


<!-- 右侧内容 -->
<div class="right-sidebar"><!-- Right sidebar starts here -->
    <div class="wrapper">
        <a href="/goods/add">
            <button class="btn btn-large btn-info btn-block" type="button">添加货物</button>
        </a>
    </div>
</div><!-- Right sidebar ends here -->
