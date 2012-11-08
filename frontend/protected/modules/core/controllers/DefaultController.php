<?php

class DefaultController extends Controller
{

    /**
     * 首页
     */
    public function actionIndex(){
        //keyword
        $criteria = new CDbCriteria();
        $criteria->limit = 4;
        $criteria->order = 'id DESC';
        $key_word = Keyword::model()->findAll($criteria);
        //AD 轮播
        $criteria = new CDbCriteria();
        $criteria->limit = 4;
        $criteria->order = 'id DESC';
        $criteria->addCondition('status = 1 AND position = 0');
        $ad_carousel = Ad::model()->findAll($criteria);
        //群英会产品前6个
        $criteria = new CDbCriteria();
        $criteria->limit = 6;
        $criteria->addCondition('status = 1 AND type = 0');
        $item_list_one  = ItemRecommend::model()->with('item')->findAll($criteria);
        //群英会产品第七个
        $criteria = new CDbCriteria();
        $criteria->limit = 1;
        $criteria->addCondition('status = 1 AND type = 1');
        $item_list_two  = ItemRecommend::model()->with('item')->findAll($criteria);
        //群英会产品第八个
        $criteria = new CDbCriteria();
        $criteria->limit = 1;
        $criteria->addCondition('status = 1 AND type = 2');
        $item_list_three  = ItemRecommend::model()->with('item')->findAll($criteria);
        //资讯
        $criteria = new CDbCriteria();
        $criteria->limit = 3;
        $criteria->addCondition('status = 1 AND type = 0');
        $infomation_list = Information::model()->findAll($criteria);
        //品牌
        $criteria = new CDbCriteria();
        $criteria->limit = 4;
        $criteria->addCondition('status = 1 AND recommend = 1');
        $brand_list = Brand::model()->findAll($criteria);
        $this->render('index',
                        array(
                            'list' => array(), 
                            'key_word' => $key_word, 
                            'ad_carousel' => $ad_carousel, 
                            'item_list_one' => $item_list_one,
                            'item_list_two' => $item_list_two,
                            'item_list_three' => $item_list_three,
                            'infomation_list' => $infomation_list,
                            'brand_list' => $brand_list
                        ));
    }

}