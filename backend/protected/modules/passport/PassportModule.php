<?php

class PassportModule extends WebModule
{
    public $defaultController = 'default';

    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array(
            'passport.models.*',
            'passport.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        if(parent::beforeControllerAction($controller, $action))
        {
            $controller->navMenu = array(
                array('label' => '角色管理', 'url' => array('/passport/role/rolelist'), 'active' => $controller->id == 'role' ? true : false),
                array('label' => '用户管理', 'url' => array('/passport/user/userlist'), 'active' => $controller->id == 'user' ? true : false),
                array('label' => '权限管理', 'url' => array('/passport/prime/primelist'), 'active' => $controller->id == 'prime' ? true : false),
                array('label' => '资源管理', 'url' => array('/passport/resource/resourcelist'), 'active' => $controller->id == 'resource' ? true : false),
            );
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
            return false;
    }
}
