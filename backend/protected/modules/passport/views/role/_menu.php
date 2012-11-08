<?php
    $menu = array(
                array('label' => '所有角色', 'url' => array('/passport/role/rolelist'), 'active'=>($this->action->id == 'rolelist' ? true : false)),
                );
    $this->widget('zii.widgets.CBreadcrumbs', array('links' => array(
            '系统管理',
            $title,
            )));
?>