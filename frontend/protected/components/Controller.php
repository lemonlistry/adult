<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout='//layouts/column1';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu=array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs=array();

    public $navMenu = array();

    /**
     * 用户登录以及权限验证
     * @return boolean
     */
    protected function beforeAction($action)
    {
        $this->menu = $this->getMenu();
        Yii::app()->session->add('db_component', 'db');
        //购买需要登录
        if (Yii::app()->user->isGuest && 0) {
            if (YII_DEBUG) {
                $this->redirect(array('/passport'));
            } else {
                throw new CHttpException(403);
            }
        }
        return true;
    }

    /**
     * 菜单处理
     */
    protected function getMenu()
    {
        return array(
                        '/passport/role/rolelist' => '系统管理',
                        '/log/default/loglist' => '日志管理',
                        '/service/default/forbidlogin' => '客服管理',
                        '/realtime/default/index' => '实时数据',
                        '/approve/default/index' => '事务审批',
                        '/core/default/index' => '运营管理',
                    );
    }

    /**
     * 根据给出的主键返回数据模型
     * 如果没有发现模型，将触发一个404错误
     * @param integer $id 模型主键
     * @param string $model_name 模型名称
     * @param stirng $scenario 应用场景
     * @return ActiveModel
     */
    protected function loadModel($id, $model_name, $scenario=null)
     {
        $model = $model_name::model()->findByPk($id);
        if($scenario) {
            $model->scenario = $scenario;
        }
        if ($model === null){
            throw new CException('model load error !');
        }else {
            return $model;
        }
    }

    /**
     * 验证参数
     */
    protected function getParam($param)
    {
        if(is_array($param)){
            $res = array();
            foreach ($param as $v) {
                $res[$v] = Yii::app()->request->getParam($v);
            }
        }else{
            $res = Yii::app()->request->getParam($param);
        }
        return $res;
    }

    /**
     * 设置DB连接
     * @param string $dbname
     * @return CDbConnection the database connection used by active record.
     */
    public function setDbConnection($server_id){
        Yii::import('passport.models.Server');
        $model = Server::model()->findByAttributes(array('id' => $server_id));
        if(empty($model)){
            throw new CDbException('Active Record load server config error ...');
        }else{
            Yii::app()->session->add('db_component', 'db' . $server_id);
        }
    }
}