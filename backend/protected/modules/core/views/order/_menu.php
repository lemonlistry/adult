<?php
    $menu = array(
                array('label' => '所有订单', 'url' => array('/core/order/index'), 'active'=>($this->action->id == 'index' ? true : false)),
                );
    $this->widget('zii.widgets.CBreadcrumbs', array('links' => array(
            '运营管理',
            $title,
            )));
?>