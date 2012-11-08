<?php

class UserController extends Controller
{

    /**
     * 用户管理
     */
    public function actionUserList()
    {
        $title = '用户管理';
        $user = new User();
        $list = $user->findAll();
        $result = Pages::initArray($list);
        $this->render('index', array('title' => $title, 'list' => $result['list'], 'pages' => $result['pages']));
    }

    /**
     * 添加用户
     */
    public function actionAddUser(){
        $model = new User();
        $role_list = array();
        $res = Role::model()->findAll();
        if (count($res)){
            foreach ($res as $v) {
                $role_list[$v['id']] = $v['name'];
            }
        }
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('User');
            $model->attributes = $param;
            $model->create_time = time();
            if ($model->validate()) {
                $model->password = md5($param['password']);
                $model->save();
                Util::log('用户添加成功', 'passport', __FILE__, __LINE__);
                Util::header($this->createUrl('/passport/user/userlist'));
            }
        }
        $this->renderPartial('_add_user', array('model' => $model, 'role_list' => $role_list), false, true);
    }

    /**
     * 更新用户
     */
    public function actionUpdateUser(){
        $role_list = array();
        $res = Role::model()->findAll();
        if (count($res)){
            foreach ($res as $v) {
                $role_list[$v['id']] = $v['name'];
            }
        }
        if(Yii::app()->request->isPostRequest){
            $param = $this->getParam('User');
            $model = $this->loadModel($param['id'], 'User');
            $param['password'] = empty($param['password']) ? $param['password'] : md5($param['password']);
            $model->attributes = $param;
            if($model->validate()){
                $model->save();
                Util::log('用户更新成功', 'passport', __FILE__, __LINE__);
                Util::header($this->createUrl('/passport/user/userlist'));
            }
        }else{
            $id = $this->getParam('id');
            $model = $this->loadModel($id , 'User');
        }
        $this->renderPartial('_add_user', array('model' => $model, 'role_list' => $role_list), false, true);
    }

    /**
     * 删除用户
     */
    public function actionDeleteUser(){
        if(Yii::app()->request->isAjaxRequest){
            $id = $this->getParam('id');
            if(Account::isAdmin($id)){
                echo json_encode(array('status' => 0, 'msg' => '超级管理员不可以删除'));
            }else{
                $user = $this->loadModel($id, 'User');
                $user->delete();
                Util::log('用户删除成功', 'passport', __FILE__, __LINE__);
                echo json_encode(array('status' => 1, 'location' => $this->createUrl('/passport/user/userlist')));
            }
            Yii::app()->end();
        }else{
            throw new CHttpException('无效的请求...');
        }
    }


}