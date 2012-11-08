<?php

class DefaultController extends Controller
{
    public $defaultAction = 'login';

    /**
     * 登录页
     */
    public function actionLogin()
    {
        if (isset($_POST['login'])){
            $model = new User('search');
            $model->attributes = Yii::app()->request->getParam('user');
            if ($model->validate() && $model->login()) {
                echo json_encode(array('success' => true, 'url' => Yii::app()->createUrl('/core/default/index')));
            }else{
                echo json_encode(array('success' => false, 'msg' => '用户名称或者密码错误'));
            }
            Yii::app()->end();
        }
        $this->render('login');
    }
    
    /**
     * 退出登录
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * 更新密码
     */
    public function actionUpdatePassword()
    {
        $model = $this->loadModel(Yii::app()->user->getUid(), 'User');
        if(Yii::app()->request->isAjaxRequest){
            $param = $this->getParam(array('old_password', 'new_password', 'confirm_password'));
            if($param['new_password'] != $param['confirm_password']){
                echo json_encode(array('msg' => '两次输入密码不一致,请重新输入', 'success' => false));
            }else if(md5($param['old_password']) != Yii::app()->user->getPassword()){
                echo json_encode(array('msg' => '原始密码错误,请重新输入', 'success' => false));
            }else{
                $model->password = md5($param['new_password']);
                if($model->validate()){
                    $model->save();
                    Util::log('密码更新成功', 'passport', __FILE__, __LINE__);
                    echo json_encode(array('msg' => '操作成功', 'success' => true));
                }
            }
            Yii::app()->end();
        }
        $this->renderPartial('_update_password', array('model' => $model), false, true);
    }
}