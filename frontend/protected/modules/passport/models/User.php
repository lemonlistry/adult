<?php

/**
 * This is the MongoDB Document model class based on table "{{user}}".
 */
class User extends MongoDocument
{
    public $id;
    public $username;
    public $password;
    public $role_id;
    public $create_time;
    private $__identity;

    /**
     * Returns the static model of the specified AR class.
     * @return User the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * returns the primary key field for this model
     */
    public function primaryKey()
    {
        return 'id';
    }

    /**
     * @return string the associated collection name
     */
    public function getCollectionName()
    {
        return 'bl_user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, username, password, role_id, create_time', 'required', 'on' => 'insert, update'),
            array('username', 'EMongoUniqueValidator', 'on' => 'insert, update'),
            array('username, password', 'required', 'on' => 'search'),
            array('username', 'length', 'max'=>20),
            array('password', 'length', 'max'=>32),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, password', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'username' => '用户名',
            'password' => '密码',
            'role_id' => '角色',
        );
    }
    

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login() {
        if ($this->__identity === null) {
            $this->__identity = new UserIdentity($this->username, $this->password);
            $this->__identity->authenticate();
        }
        if ($this->__identity->errorCode === UserIdentity::ERROR_NONE) {
            Yii::app()->user->login($this->__identity);
            return true;
        }else{
            return false;
        }
    }
}