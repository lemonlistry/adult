<?php
/**
 * 数据结构创建
 * @author shadow
 */
class CoreMigrate {
    
    public function init(){
        $this->_uninstall();
        $this->_install();
    }
    
    /**
     * 安装
     */
    protected function _install() {
        $this->_importDefaultData();
    }

    /**
     * 卸载
     */
    protected function _uninstall() {
        //删除数据库表
        //$this->_dropDB();
    }

    
    /**
     * 导入默认数据 创建数据结构
     */
    protected function _importDefaultData(){
        //$user = new User();
        //$user->username = 'admin';
        //$user->password =  md5('admin');
        //$user->save();
    }
    
}
