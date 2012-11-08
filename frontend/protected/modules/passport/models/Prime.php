<?php

/**
 * This is the MongoDB Document model class based on table "{{prime}}".
 */
class Prime extends MongoDocument
{
    public $id;
    public $role_id;
    public $resource_id;

    /**
     * Returns the static model of the specified AR class.
     * @return Prime the static model class
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
        return 'bl_prime';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, role_id, resource_id', 'required'),
            array('role_id, resource_id', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, role_id, resource_id', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'uid' => 'Uid',
            'resource_id' => 'Resource',
        );
    }
    
    /**
     * 根据角色ID 设置 CRUD 条件
     * @param int $role_id
     */
    public function byRoleId($role_id){
        $criteria = new EMongoCriteria();
        $criteria->role_id('==', $role_id);
        $this->setDbCriteria($criteria);
        return $this;
    }
}