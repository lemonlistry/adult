<?php

class OrderController extends Controller
{

    /**
     * 订单列表
     */
    public function actionIndex()
    {
        $title = '订单列表';
        $list = Order::model()->findAll();
        $this->render('index', array('title' => $title, 'list' => $list));
    }

}