<div class="left-sidebar">
	
	<div class="row-fluid">
		
		<div class="span12">
			<div class="widget">
				<div class="widget-header">
					<div class="title">
							Login
					</div>
					<span class="tools">
						<a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
					</span>
				</div>
				<div class="widget-body">
					<div class="span3"></div>
					<div class="span6">
						<div class="sign-in-container">
							<?php echo form_open("login/login_check", array("class"=>"login-wrapper", "id"=>"ajaxForm"));?>
								<div class="header">
									<div class="row-fluid">
										<div class="span12">
											<h3>
												<font color="#3693cf">
													Login
												</font>
												<img src="/public/img/logo1.png" alt="Logo" class="pull-right">
											</h3>
											<!-- <p><?php echo $message;?></p> -->
										</div>
									</div>
								 
								</div>
								<div class="content">
									<div class="row-fluid">
										<div class="span12">
											<?php echo form_input(array("name"=>"username", "class"=>"input span12", "id"=>"username", "placeholder"=>"UserName", "required"=>"required", "type"=>"text")); ?>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span12">
											<?php echo form_input(array("name"=>"password", "class"=>"input span12 password", "id"=>"password", "placeholder"=>"Password", "required"=>"required", "type"=>"password")); ?>
										</div>
									</div>
								</div>
								<div class="actions">
									<input class="btn btn-primary" name="Login" type="submit" value="Login" >
									<!-- <a class="link" href="#">Forgot Password?</a> -->
									<div class="clearfix"></div>
								</div>
							<?php echo form_close(); ?>
						</div>
					</div>
					<div class="span3"></div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		
	</div>
	

</div>

<!-- 右侧内容 -->
<!-- Right sidebar starts here -->
<!-- <div class="right-sidebar">
	<div class="wrapper">
		<a href="/customer/add">
			<button class="btn btn-large btn-info btn-block" type="button">添加报备客户</button>
		</a>
	</div>
</div> -->
<!-- Right sidebar ends here -->

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
						window.location.href = "<?php echo $from_url; ?>";
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
