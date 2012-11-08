<?php

/**
 * This is the MongoDB Document model class based on table "{{role_group}}".
 */
class RoleGroup extends MongoDocument
{
    public $id;
    public $name;
    public $desc;
    public $create_time;

    /**
     * Returns the static model of the specified AR class.
     * @return RoleGroup the static model class
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
        return 'bl_role_group';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, name, desc, create_time', 'required'),
            array('name, desc', 'length', 'max'=>20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, desc', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => '角色类型名称',
            'desc' => '角色类型描述',
        );
    }
}