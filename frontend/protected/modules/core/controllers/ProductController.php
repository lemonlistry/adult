<?php

class ProductController extends Controller
{

    /**
     * 产品列表页
     */
    public function actionIndex()
    {
        //列表页产品
        $criteria = new CDbCriteria();
        $criteria->addCondition('is_shelve = 1 AND is_delete = 1');
        $count = Item::model()->count($criteria);
        $pager = new CPagination($count);
        $pager->pageSize = 12;  
        $pager->applyLimit($criteria);
        $list = Item::model()->findAll($criteria);
        //列表页推荐大号
        $criteria = new CDbCriteria();
        $criteria->limit = 1;
        $criteria->addCondition('status = 1 AND type = 3');
        $recommend_big  = ItemRecommend::model()->with('item')->findAll($criteria);
        //列表页推荐中号
        $criteria = new CDbCriteria();
        $criteria->limit = 1;
        $criteria->addCondition('status = 1 AND type = 4');
        $recommend_medium  = ItemRecommend::model()->with('item')->findAll($criteria);
        //列表页推荐小号
        $criteria = new CDbCriteria();
        $criteria->limit = 1;
        $criteria->addCondition('status = 1 AND type = 5');
        $recommend_small  = ItemRecommend::model()->with('item')->findAll($criteria);
        //列表页推荐情趣
        $criteria = new CDbCriteria();
        $criteria->limit = 1;
        $criteria->addCondition('status = 1 AND type = 6');
        $recommend_taste  = ItemRecommend::model()->with('item')->findAll($criteria);
        $this->render('index', array('pages' => $pager, 'list' => $list, 'recommend_big' => $recommend_big, 'recommend_medium' => $recommend_medium, 
            'recommend_small' => $recommend_small, 'recommend_taste' => $recommend_taste));
     }

    /**
     * 产品详细页
     */
    public function actionDetail()
    {
        $item_id = Yii::app()->request->getParam('item_id');
        $item = Item::model()->findByPk($item_id);
        $this->render('detail', array('item' => $item));
     }
     
     /**
      * 购物车页面
      */
     public function actionCar(){
         $this->render('car', array('list' => array()));
     }

}