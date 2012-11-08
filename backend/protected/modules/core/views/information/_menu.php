<?php
    $menu = array(
                array('label' => '所有资讯', 'url' => array('/core/information/index'), 'active'=>($this->action->id == 'index' ? true : false)),
                );
    $this->widget('zii.widgets.CBreadcrumbs', array('links' => array(
            '运营管理',
            $title,
            )));
?>