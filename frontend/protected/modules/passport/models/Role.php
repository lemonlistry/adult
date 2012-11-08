<?php

/**
 * This is the MongoDB Document model class based on table "{{role}}".
 */
class Role extends MongoDocument
{
    public $id;
    public $name;
    public $desc;
    public $group_id;
    public $create_time;
    
    public function roleGroup()
    {
        return RoleGroup::model()->findByPk($this->group_id);
    }
    
    /**
     * Returns the static model of the specified AR class.
     * @return Role the static model class
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
        return 'bl_role';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, name, desc, group_id, create_time', 'required'),
            array('id, create_time', 'numerical', 'integerOnly'=>true),
            array('name, desc', 'length', 'max'=>20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, desc, group_id', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => '角色名称',
            'desc' => '角色描述',
            'group_id' => '角色类型',
        );
    }
    
}