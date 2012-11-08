<?php

class PrimeController extends Controller
{

    /**
     * 权限管理
     */
    public function actionPrimeList()
    {
        $title = '权限管理';
        $role_id = $this->getParam('role_id');
        $resource_list = Resource::model()->findAll();
        $role_list = Role::model()->findAll();
        $role_menu = array();
        foreach ($role_list as $role) {
            $role_id = empty($role_id) ? $role->id : $role_id;
            if($role_id == $role->id){
                $current_role = $role;
            }
            array_push($role_menu, array('label' => $role->name, 'url' => array('/passport/prime/primelist', 'role_id' => $role->id),
                                        'active' => $role->id == $role_id ? true : false));
        }
        $prime_resource = Prime::model()->findAllByAttributes(array('role_id' => $role_id));
        $prime = array();
        if(count($prime_resource)){
            foreach ($prime_resource as $v) {
                array_push($prime, $v->resource_id);
            }
        }
        $checked_user = User::model()->findAllByAttributes(array('role_id' => $role_id));
        $this->render('index', array('title' => $title, 'role_menu' => $role_menu, 'resource_list' => $resource_list, 'checked_user' => $checked_user,
                                         'current_role' => $current_role, 'prime' => $prime));
    }

    /**
     * 更新权限
     */
    public function actionUpdatePrime(){
        if(Yii::app()->request->isAjaxRequest){
            $role_id = $this->getParam('role_id');
            $resource = $this->getParam('Resource');
            Prime::model()->deleteAll('role_id = :role_id', array(':role_id' => $role_id));
            if(count($resource)){
                foreach ($resource as $k => $v) {
                    $prime = new Prime();
                    $prime->role_id = $role_id;
                    $prime->resource_id = $k;
                    if(!$prime->validate()){
                        echo json_encode(array('status' => 0, 'msg' => '参数验证失败'));
                        Yii::app()->end();
                    }else{
                        $prime->save();
                    }
                }
            }
            echo json_encode(array('status' => 1));
            Yii::app()->end();
        }else{
            throw new CHttpException('无效的请求...');
        }
    }

}