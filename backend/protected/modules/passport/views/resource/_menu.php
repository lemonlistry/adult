<?php
    $menu = array(
                array('label' => '资源管理', 'url' => array('/passport/resource/resourcelist'), 'active'=>($this->action->id == 'resourcelist' ? true : false)),
                array('label' => '资源绑定', 'url' => array('/passport/resource/resourcebindlist'), 'active'=>($this->action->id == 'resourcebindlist' ? true : false)),
                );
    $this->widget('zii.widgets.CBreadcrumbs', array('links' => array(
            '系统管理',
            $title,
            )));
?>