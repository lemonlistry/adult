<?php
    $menu = array(
                array('label' => '所有会员', 'url' => array('/core/member/index'), 'active'=>($this->action->id == 'index' ? true : false)),
                );
    $this->widget('zii.widgets.CBreadcrumbs', array('links' => array(
            '运营管理',
            $title,
            )));
?>