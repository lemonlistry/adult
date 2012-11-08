<div id="page_body">
<div id="page_title">
    <?php
        require_once dirname(__FILE__) . '/_menu.php';
    ?>
</div>

<div class="main-box">
    <div class="main-body">
        <aside class="span5">
            <?php
                $this->widget('zii.widgets.CMenu', array('items' => $menu, 'activeCssClass' => 'selected',
                    'htmlOptions' => array('class' => 'left-menu',)));
            ?>
        </aside>
        <div class="main-container prepend5">
            <?php
                $form = $this->beginWidget('ActiveForm', array('id' => 'member_form', 'method' => 'get', 'action' => $this->createUrl('/core/default')));
            ?>
            <header>
                <div class="right">
                </div>
            </header>
            <?php $this->endWidget(); ?>
            <div class="main-content">
                <div class="grid-view">
                    <table>
                        <thead>
                            <tr>
                                <th width="80px;">序号</th>
                                <th width="160px;">用户名称</th>
                                <th width="160px;">邮箱</th>
                                <th width="120px;">邮箱是否激活</th>
                                <th width="120px;">手机</th>
                                <th width="120px;">手机是否激活</th>
                                <th width="120px;">账号状态</th>
                                <th width="160px;">注册IP</th>
                                <th width="140px;">创建时间</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (count($list)) {
                                    foreach ($list as $k => $v) {
                            ?>
                                        <tr>
                                            <td><?php echo $k + 1 ; ?></td>
                                            <td><?php echo $v->username; ?></td>
                                            <td><?php echo $v->email; ?></td>
                                            <td><?php echo $v->is_actived_email == 0 ? '否' : '是' ; ?></td>
                                            <td><?php echo $v->mobile; ?></td>
                                            <td><?php echo $v->is_actived_mobile == 0 ? '否' : '是' ; ?></td>
                                            <td><?php echo $v->isblocked == 0 ? '已锁定' : '正常' ;; ?></td>
                                            <td><?php echo $v->register_ip; ?></td>
                                            <td><?php echo date('Y-m-d H:i:s', $v->create_time); ?></td>
                                        </tr>
                                <?php
                                    }
                                ?>
                            <?php
                                } else {
                            ?>
                                    <tr>
                                        <td colspan="9">暂无数据!</td>
                                    </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>