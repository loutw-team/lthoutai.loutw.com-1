<?php $this->load->view('layout/header');?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">用户管理<small> 用户管理</small></h3>
            <?php echo breadcrumb(array('用户管理', 'user/grid'=>'用户列表')); ?>
        </div>
    </div>
    <?php echo execute_alert_message() ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-search"></i>搜索</div>
                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                        <a class="remove" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal form-search" action="<?php echo base_url('user/grid') ?>" method="get">
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <label class="control-label">用户昵称</label>
                                    <div class="controls">
                                        <input type="text" name="username" value="<?php echo $this->input->get('username');?>" placeholder="请输入用户UID或昵称" class="m-wrap span12">
                                    </div>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label class="control-label">手机号码</label>
                                    <div class="controls">
                                        <input type="text" name="phoneEmail" value="<?php echo $this->input->get('phoneEmail');?>" placeholder="请输入用户手机号码或邮箱" class="m-wrap span12">
                                    </div>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label class="control-label">用户类型</label>
                                    <div class="controls">
                                        <select name="user_type" class="m-wrap span12">
                                            <option value="">请选择</option>
                                            <?php foreach ($user_type->result() as $item) :?>
                                                <option value="<?php echo $item->type_id;?>" <?php if ($item->type_id == $this->input->get('user_type')):?> selected="selected"<?php endif;?>><?php echo $item->type_name;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="control-group">
                                    <label class="control-label">父级序号</label>
                                    <div class="controls">
                                        <input type="text" name="parent_id" value="<?php echo $this->input->get('parent_id');?>" placeholder="父级序号UID" class="m-wrap span12">
                                    </div>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label class="control-label">帐号状态</label>
                                    <div class="controls">
                                        <select name="flag" class="m-wrap span12">
                                            <option value="">请选择</option>
                                            <?php foreach (array('1'=>'正常', '2'=>'已冻结') as $key=>$value) :?>
                                                <option value="<?php echo $key;?>" <?php if ($key == $this->input->get('flag')):?> selected="selected"<?php endif;?>><?php echo $value;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <label class="control-label">注册时间</label>
                                    <div class="controls form-search-time">
                                        <div class="input-append date date-picker">
                                            <input type="text" name="start_date" size="16" value="<?php echo $this->input->get('start_date') ?>" class="m-wrap m-ctrl-medium date-picker date">
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                        <div class="input-append date date-picker">
                                            <input type="text" name="end_date" size="16" value="<?php echo $this->input->get('end_date')?>" class="m-wrap m-ctrl-medium date-picker date">
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button class="btn green" type="submit">搜索</button>
                            <button class="btn reset_button_search" type="button">重置条件</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-reorder"></i>列表</div>
                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                        <a class="remove" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <div class="dataTables_wrapper form-inline">
                        <div class="clearfix">
                            <a href="<?php echo base_url('user/add') ?>" class="add-button-link">
                                <div class="btn-group">
                                    <button class="btn green"><i class="icon-plus"></i> 添加</button>
                                </div>
                            </a>
                        </div>
                        <?php if ($all_rows > 0) :?>
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead class="flip-content">
                                    <tr>
                                        <th width="15"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"></th>
                                        <th>编号</th>
                                        <th>呢称</th>
                                        <th>手机/邮箱</th>
                                        <th>用户类型</th>
                                        <th>可用金额</th>
                                        <th>冻结金额</th>
                                        <th>积分</th>
                                        <th>父级序号</th>
                                        <th>注册时间</th>
                                        <th>状态</th>
                                        <th width="145">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($page_list->result() as $item) : ?>
                                    <tr>
                                        <td><input type="checkbox" class="checkboxes" value="1" ></td>
                                        <td><?php echo $item->uid;?></td>
                                        <td><?php echo $item->alias_name;?></td>
                                        <td>
                                            <p><?php echo $item->phone;?></p>
                                            <p><?php echo $item->email;?></p>
                                        </td>
                                        <td>
                                            <?php foreach ($user_type->result() as $type): ?>
                                                <?php if ($item->user_type&(int)$type->type_id):?>
                                                    <?php echo $type->type_name;?>,
                                                <?php endif;?>
                                            <?php endforeach;?>
                                        </td>
                                        <td><?php echo $item->user_money;?></td>
                                        <td><?php echo $item->frozen_money;?></td>
                                        <td><?php echo $item->pay_points;?></td>
                                        <td><?php echo $item->parent_id;?></td>
                                        <td><?php echo $item->created_at;?></td>
                                        <td>
                                            <a href="javascript:;" class="modify-user-uid glyphicons no-js <?php if ($item->flag == 1):?>ok_2<?php else :?>remove_2<?php endif;?>" data-uid="<?php echo $item->uid;?>" data-flag="<?php echo $item->flag ?>">
                                                <i></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn mini green" href="<?php echo base_url('user/edit/'.$item->uid); ?>"> 编辑</a>
                                            <a class="btn mini green" href="<?php echo base_url('address/grid/'.$item->uid); ?>"> 收货地址</a><p></p>
                                            <a class="btn mini green" href="<?php echo base_url('account_log/grid?uid='.$item->uid); ?>">账户收支</a>
                                            <a class="btn mini green" href="<?php echo base_url('user_log/grid?uid='.$item->uid); ?>">日志</a><p></p>
                                            <a class="btn mini green" href="<?php echo base_url('mall_enshrine/grid?uid='.$item->uid); ?>">收藏</a>
                                            <a class="btn mini green" href="<?php echo base_url('mall_cart_goods/grid?uid='.$item->uid); ?>">购物车</a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                            <?php $this->load->view('layout/pagination');?>
                        <?php else: ?>
                            <div class="alert"><p>未找到数据。<p></div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layout/footer');?>
<script type="text/javascript">
$(function(){
    $('.modify-user-uid').click(function(){
        var status = '冻结帐号';
        if ($(this).hasClass('remove_2')) {
            status = '恢复帐号';
        }
        if (confirm('确定要'+status+'?')) {
            var obj = $(this);
            var uid = $(this).attr('data-uid');
            var flag = $(this).attr('data-flag');
            $.ajax({
                url:hostUrl()+'/user/toggle',
                type:'POST',
                dataType:'json',
                data: {uid:uid,flag:flag},
                success: function(data) {
                    if (data.flag == 2) {
                        obj.attr('data-flag', data.flag).addClass('remove_2').removeClass('ok_2');
                    } else if(data.flag == 1) {
                        obj.attr('data-flag', data.flag).addClass('ok_2').removeClass('remove_2');
                    } else {
                        alert('操作失败');
                    }
                }
            });
        }
    });
});
</script>