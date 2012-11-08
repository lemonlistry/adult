<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
        set_time_limit(500);
        $this->sendNotice();
    }
    
    /**
     * 在线公告
     */
    protected function sendNotice(){
        Yii::import('service.models.Notice');
        $list = Notice::model()->findAllByAttributes(array('status' => 1));
        if(count($list)){
            foreach ($list as $v) {
                if(time() >= $v->send_time){
                    Service::sendOnlineNotice($v->server_id, $v->interval_time, $v->play_times, $v->content);
                    $model = $this->loadModel($v->id, 'Notice');
                    $model->status = 3;
                    $model->save();
                }
            }
        }
    }
    
}