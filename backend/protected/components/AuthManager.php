<?php
/**
 * 权限验证类
 * @author shadow
 *
 */
class AuthManager {

    /**
     * 验证权限
     * @param int $resource_id
     * @param int $uid
     * @return boolean
     */
    public static function checkAuth($uid, $resource_id)
    {
        if(Account::isAdmin($uid)){
            return true;
        }else{
            $role_id = Account::user('id', $uid, 'role_id');
            Yii::import('passport.models.Prime');
            $prime = Prime::model()->findByAttributes(array('role_id' => $role_id, 'resource_id' => $resource_id));
            return empty($prime) ? false : true;
        }
    }

    /**
     * 根据request url 获取资源ID
     * @param string $module_id
     * @param string $controller_id
     * @param string $action_id
     * @return int
     */
    public static function getResourceId($module_id, $controller_id, $action_id){
        $path = '/' . $module_id . '/' . $controller_id . '/' . $action_id;
        Yii::import('passport.models.Path');
        $path = Path::model()->findByAttributes(array('path' => $path));
        return empty($path) ? '' : $path->resource_id;
    }

    /**
     * 获取当前用户权限菜单
     */
    public static function getPrimeUrlList(){
        $url_list = array();
        $resource_list = array();
        $role_id = Yii::app()->user->getRoleId();
        Yii::import('passport.models.*');
        $result = Prime::model()->findAllByAttributes(array('role_id' => $role_id));
        if(count($result)){
            foreach ($result as $v) {
                array_push($resource_list, $v->resource_id);
            }
        }
        if(count($resource_list)){
            $criteria = new EMongoCriteria();
            $criteria->addCond('resource_id', 'in', $resource_list);
            $res = Path::model()->findAll($criteria);
            if(count($res)){
                foreach ($res as $value) {
                    array_push($url_list, $value->path);
                }
            }
        }
        return $url_list;
    }

    /**
     * 验证数据导出权限
     */
    public static function verifyExportAuth(){
        $url_list = self::getPrimeUrlList();
        return in_array(AppConst::SYSTEM_RETAIL_EXPORT, $url_list) ? true : false;
    }

}