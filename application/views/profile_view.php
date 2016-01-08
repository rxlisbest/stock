<div class="left-sidebar">
	
	<div class="row-fluid">
		<div class="span12">
			<div class="widget no-margin">
				<div class="widget-header">
					<div class="title">
						账号信息
					</div>
					<span class="tools">
						<a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
					</span>
				</div>
				<div class="widget-body">
					<div class="container-fluid">
						
						<div class="row-fluid">
							<div class="span3">
								<div class="thumbnail">
									<img alt="300x200" src="/public/img/profile.png">
									<div class="caption">
										<a href="">
											<?php echo $session["name"]; ?>
										</a>
										<!-- <p class="no-margin">
											<a href="#" class="btn btn-info">
												Save
											</a>
											
											<a href="#" class="btn">
												Cancel
											</a>
										</p> -->
									</div>
								</div>
							</div>
							<div class="span9">
							<?php echo form_open("/profile/edit_save/".$profile->id, array("class"=>"form-horizontal", 'id'=>"ajaxForm")); ?>

									<div class="control-group">
										<div class="controls controls-row">
												<!-- <font color="red">
													<?php echo $message ?: "";?>
												</font> -->
										</div>
									</div>

									<h5>
										登陆信息
									</h5>
									<hr>

									<div class="control-group">
										<label class="control-label">
											用户名
										</label>
										<div class="controls">
											<?php echo form_input("username", $profile->username, "readonly='readonly' class='span10'");?>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">
											密码
										</label>
										<div class="controls">
											<?php echo form_password("password", "", "class='span10'");?>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">
											确认密码
										</label>
										<div class="controls">
											<?php echo form_password("confirmPassword", "", "class='span10'");?>
										</div>
									</div>
									<br />
									<h5>
										用户信息
									</h5>
									<hr>
									<div class="control-group">
										<label class="control-label">
											公司名称
										</label>
										<div class="controls">
											<?php echo form_input("name", $profile->name, "class='span10' required='required'");?>
											</a>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">
											联系人
										</label>
										<div class="controls">
											<?php echo form_input("contact", $profile->contact, "class='span10' required='required'");?>
											</a>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">
											电话
										</label>
										<div class="controls">
											<?php echo form_input("phone", $profile->phone, "class='span10' required='required'");?>
											</a>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">
											手机
										</label>
										<div class="controls">
											<?php echo form_input("mobile", $profile->mobile, "class='span10' required='required'");?>
										</div>
									</div>

									<div class="form-actions">
										<button type="submit" class="btn btn-info">
											保存
										</button>
										<button type="button" class="btn">
											取消
										</button>
									</div>
									
									
									
								<?php echo form_close(); ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
</div>
					

<!-- 右侧内容 -->
<div class="right-sidebar"><!-- Right sidebar starts here -->
	<div class="wrapper">
		<a href="/customer">
			<button class="btn btn-large btn-success btn-block" type="button">客户列表</button>
		</a>
	</div>
</div><!-- Right sidebar ends here -->



<script type="text/javascript">

	//Xeditable form fields
	$(document).ready(function () {

		//alert(111);
		//enable / disable
		$('#enable').click(function () {
			$('#user .editable').editable('toggleDisabled');
		});


		//editables 
		$('.inputText').editable({
			type: 'text',
			pk: 1,
			name: 'name',
			title: 'Enter Name'
		});


		$('.inputTextArea').editable({
			showbuttons: true
		});



		$('#tags').editable({
			inputclass: 'input-large',
			select2: {
				tags: ['html5', 'javascript', 'Jquery', 'css3', 'ajax', 'Sass', 'Haml', 'Photoshop'],
				tokenSeparators: [",", " "]
			}
		});


		$('#user .editable').on('hidden', function (e, reason) {
			if (reason === 'save' || reason === 'nochange') {
				var $next = $(this).closest('tr').next().find('.editable');
				if ($('#autoopen').is(':checked')) {
					setTimeout(function () {
						$next.editable('show');
					}, 300);

				} else {
					$next.focus();
				}

			}
		});

	});
	//Xeditable form fields end
</script>

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
						window.location.reload();
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