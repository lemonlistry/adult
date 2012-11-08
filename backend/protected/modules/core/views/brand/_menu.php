<?php
    $menu = array(
                array('label' => '所有品牌', 'url' => array('/core/brand/index'), 'active'=>($this->action->id == 'index' ? true : false)),
                );
    $this->widget('zii.widgets.CBreadcrumbs', array('links' => array(
            '运营管理',
            $title,
            )));
?>