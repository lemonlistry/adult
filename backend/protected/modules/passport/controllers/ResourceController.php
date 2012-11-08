<?php

class ResourceController extends Controller
{

    /**
     * 权限资源管理
     */
    public function actionResourceList()
    {
        $title = '资源管理';
        $list = Resource::model()->findAll();
        $result = Pages::initArray($list);
        $this->render('index', array('title' => $title, 'list' => $result['list'], 'pages' => $result['pages']));
    }

    /**
     * 添加权限资源
     */
    public function actionAddResource(){
        $model = new Resource();
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('Resource');
            $param['create_time'] = time();
            $model->attributes = $param;
            if($model->validate()){
                $model->save();
                Util::log('资源添加成功', 'passport', __FILE__, __LINE__);
                Util::header($this->createUrl('/passport/resource/resourcelist'));
            }
        }
        $this->renderPartial('_add_resource', array('model' => $model), false, true);
    }

    /**
     * 更新权限资源
     *
     */
    public function actionUpdateResource(){
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('Resource');
            $model = $this->loadModel($param['id'], 'Resource');
            $model->attributes = $param;
            if($model->validate()){
                $model->save();
                Util::log('资源更新成功', 'passport', __FILE__, __LINE__);
                Util::header($this->createUrl('/passport/resource/resourcelist'));
            }
        }else{
            $id = $this->getParam('id');
            $model = $this->loadModel($id , 'Resource');
        }
        $this->renderPartial('_add_resource', array('model' => $model), false, true);
    }

    /**
     * 删除权限资源
     */
    public function actionDeleteResource(){
        if(Yii::app()->request->isAjaxRequest){
            $id = $this->getParam('id');
            $role = $this->loadModel($id, 'Resource');
            $role->delete();
            Util::log('资源删除成功', 'passport', __FILE__, __LINE__);
            echo json_encode(array('status' => 1, 'location' => $this->createUrl('/passport/resource/resourcelist')));
            Yii::app()->end();
        }else{
            throw new CHttpException('无效的请求...');
        }
    }

    /**
     * 资源绑定列表
     */
    public function actionResourceBindList(){
        $title = '资源绑定';
        $list = Path::model()->findAll();
        $result = Pages::initArray($list);
        $this->render('resource_bind', array('title' => $title, 'list' => $result['list'], 'pages' => $result['pages']));
    }

    /**
     * 添加资源绑定
     */
    public function actionAddResourceBind(){
        $model = new Path();
        $resource_list = array();
        $res = Resource::model()->findAll();
        if (count($res)){
            foreach ($res as $v) {
                $resource_list[$v['id']] = $v['name'];
            }
        }
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('Path');
            $model->attributes = $param;
            if($model->validate()){
                $model->save();
                Util::log('资源绑定添加成功', 'passport', __FILE__, __LINE__);
                Util::header($this->createUrl('/passport/resource/resourcebindlist'));
            }
        }
        $this->renderPartial('_add_resource_bind', array('model' => $model, 'resource_list' => $resource_list), false, true);
    }

    /**
     * 修改资源绑定
     */
    public function actionUpdateResourceBind(){
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('Path');
            $model = $this->loadModel($param['id'], 'Path');
            $model->attributes = $param;
            if($model->validate()){
                $model->save();
                Util::log('资源绑定更新成功', 'passport', __FILE__, __LINE__);
                Util::header($this->createUrl('/passport/resource/resourcebindlist'));
            }
        }else{
            $resource_list = array();
            $res = Resource::model()->findAll();
            if (count($res)){
                foreach ($res as $v) {
                    $resource_list[$v['id']] = $v['name'];
                }
            }
            $id = $this->getParam('id');
            $model = $this->loadModel($id , 'Path');
        }
        $this->renderPartial('_add_resource_bind', array('model' => $model, 'resource_list' => $resource_list), false, true);
    }

    /**
     * 删除资源绑定
     */
    public function actionDeleteResourceBind(){
        if(Yii::app()->request->isAjaxRequest){
            $id = $this->getParam('id');
            $role = $this->loadModel($id, 'Path');
            $role->delete();
            Util::log('资源绑定删除成功', 'passport', __FILE__, __LINE__);
            echo json_encode(array('status' => 1, 'location' => $this->createUrl('/passport/resource/resourcebindlist')));
            Yii::app()->end();
        }else{
            throw new CHttpException('无效的请求...');
        }
    }
}