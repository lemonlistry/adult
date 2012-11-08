<?php

/**
 * 重写YII CActiveRecord  直接多DB 连接
 * @author shadow
 */
class ActiveRecord extends CActiveRecord 
{
    public static $db_instance = array(); 
    
    private $db_component = 'db';
    
    /**
     * Returns the database connection used by active record.
     * By default, the "db" application component is used as the database connection.
     * You may override this method if you want to use a different database connection.
     * @return CDbConnection the database connection used by active record.
     */
    public function getDbConnection()
    {
        $cache_component = Yii::app()->session->get('db_component');
        $db_component = empty($cache_component) ? $this->db_component : $cache_component;
        if(isset(self::$db_instance[$db_component]) && self::$db_instance[$db_component] instanceof CDbConnection){
            return self::$db_instance[$db_component];
        }else{
            self::$db_instance[$db_component] = Yii::app()->$db_component;
        }

        if(self::$db_instance[$db_component] instanceof CDbConnection){
            self::$db_instance[$db_component]->setActive(true); 
            return self::$db_instance[$db_component];
        }else{
            throw new CDbException(Yii::t('yii','Active Record requires a "db" CDbConnection application component.'));
        }
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
            return $this->getDbConnection();
        }
    }
}
