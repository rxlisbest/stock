<div class="left-sidebar"><!-- Left sidebar starts here -->
    <div class="row-fluid">
        <div class="span12">
            <div class="widget">
            <div class="widget-header">
                <div class="title">
                    入库
                </div>
                <span class="tools">
                    <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                </span>
            </div>
            <div class="widget-body">
            <?php echo form_open('goods/in/'.$goods->id, array('id'=>'ajaxForm', 'method'=>'post', 'class'=>'form-horizontal no-margin')); ?>
            <div class="control-group">
                <div class="controls controls-row">
                        <font color="red">
                            <?php // echo $message ?: "";?>
                        </font>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">
                货物名称
                </label>
                <div class="controls">
                <?php echo$goods->name; ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">
                单价
                </label>
                <div class="controls controls-row">
                    <label>
                            <?php echo "￥".$goods->price."元"; ?>
                    </label>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">
                入库
                </label>
                <div class="controls">
                <?php echo form_input(array('name'=>'quantity', 'value'=>isset($post["quantity"])? $post["quantity"]: "", 'class'=>'span6', 'required'=>'required', 'type'=>'text', 'placeholder'=>'入库')); ?>斤
                </div>
            </div>

            <div class="form-actions no-margin">
                <button type="submit" class="btn btn-info pull-right">
                    提交
                </button>
                <div class="clearfix">
                </div>
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
	$(function(){
		$("#ajaxForm").submit(function(){
			loading();
			$.ajax({
				url: $(this).attr("action"),
				type:'POST',
				data:$(this).serialize(),
				dataType:'json',
				success:function(data){
					if(data.code == 300){
						loaded();
						$().toastmessage('showErrorToast', data.msg);
						// TINY.box.show({html:data.msg,animate:false,close:false,boxid:'error',top:5});
						// gDialog.error('提示信息', data.errormsg);
					}else{
						window.location.href = "/goods";
					}
				},
				error:function(){
					loaded();
					$().toastmessage('showErrorToast', "网络或数据异常");
					// TINY.box.show({html:"网络或数据异常",animate:false,close:false,boxid:'error',top:5});
					return false;
				}
			});
			return false;
		});
	});
</script>
