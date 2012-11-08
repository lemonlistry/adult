<?php
    $menu = array(
                array('label' => '所有友情链接', 'url' => array('/core/href/index'), 'active'=>($this->action->id == 'index' ? true : false)),
                );
    $this->widget('zii.widgets.CBreadcrumbs', array('links' => array(
            '运营管理',
            $title,
            )));
?>