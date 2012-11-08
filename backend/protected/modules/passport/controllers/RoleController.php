<?php

class RoleController extends Controller
{

    /**
     * 角色管理
     */
    public function actionRoleList()
    {
        $title = '角色管理';
        $list = Role::model()->findAll();
        $result = Pages::initArray($list);
        $this->render('index', array('title' => $title, 'list' => $result['list'], 'pages' => $result['pages']));
    }

    /**
     * 添加角色
     */
    public function actionAddRole(){
        $model = new Role();
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('Role');
            $param['create_time'] = time();
            $model->attributes = $param;
            if ($model->validate()) {
                $model->save();
                Util::log('角色添加成功', 'passport', __FILE__, __LINE__);
                Util::header($this->createUrl('/passport/role/rolelist'));
            }
        }
        $this->renderPartial('_add_role', array('model' => $model), false, true);
    }

    /**
     * 更新角色
     * @param int $role_id
     */
    public function actionUpdateRole(){
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('Role');
            $model = $this->loadModel($param['id'], 'Role');
            $model->attributes = $param;
            if($model->validate()){
                $model->save();
                Util::log('角色更新成功', 'passport', __FILE__, __LINE__);
                Util::header($this->createUrl('/passport/role/rolelist'));
            }
        }else{
            $id = $this->getParam('id');
            $model = $this->loadModel($id , 'Role');
        }
        $this->renderPartial('_add_role', array('model' => $model), false, true);
    }

    /**
     * 删除角色
     */
    public function actionDeleteRole(){
        if(Yii::app()->request->isAjaxRequest){
            $id = $this->getParam('id');
            $role = $this->loadModel($id, 'Role');
            $role->delete();
            Util::log('角色删除成功', 'passport', __FILE__, __LINE__);
            echo json_encode(array('status' => 1, 'location' => $this->createUrl('/passport/role/rolelist')));
            Yii::app()->end();
        }else{
            throw new CHttpException('无效的请求...');
        }
    }

    /**
     * 角色类型管理
     */
    public function actionRoleGroupList()
    {
        $title = '角色类型管理';
        $list = RoleGroup::model()->findAll();
        $result = Pages::initArray($list);
        $this->render('role_group', array('title' => $title, 'list' => $result['list'], 'pages' => $result['pages']));

    }

    /**
     * 添加角色类型
     */
    public function actionAddRoleGroup(){
        $model = new RoleGroup();
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('RoleGroup');
            $param['id'] = $this->getAutoIncrementKey('bl_role_group');
            $param['create_time'] = time();
            $model = new RoleGroup();
            $model->attributes = $param;
            if ($model->validate()) {
                $model->save();
                Util::log('角色类型添加成功', 'passport', __FILE__, __LINE__);
                Util::header($this->createUrl('/passport/role/rolegrouplist'));
            }
        }
        $this->renderPartial('_add_role_group', array('model' => $model), false, true);
    }

    /**
     * 删除角色类型
     */
    public function actionDeleteRoleGroup(){
        if(Yii::app()->request->isAjaxRequest){
            $id = $this->getParam('id');
            $role = $this->loadModel($id, 'RoleGroup');
            $role->delete();
            Util::log('角色类型删除成功', 'passport', __FILE__, __LINE__);
            echo json_encode(array('status' => 1, 'location' => $this->createUrl('/passport/role/rolegrouplist')));
            Yii::app()->end();
        }else{
            throw new CHttpException('无效的请求...');
        }
    }

    /**
     * 更新角色类型
     * @param int $role_id
     */
    public function actionUpdateRoleGroup(){

        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('RoleGroup');
            $model = $this->loadModel($param['id'], 'RoleGroup');
            $model->attributes = $param;
            if($model->validate()){
                $model->save();
                Util::log('角色类型更新成功', 'passport', __FILE__, __LINE__);
                Util::header($this->createUrl('/passport/role/rolegrouplist'));
            }
        }else{
            $id = $this->getParam('id');
            $model = $this->loadModel($id , 'RoleGroup');
        }
        $this->renderPartial('_add_role_group', array('model' => $model), false, true);
    }

}