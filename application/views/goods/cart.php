<!-- 左侧内容 -->
<div class="left-sidebar"><!-- Left sidebar starts here -->
    <!-- 客户列表 -->
    <div class="row-fluid">
        <div class="span8">
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
                                        <a href="/goods/out/<?php echo $item->id; ?>">
                                            出库
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
                                        <a href="/goods/delete/<?php echo $item->id; ?>" onclick="javascript:return p_del()">
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
                    function p_del() {     
                        var msg = "确认要删除此客户吗?";     
                        if (confirm(msg)==true){     
                            return true;     
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
        </div>
    </div>

</div><!-- left sidebar ends here -->
</div>


<!-- 右侧内容 -->
<div class="right-sidebar"><!-- Right sidebar starts here -->
    <div class="wrapper">
	<table class="table table-condensed table-striped table-bordered table-hover no-margin">
	    <thead>
		<tr>
		    <th style="width:10%">
			<input type="checkbox" class="no-margin" />
		    </th>
		    <th style="width:70%">
			Name
		    </th>
		    <th style="width:20%">
			Status
		    </th>
		</tr>
	    </thead>
	    <tbody>
		<tr>
		    <td>
			<input type="checkbox" class="no-margin" />
		    </td>
		    <td>
			<span class="name">
			    Mahendra Singh Dhoni
			</span>
		    </td>
		    <td>
			<span class="label label label-info">
			    New
			</span>
		    </td>
		</tr>
		<tr>
		    <td>
			<input type="checkbox" class="no-margin" />
		    </td>
		    <td>
			<span class="name">
			    Michel Clark
			</span>
		    </td>
		    <td>
			<span class="label label label-success">
			    New
			</span>
		    </td>
		</tr>
		<tr>
		    <td>
			<input type="checkbox" class="no-margin" />
		    </td>
		    <td>
			<span class="name">
			    Rahul Dravid
			</span>
		    </td>
		    <td>
			<span class="label label label-important">
			    New
			</span>
		    </td>
		</tr>
		<tr>
		    <td>
			<input type="checkbox" class="no-margin" />
		    </td>
		    <td>
			<span class="name">
			    Anthony Michell
			</span>
		    </td>
		    <td>
			<span class="label label label-info">
			    New
			</span>
		    </td>
		    
		</tr>
		<tr>
		    <td>
			<input type="checkbox" class="no-margin" />
		    </td>
		    <td>
			<span class="name">
			    Srinu Baswa
			</span>
		    </td>
		    <td>
			<span class="label label label-success">
			    New
			</span>
		    </td>
		    
		</tr>
	    </tbody>
	</table>
    </div>
</div><!-- Right sidebar ends here -->
