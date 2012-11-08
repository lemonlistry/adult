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
                $form = $this->beginWidget('ActiveForm', array('id' => 'logistics_form', 'method' => 'get', 'action' => $this->createUrl('/core/default')));
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
                                <th width="40px;">序号</th>
                                <th width="120px;">订单编号</th>
                                <th width="120px;">快递公司</th>
                                <th width="120px;">快递单号</th>
                                <th width="120px;">备注</th>
                                <th width="120px;">发货时间</th>
                                <th width="120px;">创建时间</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (count($list)) {
                                    foreach ($list as $k => $v) {
                            ?>
                                        <tr>
                                            <td><?php echo $k + 1; ?></td>
                                            <td><?php echo Util::getOrderAttributeById($v->order_id); ?></td>
                                            <td><?php echo $v->express_name; ?></td>
                                            <td><?php echo $v->express_number; ?></td>
                                            <td><?php echo $v->note; ?></td>
                                            <td><?php echo date('Y-m-d H:i:s', $v->send_time); ?></td>
                                            <td><?php echo date('Y-m-d H:i:s', $v->create_time); ?></td>
                                        </tr>
                                <?php
                                    }
                                ?>
                            <?php
                                } else {
                            ?>
                                    <tr>
                                        <td colspan="11">暂无数据!</td>
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