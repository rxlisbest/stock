<div class="left-sidebar"><!-- Left sidebar starts here -->
  <div class="row-fluid">
    <div class="span12">
      <div class="widget">
      <div class="widget-header">
        <div class="title">
          添加客户
        </div>
        <span class="tools">
          <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
        </span>
      </div>
      <div class="widget-body">
      <?php echo form_open('customer/add_save', array('method'=>'post', 'class'=>'form-horizontal no-margin')); ?>
        <div class="control-group">
          <div class="controls controls-row">
              <font color="red">
                <?php echo $message ?: "";?>
              </font>
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label">
            公司名称
          </label>
          <div class="controls">
            <?php echo form_input(array('name'=>'c_name', 'value'=>isset($post["c_name"])? $post["c_name"]: "", 'class'=>'span6', 'required'=>'required', 'type'=>'text', 'placeholder'=>'公司名称')); ?><span class="help-inline "><font color="red">*必填</font></span>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            提交保护申请
          </label>
          <div class="controls">
            <label class="radio inline">
              <?php echo form_radio(array('name'=>'c_status', 'value'=>'0', 'class'=>'', 'type'=>'radio')); ?>
              提交
            </label>
            <label class="radio inline">
              <?php echo form_radio(array('name'=>'c_status', 'value'=>'1', 'checked'=>'true', 'class'=>'', 'type'=>'radio')); ?>
              不提交
            </label>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            联系人姓名
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_contact', 'value'=>isset($post["c_contact"])? $post["c_contact"]: "", 'class'=>'span3', 'type'=>'text', 'placeholder'=>'联系人姓名')); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            联系人电话
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_phone', 'value'=>isset($post["c_phone"])? $post["c_phone"]: "", 'class'=>'span5', 'type'=>'text', 'placeholder'=>'联系人电话')); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            联系人手机
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_mobile', 'value'=>isset($post["c_mobile"])? $post["c_mobile"]: "", 'class'=>'span5', 'type'=>'text', 'placeholder'=>'联系人手机')); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="stateAndCity">
            区域
          </label>
          <div class="controls">
            <?php echo form_dropdown('city',$city, isset($post["city"])? $post["city"]: "", "class='span3' id='city'"); ?>
            <?php echo form_dropdown('area',$county, isset($post["area"])? $post["area"]: "", "class='span3 input-left-top-margins' id='county'"); ?>
            <span class="help-inline "><font color="red">*必填</font></span>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            地址
          </label>
          <div class="controls">
            <?php echo form_input(array('name'=>'c_address', 'value'=>isset($post["c_address"])? $post["c_address"]: "", 'class'=>'span8', 'required'=>'required', 'type'=>'text', 'placeholder'=>'公司详细地址')); ?>
            <span class="help-inline "><font color="red">*必填</font></span>
            <!-- <span class="help-inline ">
              Enter your Address
            </span> -->
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="stateAndCity">
            行业
          </label>
          <div class="controls">
            <?php echo form_dropdown('c_tradepath',$customer_trades, isset($post["c_tradepath"])? $post["c_tradepath"]: "", "class'='span6 input-left-top-margins'"); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            客户邮编
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_postcode', 'value'=>isset($post["c_postcode"])? $post["c_postcode"]: "", 'class'=>'span6', 'type'=>'text', 'placeholder'=>'客户邮编')); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            公司注册地址
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_registeraddress', 'value'=>isset($post["c_registeraddress"])? $post["c_registeraddress"]: "", 'class'=>'span8', 'type'=>'text', 'placeholder'=>'公司注册地址')); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            公司网址
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_siteurl', 'value'=>isset($post["c_siteurl"])? $post["c_siteurl"]: "", 'class'=>'span6', 'type'=>'text', 'placeholder'=>'http://')); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            公司注册资金
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_registermoney', 'value'=>isset($post["c_registermoney"])? $post["c_registermoney"]: "", 'class'=>'span6', 'type'=>'text', 'placeholder'=>'￥0.00')); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            公司注册时间
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_registerdate', 'value'=>isset($post["c_registerdate"])? $post["c_registerdate"]: "", 'class'=>'input', 'type'=>'text', 'placeholder'=>'0000-00-00' ,'id'=>'j_Date2')); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            营业执照号
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_businesslicence', 'value'=>isset($post["c_businesslicence"])? $post["c_businesslicence"]: "", 'class'=>'span6', 'type'=>'text', 'placeholder'=>'营业执照号')); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            营业执照到期时间
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_businesslicencedate', 'value'=>isset($post["c_businesslicencedate"])? $post["c_businesslicencedate"]: "", 'class'=>'input', 'type'=>'text', 'placeholder'=>'0000-00-00' ,'id'=>'j_Date1')); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            国税登记号
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_dutyparagraph', 'value'=>isset($post["c_dutyparagraph"])? $post["c_dutyparagraph"]: "", 'class'=>'span6', 'type'=>'text', 'placeholder'=>'国税登记号')); ?>
          </div>
        </div>

         <div class="control-group">
          <label class="control-label">
            ICP备案
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_icp', 'value'=>isset($post["c_icp"])? $post["c_icp"]: "", 'class'=>'span6', 'type'=>'text', 'placeholder'=>'ICP备案')); ?>
          </div>
        </div>

         <div class="control-group">
          <label class="control-label">
            法人
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_corporation', 'value'=>isset($post["c_corporation"])? $post["c_corporation"]: "", 'class'=>'span3', 'type'=>'text', 'placeholder'=>'法人')); ?>
          </div>
        </div>

         <div class="control-group">
          <label class="control-label">
            法人身份证
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_corporationid', 'value'=>isset($post["c_corporationid"])? $post["c_corporationid"]: "", 'class'=>'span6', 'type'=>'text', 'placeholder'=>'法人身份证')); ?>
          </div>
        </div>

         <div class="control-group">
          <label class="control-label">
            个人/企业
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_nature', 'value'=>isset($post["c_nature"])? $post["c_nature"]: "", 'class'=>'span6', 'type'=>'text', 'placeholder'=>'公司名称')); ?>
          </div>
        </div>

         <div class="control-group">
          <label class="control-label">
            主营业务
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_mainoperation', 'value'=>isset($post["c_mainoperation"])? $post["c_mainoperation"]: "", 'class'=>'span6', 'type'=>'text', 'placeholder'=>'主营业务')); ?>
          </div>
        </div>

         <div class="control-group">
          <label class="control-label">
            经营范围
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_businessscope', 'value'=>isset($post["c_businessscope"])? $post["c_businessscope"]: "", 'class'=>'span6', 'type'=>'text', 'placeholder'=>'经营范围')); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            主要市场
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_mainmarket', 'value'=>isset($post["c_mainmarket"])? $post["c_mainmarket"]: "", 'class'=>'span6', 'type'=>'text', 'placeholder'=>'主要市场')); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="stateAndCity">
            企业经营模式
          </label>
          <div class="controls">
            <?php echo form_dropdown('c_businessmode',$customers_config["Customers_BusinessMode"], isset($post["c_businessmode"])? $post["c_businessmode"]: "", "class'='span3 input-left-top-margins'"); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="stateAndCity">
            企业性质
          </label>
          <div class="controls">
            <?php echo form_dropdown('c_character',$customers_config["Customers_Character"], isset($post["c_character"])? $post["c_character"]: "", "class'='span4 input-left-top-margins'"); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="stateAndCity">
            年营业额
          </label>
          <div class="controls">
            <?php echo form_dropdown('c_yearturnover',$customers_config["Customers_YearTurnover"], isset($post["c_yearturnover"])? $post["c_yearturnover"]: "", "class'='span3 input-left-top-margins'"); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="stateAndCity">
            员工人数
          </label>
          <div class="controls">
            <?php echo form_dropdown('c_employeenumber',$customers_config["Customers_EmployeeNumber"], isset($post["c_employeenumber"])? $post["c_employeenumber"]: "", "class'='span2 input-left-top-margins'"); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="stateAndCity">
            客户来源类型
          </label>
          <div class="controls">
            <?php echo form_dropdown('c_fromtype',$customers_config["Customers_FromType"], isset($post["c_fromtype"])? $post["c_fromtype"]: "", "class'='span3 input-left-top-margins'"); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            来源网址
          </label>
          <div class="controls controls-row">
            <?php echo form_input(array('name'=>'c_sourceurl', 'value'=>isset($post["c_sourceurl"])? $post["c_sourceurl"]: "", 'class'=>'span6', 'type'=>'text', 'placeholder'=>'http://')); ?>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            公司简介
          </label>
          <div class="controls controls-row">
            <?php echo form_textarea ('c_brief', isset($post["c_brief"])? $post["c_brief"]: "", "class='span10' type='text' placeholder='公司简介'"); ?>
          </div>
        </div>

        <div class="form-actions no-margin">
          <button type="submit" class="btn btn-info pull-right">
            提交
          </button>
          <div class="clearfix">
          </div>
        </div>
                
      <?php echo form_close() ?>
       <script language="javascript">  
          $(document).ready(function(){
            $("#city").change(function(){
              //alert($(this).val());
              $.ajax({
                type: "get",
                dataType: "json", 
                url: "/customer/county/"+$(this).val(),
                data: '',//提交表单，相当于CheckCorpID.ashx?ID=XXX
                success: function(county){
                  county = eval(county);
                  $("#county").empty();
                  //$("#county").append("<option value='"+0+"'>所有县区</option>");
                  for(var i in county){
                    $("#county").append("<option value='"+i+"'>"+county[i]+"</option>");
                  }
                  //alert( msg ); 
                } //操作成功后的操作！msg是后台传过来的值
              }); 
            });
          });
        </script>  
        <script src='/public/js/date.js' language='JavaScript'>
        </script>
        <script language='JavaScript'>

          var myDate1 = new Calender({id:'j_Date1'});
          var myDate2 = new Calender({id:'j_Date2'});
        </script>



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
