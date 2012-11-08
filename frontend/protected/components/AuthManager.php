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
        Yii::import('passport.models.ResourceRelate');
        $relate = ResourceRelate::model()->findByAttributes(array('path' => $path));
        return empty($relate) ? '' : $relate->resource_id;
    }
} 