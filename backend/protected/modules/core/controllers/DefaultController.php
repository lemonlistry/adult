<?php

class DefaultController extends Controller
{

    /**
     * 商品列表
     */
    public function actionIndex()
    {
        $title = '商品列表';
        $list = array();
        $this->render('index', array('title' => $title, 'list' => $list));
    }

}