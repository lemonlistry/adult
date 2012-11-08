<?php

class DefaultController extends Controller
{
    public $defaultAction = 'login';

    /**
     * 首页
     */
    public function actionIndex()
    {
        $this->render('index');
    }

    /**
     * 登录页
     */
    public function actionLogin()
    {
        $this->layout = false;
        if (isset($_POST['login'])){
            $model = new User('search');
            $model->attributes = $this->getParam('User');
            if ($model->validate() && $model->login()) {
                $this->redirect(Yii::app()->createUrl('/passport/role/rolelist'));
            }else{
                echo 'error';
            }
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
     * 没有权限页面渲染
     */
    public function actionNopermission()
    {
        $this->render('nopermission');
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
                echo json_encode(array('msg' => '两次输入密码不一致,请重新输入', 'flag' => 0));
            }else if(md5($param['old_password']) != Yii::app()->user->getPassword()){
                echo json_encode(array('msg' => '原始密码错误,请重新输入', 'flag' => 0));
            }else{
                $model->password = md5($param['new_password']);
                if($model->validate()){
                    $model->save();
                    Util::log('密码更新成功', 'passport', __FILE__, __LINE__);
                    echo json_encode(array('msg' => '操作成功', 'flag' => 1));
                }
            }
            Yii::app()->end();
        }
        $this->renderPartial('_update_password', array('model' => $model), false, true);
    }
}