<?php
    $menu = array(
                array('label' => '所有用户', 'url' => array('/passport/user/userlist'), 'active'=>($this->action->id == 'userlist' ? true : false)),
                );
    $this->widget('zii.widgets.CBreadcrumbs', array('links' => array(
            '系统管理',
            $title,
            )));
?>