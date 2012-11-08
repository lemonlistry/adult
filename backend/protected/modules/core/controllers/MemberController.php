<?php

class MemberController extends Controller
{

    /**
     * 会员列表
     */
    public function actionIndex()
    {
        $title = '会员列表';
        $list = Member::model()->findAll();
        $this->render('index', array('title' => $title, 'list' => $list));
    }

}