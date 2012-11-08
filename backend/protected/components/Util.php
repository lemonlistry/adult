<?php

/**
 * 应用程序日志类
 */
class Util {

    /**
     * 记录日志
     * 日志格式：<系统名称>|<模块>|<日志级别>|<发生时间>|<所在机器>|<登录用户>|<客户端IP>|<浏览器信息>|<日志信息>|<其它信息(如Session、堆栈信息、POST/GET等)>
     * LOG_LEVEL INFO ERROR TARCE DEBUG
     * @param str $mssage
     * @param str $line_number  error line.
     * @return status
     */
    public static function log($message, $module, $file_name, $line_number, $level = 'INFO')
    {
        Yii::import('log.models.Log');
        if(is_object($message) || is_array($message)){
            $msg = print_r($message,true);
        }else{
            $msg = $message;
        }

        $model = new Log();
        $model->module = $module;
        $model->level = $level;
        $model->request_url = Yii::app()->request->getHostInfo() . Yii::app()->request->getUrl();
        $model->request_type = Yii::app()->request->getRequestType();
        $model->browse = $_SERVER['HTTP_USER_AGENT'];
        $model->client_ip = Yii::app()->request->userHostAddress;
        $model->file_name = $file_name;
        $model->line_number = $line_number;
        $model->msg = $msg;
        $model->param = print_r($_REQUEST,true);
        $model->create_time = time();
        $model->operator = Yii::app()->user->name;
        if($model->validate()){
            $model->save();
        }else{
            throw new CException('log model validate error ...');
        }

    }

    /**
     * 提示信息 并跳转父页面
     * @param $url
     */
    public static function header($url, $msg = ''){
        if(!empty($msg)){
            $msg = "alert('{$msg}');";
        }
        $str = <<<EOF
<script language="javascript" charset="utf-8">
{$msg}
parent.location.href = '{$url}';
</script>
EOF;
        echo $str;
        Yii::app()->end();
    }

    /**
     * 提示信息
     */
    public static function message($msg){
        $msg = "alert('{$msg}');";
        $str = <<<EOF
<script language="javascript" charset="utf-8">
{$msg}
</script>
EOF;
        echo $str;
    }

    /**
     * 跳转到上一页面
     * @param string $msg
     */
    public static function history($msg = ''){
        if(!empty($msg)){
            $msg = "alert('{$msg}');";
        }
        $str = <<<EOF
<script language="javascript" charset="utf-8">
{$msg}
history.go(-1);
</script>
EOF;
        echo $str;
        Yii::app()->end();
    }

    /**
     * 重新加载页面
     * @param string $msg
     */
    public static function reload($msg = ''){
        if(!empty($msg)){
            $msg = "alert('{$msg}');";
        }
        $str = <<<EOF
<script language="javascript" charset="utf-8">
{$msg}
parent.location.href = parent.location.href;
</script>
EOF;
        echo $str;
        Yii::app()->end();
    }

    /**
     * 根据uid获取用户信息
     * @param type $uid
     * @param type $attribute 默认为username
     */
    public static function getUserAttributeByUid($uid, $attribute = 'username'){
        Yii::import('core.models.Member');
        $model = Member::model()->findByPk($uid);
        return $model->$attribute;
    }

    /**
     * 根据订单ID获取订单相关信息 默认为订单编号
     * @param int $order_id
     * @param string $attribute
     */
    public static function getOrderAttributeById($order_id, $attribute = 'no'){
        Yii::import('core.models.Order');
        $model = Order::model()->findByPk($order_id);
        return $model->$attribute;
    }

    /**
     * 更新订单状态
     * @param int $order_id
     * @param int $status
     */
    public static function updateOrderStatusById($order_id, $status){
        Yii::import('core.models.Order');
        $model = Order::model()->findByPk($order_id);
        $model->status = $status;
        $model->save();
        Util::log('订单状态修改成功', 'core', __FILE__, __LINE__);
        return true;
    }

    /**
     * 根据分类ID获取属性 默认 名称
     * @param int $category_id
     * @param string $attribue
     */
    public static function getCategoryAttribute($category_id, $attribue = 'name'){
        Yii::import('core.models.Category');
        $model = Category::model()->findByPk($category_id);
        return empty($model) ? '' : $model->$attribue;
    }
}
