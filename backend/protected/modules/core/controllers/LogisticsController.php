<?php

class LogisticsController extends Controller
{

    /**
     * 发货列表
     */
    public function actionIndex()
    {
        $title = '发货列表';
        $list = Logistics::model()->findAll();
        $this->render('index', array('title' => $title, 'list' => $list));
    }

    /**
     * 发货
     */
    public function actionAddLogistics(){
        $model = new Logistics();
        $order_id = $this->getParam('order_id');
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('Logistics');
            $param['send_time'] = strtotime($param['send_time']);
            $param['create_time'] = time();
            $model->attributes = $param;
            if($model->validate()){
                $model->save();
                //更新订单状态为已发货
                Util::updateOrderStatusById($order_id, 2);
                Util::log('发货成功', 'core', __FILE__, __LINE__);
                Util::header($this->createUrl('/core/order/index'));
            }
        }
        $order_no = Util::getOrderAttributeById($order_id);
        $this->renderPartial('_add_logistics', array('model' => $model, 'order_no' => $order_no), false, true);
    }

    /**
     * 根据订单ID查询发货记录
     */
    public function actionGetLogisticsRecordByOrderId(){
        $order_id = $this->getParam('order_id');
        $order_no = Util::getOrderAttributeById($order_id);
        $list = Logistics::model()->findAllByAttributes(array('order_id' => $order_id));
        $this->renderPartial('_logistics_record', array('list' => $list, 'order_no' => $order_no), false, true);
    }

}