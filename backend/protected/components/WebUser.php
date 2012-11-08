<?php

class WebUser extends CWebUser {

    private $_user;

    /**
     * 获取当前用户UID
     */
    public function getUid() {
        $user = $this->loadUser();
        return $user->id;
    }

    /**
     * 获取当前用户信息
     */
    public function loadUser() {
        if ($this->_user === null) {
            $this->_user = Account::user('username', $this->id);
        }
        return $this->_user;
    }
    
    /**
     * 获取当前用户密码
     */
    public function getPassword() {
        $user = $this->loadUser();
        return $user->password;
    }

}