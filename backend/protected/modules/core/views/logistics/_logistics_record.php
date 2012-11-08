<?php
    Yii::app()->clientScript->registerCoreScript('jquery.ui');
    Yii::app()->clientScript->registerCoreScript('platform');
    $form = $this->beginWidget('ActiveForm', array('id' => 'logistics_form'));
?>
<style type="text/css">
     table{font-size:2px; line-height: 30px;}
</style>
<table border=1>
    <thead>
        <tr>
            <th width="120px;">订单编号</th>
            <th width="80px;">快递公司</th>
            <th width="60px;">快递单号</th>
            <th width="120px;">备注</th>
            <th width="120px;">发送时间</th>
            <th width="120px;">创建时间</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if (count($list)) {
                foreach ($list as $k => $v) {
        ?>
                    <tr>
                        <td><?php echo $order_no; ?></td>
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
<?php $this->endWidget(); ?>

