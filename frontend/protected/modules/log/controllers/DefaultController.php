<?php

class DefaultController extends Controller
{
    public $defaultAction ='logList';

    /**
     * 查看日志列表
     */
    public function actionLogList()
    {
        $title = '日志管理';
        $param = $this->getParam(array('begintime', 'endtime', 'operator'));
        $list = Log::model()->bySearch($param)->findAll();
        $result = Pages::initArray($list);
        $this->render('index', array('title' => $title, 'list' => $result['list'], 'pages' => $result['pages'],
                           'begintime' => $param['begintime'], 'endtime' =>  $param['endtime'], 'operator' =>  $param['operator']));
    }
    
    /**
     * 查看详细日志
     * @param int $role_id
     */
    public function actionLook(){
        $id = $this->getParam('id');
        $model = $this->loadModel($id , 'Log');
        $this->renderPartial('loginfo', array('model' => $model,), false, true);
    }
}

?>