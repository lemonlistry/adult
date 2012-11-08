<?php

/**
 * 账户接口类
 */
class Account {

    /**
     * 是否管理员
     * @param int $user_id
     * @return boolean
     */
    public static function isAdmin($user_id) 
    {
        Yii::import('passport.models.User');
        $user = User::model()->findByAttributes(array('id' => $user_id));
        if ($user->role_id === 1) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * 根据用户属性获取用户信息
     * @param string $attribute
     * @param string $value
     */
    public static function user($condition, $value, $attribute = null)
    {
        Yii::import('passport.models.User');
        $user = User::model()->findByAttributes(array($condition => $value));
        return empty($attribute) ? $user : $user->$attribute;
    }

    /**
     * 根据角色属性获取角色信息
     * @param string $attribute
     * @param string $value
     */
    public static function role($condition, $value, $attribute = null){
        Yii::import('passport.models.Role');
        $role = Role::model()->findByAttributes(array($condition => $value));
        return empty($attribute) ? $role : $role->$attribute;
    }
    
    /**
     * 根据角色属性获取角色信息
     * @param string $attribute
     * @param string $value
     */
    public static function allUser(){
        Yii::import('passport.models.User');
        return User::model()->findAll();
    }
}
