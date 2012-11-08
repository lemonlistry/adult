<?php

class InformationController extends Controller
{

    /**
     * 资讯列表
     */
    public function actionIndex()
    {
        $title = '资讯列表';
        $list = Information::model()->findAll();
        $this->render('index', array('title' => $title, 'list' => $list));
    }

     /**
     * 添加资讯
     */
    public function actionAddInformation(){
        $model = new Information();
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('Information');
            $param['create_time'] = time();
            $model->attributes = $param;
            if($model->validate()){
                $model->save();
                Util::log('资讯添加成功', 'core', __FILE__, __LINE__);
                Util::header($this->createUrl('/core/information/index'));
            }
        }
        $this->renderPartial('_add_information', array('model' => $model), false, true);
    }

    /**
     * 更新资讯
     *
     */
    public function actionUpdateInformation(){
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('Information');
            $model = $this->loadModel($param['id'], 'Information');
            $model->attributes = $param;
            if($model->validate()){
                $model->save();
                Util::log('资讯更新成功', 'core', __FILE__, __LINE__);
                Util::header($this->createUrl('/core/information/index'));
            }
        }else{
            $id = $this->getParam('id');
            $model = $this->loadModel($id , 'Information');
        }
        $this->renderPartial('_add_information', array('model' => $model), false, true);

    }

    /**
     * 删除资讯
     */
   public function actionDeleteInformation(){
        if(Yii::app()->request->isAjaxRequest){
            $id = $this->getParam('id');
            $server = $this->loadModel($id, 'Information');
            $server->delete();
            Util::log('资讯删除成功', 'core', __FILE__, __LINE__);
            echo json_encode(array('status' => 1, 'location' => $this->createUrl('/core/information/index')));
            Yii::app()->end();
        }else{
            throw new CHttpException('无效的请求...');
        }
    }
}