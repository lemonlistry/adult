<?php

class CoreModule extends WebModule
{
    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array(
            'core.models.*',
            'core.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        if(parent::beforeControllerAction($controller, $action))
        {
            $controller->navMenu = array(
                array('label' => '会员管理', 'url' => array('/core/member/index'), 'active'=>($controller->id == 'member' ? true : false)),
                array('label' => '订单管理', 'url' => array('/core/order/index'), 'active'=>($controller->id == 'order' ? true : false)),
                array('label' => '发货管理', 'url' => array('/core/logistics/index'), 'active'=>($controller->id == 'logistics' ? true : false)),
                array('label' => '商品管理', 'url' => array('/core/default/index'), 'active'=>($controller->id == 'default' ? true : false)),
                array('label' => '品牌管理', 'url' => array('/core/brand/index'), 'active'=>($controller->id == 'brand' ? true : false)),
                array('label' => '分类管理', 'url' => array('/core/category/index'), 'active'=>($controller->id == 'category' ? true : false)),
                array('label' => '广告管理', 'url' => array('/core/ad/index'), 'active'=>($controller->id == 'ad' ? true : false)),
                array('label' => '资讯管理', 'url' => array('/core/information/index'), 'active'=>($controller->id == 'information' ? true : false)),
                array('label' => '友情链接管理', 'url' => array('/core/href/index'), 'active'=>($controller->id == 'href' ? true : false)),
            );
            return true;
        }
        else
            return false;
    }

}
