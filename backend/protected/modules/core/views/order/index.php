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
                $form = $this->beginWidget('ActiveForm', array('id' => 'order_form', 'method' => 'get', 'action' => $this->createUrl('/core/default')));
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
                                <th width="120px;">用户名称</th>
                                <th width="60px;">正常价格</th>
                                <th width="40px;">折扣</th>
                                <th width="60px;">折后价格</th>
                                <th width="60px;">商品数量</th>
                                <th width="60px;">订单状态</th>
                                <th width="60px;">支付方式</th>
                                <th width="120px;">备注</th>
                                <th width="120px;">成交时间</th>
                                <th width="120px;">创建时间</th>
                                <th class="span2">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (count($list)) {
                                    foreach ($list as $k => $v) {
                            ?>
                                        <tr>
                                            <td><?php echo $k + 1; ?></td>
                                            <td><?php echo $v->no; ?></td>
                                            <td><?php echo Util::getUserAttributeByUid($v->id); ?></td>
                                            <td><?php echo $v->normal_price; ?></td>
                                            <td><?php echo $v->discount; ?></td>
                                            <td><?php echo $v->discount_price; ?></td>
                                            <td><?php echo $v->item_num; ?></td>
                                            <td><?php echo Order::model()->getOrderStatus($v->status); ?></td>
                                            <td><?php echo Order::model()->getPayType($v->pay_type);; ?></td>
                                            <td><?php echo $v->note; ?></td>
                                            <td><?php echo date('Y-m-d H:i:s', $v->success_time); ?></td>
                                            <td><?php echo date('Y-m-d H:i:s', $v->create_time); ?></td>
                                            <td>
                                                <?php
                                                    if($v->status == 1){
                                                        echo Html5::link('发货', array('/core/logistics/addlogistics', 'order_id' => $v->id), array('class' => 'js-dialog-link', 'data-width' => 600, 'data-height' => 400));
                                                    }else if($v->status == 2){
                                                        echo Html5::link('查看发货详情', array('/core/logistics/getlogisticsrecordbyorderid', 'order_id' => $v->id), array('class' => 'js-dialog-link', 'data-width' => 700, 'data-height' => 400));
                                                    }
                                                ?>
                                            </td>
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