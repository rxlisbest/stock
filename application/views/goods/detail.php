<div class="left-sidebar"><!-- Left sidebar starts here -->
  <div class="row-fluid">
    <div class="span12">
      <div class="widget">
      <div class="widget-header">
        <div class="title">
          客户详细信息
        </div>
        <span class="tools">
          <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
        </span>
      </div>
      <div class="widget-body">
      <table class="table table-condensed table-striped table-bordered table-hover no-margin">
        <!-- <thead>
          <tr>
            <th style="width:30%">
            </th>
            <th style="width:75%">
            </th>
          </tr>
        </thead> -->
        <tbody>
          <tr>
            <td style="width:30%">
              <span>
                公司名称
              </span>
            </td>
            <td style="width:75%">
              <span>
                <?php echo $customer->c_name; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                联系人姓名
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_contact; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                联系人电话
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_phone; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                联系人手机
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_mobile; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                区域
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer_zones[substr($customer->c_zonepath, 0, 4)].'-'.$customer_zones[$customer->c_zonepath]; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                地址
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_address; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                行业
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer_trades[$customer->c_tradepath]; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                客户邮编
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_postcode; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                公司注册地址
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_registeraddress; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                公司网址
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_siteurl; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                公司注册资金
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_registermoney; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                公司注册时间
              </span>
            </td>
            <td>
              <span>
                <?php echo date("Y-m-d", strtotime($customer->c_registerdate)); ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                营业执照号
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_businesslicence; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                营业执照到期时间
              </span>
            </td>
            <td>
              <span>
                <?php echo date("Y-m-d", strtotime($customer->c_businesslicencedate)); ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                国税登记号
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_dutyparagraph; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                ICP备案
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_icp; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                法人
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_corporation; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                法人身份证
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_corporationid; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                个人/企业
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_nature; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                主营业务
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_mainoperation; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                经营范围
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_businessscope; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                主要市场
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_mainmarket; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                企业经营模式
              </span>
            </td>
            <td>
              <span>
                <?php echo $customers_config["Customers_BusinessMode"][$customer->c_businessmode]; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                企业性质
              </span>
            </td>
            <td>
              <span>
                <?php echo $customers_config["Customers_Character"][$customer->c_character]; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                年营业额
              </span>
            </td>
            <td>
              <span>
                <?php echo $customers_config["Customers_YearTurnover"][$customer->c_yearturnover]; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                员工人数
              </span>
            </td>
            <td>
              <span>
                <?php echo $customers_config["Customers_EmployeeNumber"][$customer->c_employeenumber]; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                客户来源类型
              </span>
            </td>
            <td>
              <span>
                <?php echo $customers_config["Customers_FromType"][$customer->c_fromtype]; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                来源网址
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_sourceurl; ?>
              </span>
            </td>
          </tr>

          <tr>
            <td>
              <span>
                公司简介
              </span>
            </td>
            <td>
              <span>
                <?php echo $customer->c_brief; ?>
              </span>
            </td>
          </tr>

        <?php if($customer->c_remark): ?>
          <tr>
            <td>
              <span>
                <font color='red'>
                  审核备注
                </font>
              </span>
            </td>
            <td>
              <span>
                <font color='red'>
                <?php echo $customer->c_remark; ?>
                </font>
              </span>
            </td>
          </tr>
        <?php endif; ?>
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
      <button class="btn btn-large btn-success btn-block" type="button">客户列表</button>
    </a>
  </div>
</div><!-- Right sidebar ends here -->
